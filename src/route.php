<?php

use App\Base\Router;

Router::get("/welcome","App\\Controller\\WelcomeController","welcome");
Router::get("/register","App\\Controller\\SignUpController","index");
Router::post("/register","App\\Controller\\SignUpController", "register");

Router::get("/login","App\\Controller\\SignInController","index");
Router::post("/login","App\\Controller\\SignInController", "login");
Router::get("/logout","App\\Controller\\SignInController", "logout");

Router::post("/payment","App\Controller\PaymentController","savePaymentInformation");
Router::post("/pay","App\Controller\PaymentController","pay");
Router::get("/add/cardDetail","App\Controller\PaymentController","cardDetail");
Router::get("/add/paypalDetail","App\Controller\PaymentController","paypalDetail");
Router::get("/proceedToPay","App\Controller\PaymentController","proceedToPay");

Router::get("/dashboard","App\\Controller\\DashboardController", "index");