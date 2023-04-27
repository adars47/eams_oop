Welcome <?= $args['name'] ?>.
You are <?= $args['age'] ?> years old.
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<header>
    <?php require "Base/header.php"?>
</header>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
<!--            <p><a href="#">Link</a></p>-->
<!--            <p><a href="#">Link</a></p>-->
<!--            <p><a href="#">Link</a></p>-->
        </div>
        <div class="col-sm-8 text-center">
            <h1>Welcome to the application</h1>
            <hr>
            <div class="col-sm-2 well center">
                <p><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></p>
            </div>
            <div class="col-sm-2 well">
                <p><a href="/register"><span class="glyphicon glyphicon-log-in"></span> Sign Up</a></p>
            </div>

        </div>
        <div class="col-sm-2 sidenav">
<!--            <div class="well">-->
<!--                <p>ADS</p>-->
<!--            </div>-->
<!--            <div class="well">-->
<!--                <p>ADS</p>-->
<!--            </div>-->
        </div>
    </div>
</div>
    <?php require "Base/footer.php" ?>

</body>
</html>
