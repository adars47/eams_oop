<?php

namespace App\Controller;

use App\Base\Controller;

class BookingController extends Controller
{

    public function book()
    {
        $booking = self::getParams()['get'];
        $_SESSION['pay_data'] = json_decode($booking['data'],true);
        header("Location: /proceedToPay");
    }

}