<?php

namespace App\Controller;

use App\Base\Controller;
use App\Discount\BaseDiscount;
use App\Discount\LoyaltyDiscount;
use App\Discount\MarchMadnessDiscount;

class BookingController extends Controller
{

    public function book()
    {
        $booking = self::getParams()['get'];
        $booking_decoded = json_decode($booking['data'],true);
        $_SESSION['pay_data'] = $booking_decoded;
        $this->calculateDiscount($booking_decoded['amount']);
        header("Location: /proceedToPay");
    }

    private function calculateDiscount($amount)
    {
        $discount = new BaseDiscount();
        $discount = new MarchMadnessDiscount($discount);
        $discount = new LoyaltyDiscount($discount);
        $_SESSION['discount']= $discount->description();
        $_SESSION['success'][]=[
            "title"=>"Discount Applied",
            "message"=>"Discount Applied </br> ".implode(",",array_keys($discount->description()))
        ];
    }
}