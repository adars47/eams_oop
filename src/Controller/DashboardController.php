<?php

namespace App\Controller;

use App\Base\Controller;
use App\Product\NepalAbstractProductManufacturerFactory;
use App\Product\UnitedStatesAbstractProductManufacturerFactory;

class DashboardController extends Controller
{
     public function index()
     {
         $nepal = [];
         $nepalTourFactory = new NepalAbstractProductManufacturerFactory();
         $nepal['safari'][]=$nepalTourFactory->createSafari(59.99,5,5,"Chitwan Safari");
         $nepal['tours'][]=$nepalTourFactory->createTours(80.99,4,1,"Kathmandu Tours");
         $nepal['tours'][]=$nepalTourFactory->createTours(80.99,4,1,"Kathmandu Tours");

         $usa = [];
         $usaTourFactory = new UnitedStatesAbstractProductManufacturerFactory();
         $usa['safari'][]= $usaTourFactory->createSafari(200,2,3,"Lion Country Safari");
         $usa['safari'][]= $usaTourFactory->createSafari(150,2,4,"Florida · Pine Mountain Wild Animal Safari");
         $usa['tours'][]=$usaTourFactory->createTours(80.99,4,1,"New york tour");
         $usa['tours'][]=$usaTourFactory->createTours(80.99,4,1,"Las vegas tour");

         $products = [
           'nepal'=>$nepal,
           'usa'=>$usa
         ];
         self::render('dashboard',$products);
     }


}