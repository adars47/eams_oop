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
                        <h3>Card Details</h3>
                        <input type="text" id="method" name="method" value="card" hidden>
                        <label for="CardNumber"><i class="fa fa-user"></i> Card Number</label>
                        <input type="text" id="CardNumber" name="CardNumber" placeholder="CardNumber">
                        <label for="cvv"><i class="fa fa-envelope"></i> CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="CVV">
                        <label for="ExpiryYear"><i class="fa fa-address-card-o"></i> Expiry Year</label>
                        <input type="text" id="ExpiryYear" name="ExpiryYear" placeholder="Expiry Year">
                        <label for="ExpiryMonth"><i class="fa fa-address-card-o"></i> Expiry Month</label>
                        <input type="text" id="ExpiryMonth" name="ExpiryMonth" placeholder="Expiry Month">
                        <label for="CardHolderName"><i class="fa fa-institution"></i> Card Holder Name</label>
                        <input type="text" id="CardHolderName" name="CardHolderName" placeholder="Card Holder Name">
                    </div>
                </div>
                <input type="submit" value="Add" class="btn">
            </form>
        </div>
    </div>
</div>
</body>
</html>

