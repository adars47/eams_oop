<?php
?>

<html>
    <head>
        <?php require "Base/header.php"?>
    </head>
    <body>
        <p></p>
        <div class="row">
            <div class="col-25">
                <div class="container">
                    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
                    <p><a href="#">Product 1</a> <span class="price">$15</span></p>
                    <p><a href="#">Product 2</a> <span class="price">$5</span></p>
                    <p><a href="#">Product 3</a> <span class="price">$8</span></p>
                    <p><a href="#">Product 4</a> <span class="price">$2</span></p>
                    <hr>
                    <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
                </div>
            </div>
            <div class="col-75">
                <div class="container">
                    <form action="/pay" method="post">
                        <div class="row">
                            <div class="col-50">
                                <h3>Pay Details</h3>
                                <label for="method">Payment Method</label>
                                <select  class="form-control"   id="method" name="method">
                                    <option value="">Select method</option>
                                    <option value="Card">Card</option>
                                    <option value="Paypal">Paypal</option>
                                </select>
                                <label for="amount"><i class="fa fa-address-card-o"></i> Amount </label>
                                <input type="text" id="amount" name="amount" placeholder="Amount">
                               </div>
                        </div>
                        <input type="submit" value="Pay" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

