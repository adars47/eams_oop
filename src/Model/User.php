<?php

namespace App\Model;

use App\Base\Model;

class User extends Model
{

    public $table_name = "user";

    public $properties = [
        "id"=>null,
        "email"=>"",
        "password"=>"",
        "fullName"=>""
        ];


}