<html>
    <head>
        <?php require "Base/header.php"?>
    </head>
    <body>
    <?php
        $to_pay = $args['pay_data'];
        $discount = $args['discount_data'];
    ?>
        <p></p>
        <div class="row">
            <div class="col-25">
                <div class="container">
                    <h4><b>Cart</b> <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>1</b></span></h4>
                    <p><?= $to_pay['name'] ?> <span class="price">$<?= $to_pay['charge'] ?></span></p>

                    <h4><b>Discount</b></h4>
                    <ul>
                        <?php
                        foreach($discount as $key=>$value)
                        { ?>
                            <li> <?= $key ?>  <span class="price">$<?= $value ?></span> </li>
                        <?php
                            $to_pay['charge'] = $to_pay['charge']-$value;
                        }
                        ?>
                    </ul>
                    <hr>
                    <p>Total <span class="price" style="color:black"><b><?= $to_pay['charge'] ?></b></span></p>
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
                                <input type="text" id="amount" name="amount" placeholder="Amount" value="<?= $to_pay['charge']?>" readonly>
                               </div>
                        </div>
                        <input type="submit" value="Pay" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

