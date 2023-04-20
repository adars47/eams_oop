<?php

namespace App\Controller;

use App\Base\Controller;

class DashboardController extends Controller
{
     public function index()
     {
         self::render('dashboard',[]);
     }


}