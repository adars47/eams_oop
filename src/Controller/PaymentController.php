<?php

namespace App\Controller;

use App\Model\PaymentDetails;
use App\Payment\BankCardPaymentStrategy;
use App\Payment\PaypalPaymentStrategy;
use App\Service\PaymentService;

class PaymentController extends \App\Base\Controller
{
    public function cardDetail()
    {
        self::render('cardDetailForm',[]);
    }

    public function paypalDetail()
    {
        self::render('paypaldetailForm',[]);
    }

    public function proceedToPay()
    {
        if(!isset($_SESSION['pay_data']))
        {
            $_SESSION['error'][] =[
                "title"=> "dashboard",
                "message" => "Something went wrong"
            ];
            session_write_close();
            header("Location: /dashboard");die;
        }
        $data = [
            'pay_data'=>$_SESSION['pay_data'],
            'discount_data'=>$_SESSION['discount']
        ];
        self::render('paymentForm',$data);
    }

    public function savePaymentInformation()
    {
        $uid = $_SESSION['user']->properties['id'];
        $payments = self::getParams()['post'];
        $json = json_encode($payments);
        $paymentDetailsObj = new PaymentDetails();
        $paymentDetailsObj->properties = [
            "user_id"=>$uid,
            "details"=>$json,
            "method"=>strtolower($payments['method'])
        ];
        $paymentDetailsObj->save();
        $_SESSION['success'][] =[
            "title"=> "dashboard",
            "message" => "Successfully saved payment method"
        ];
        session_write_close();
        header("Location: /dashboard");die;
    }

    public function pay()
    {
        $params = self::getParams()['post'];
        $method = $params['method'];
        $amount = $params['amount'];

//        $amount = $this->calculateDiscount($amount);

        $paymentService = new PaymentService();

        $paymentStrategy = null;

        if(strtolower($method)=="paypal")
        {
            $paymentStrategy = new PaypalPaymentStrategy();
        }

        if(strtolower($method)=="card")
        {
            $paymentStrategy = new BankCardPaymentStrategy();
        }

        if($paymentStrategy==null)
        {
            $_SESSION['error'][] =[
                "title"=> "booking error",
                "message" => "Please select a valid payment method."
            ];
            header("Location: /proceedToPay");
            die;

        }

        $paymentService->setPaymentStrategy($paymentStrategy);
        $paymentService->pay($_SESSION['user'],$amount);
        $_SESSION['success'][] =[
            "title"=> "booked",
            "message" => "Successfully booked trip."
        ];
        unset($_SESSION['pay_data']);
        unset($_SESSION['discount']);
        header("Location: /dashboard");
    }

}