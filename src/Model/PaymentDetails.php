<?php

namespace App\Model;

class PaymentDetails extends \App\Base\Model
{
    public $table_name = "payment_details";

    public $properties = [
        "id"=>null,
        "user_id"=>"",
        "details"=>"",
        "method"=>""
    ];

}