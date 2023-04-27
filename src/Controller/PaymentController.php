<?php

namespace App\Controller;

use App\Discount\BaseDiscount;
use App\Discount\Discount;
use App\Discount\LoyaltyDiscount;
use App\Discount\MarchMadnessDiscount;
use App\Exceptions\PaymentMethodDoesNotExistException;
use App\Model\PaymentDetails;
use App\Payment\BankCardPaymentStrategy;
use App\Payment\PaypalPaymentStrategy;
use App\Service\PaymentService;

class PaymentController extends \App\Base\Controller
{
    public function paymentMethod()
    {
        self::render('paymentMethodForm',[]);
    }

    public function proceedToPay()
    {
        self::render('paymentForm',[]);
    }

    public function savePaymentInformation()
    {
        $uid = $_SESSION['user']['id'];
        $payments = self::getParams()['post'];
        $json = json_encode($payments);
        $paymentDetailsObj = new PaymentDetails();
        $paymentDetailsObj->properties = [
            "user_id"=>$uid,
            "details"=>$json,
            "method"=>strtolower($payments['method'])
        ];
        $paymentDetailsObj->save();
        echo(json_encode([
            "success"=>true,
            "message"=>"Successfully saved payment method"
        ]));die;
    }

    public function pay()
    {
        $params = self::getParams()['post'];
        $method = $params['method'];
        $amount = $params['amount'];

        $amount = $this->calculateDiscount($amount);

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
            //throw exception
             throw new PaymentMethodDoesNotExistException();
        }

        $paymentService->setPaymentStrategy($paymentStrategy);
        $paymentService->pay($_SESSION['user'],$amount);
    }

    private function calculateDiscount($amount)
    {
        $discount = new BaseDiscount();
        $discount = new MarchMadnessDiscount($discount);
        $discount = new LoyaltyDiscount($discount);
        $_SESSION['success'][]=[
            "title"=>"Discount Applied",
            "message"=>$discount->description()
        ];
        return $amount-$discount->amount();
    }
}