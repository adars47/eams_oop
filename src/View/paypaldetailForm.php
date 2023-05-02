<?php
?>

<html>
    <head>
        <?php require "Base/header.php"?>
    </head>
    <body>
        <p></p>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="/payment" method="post">
                        <div class="row">
                            <div class="col-50">
                                <h3>Paypal Details</h3>
                                <input type="text" id="method" name="method" value="paypal" hidden>

                                <label for="authorizationKey"><i class="fa fa-user"></i>Authorization Key </label>
                                <input type="text" id="authorizationKey" name="authorizationKey" placeholder="Enter Authorization Key">

                                <label for="CardHolderName"><i class="fa fa-institution"></i> Card Holder Name</label>
                                <input type="text" id="CardHolderName" name="CardHolderName" placeholder="Card Holder Name">

                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" id="email" name="email" placeholder="email">
                            </div>
                        </div>
                        <input type="submit" value="Add" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

