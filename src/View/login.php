<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>

</head>
<body>
<header>
    <?php require "Base/header.php"?>
</header>
<div class="container-fluid text-center">
    <h2>Login</h2>
    <div class="row content">
        <div class="col-sm-8 text-center">
            <form class="form-horizontal" action="/login" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
