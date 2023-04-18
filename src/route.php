<?php

use App\Base\Router;

Router::get("/register","App\\Controller\\SignUpController","index");
Router::post("/register","App\\Controller\\SignUpController", "register");