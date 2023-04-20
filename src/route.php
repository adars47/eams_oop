<?php

use App\Base\Router;

Router::get("/welcome","App\\Controller\\WelcomeController","welcome");
Router::get("/register","App\\Controller\\SignUpController","index");
Router::post("/register","App\\Controller\\SignUpController", "register");

Router::get("/login","App\\Controller\\SignInController","index");
Router::post("/login","App\\Controller\\SignInController", "login");