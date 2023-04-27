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
            <h2>Register</h2>
            <div class="row content">
                <div class="col-sm-8 text-center">
                    <form class="form-horizontal" action="/register" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fullName">Full Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fullName" placeholder="Enter full name" name="fullName">
                            </div>
                        </div>
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
                            <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" placeholder="Re-enter password" name="confirm_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
