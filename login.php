<?php
session_start();
$loginError = $_GET['message'];
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title>Math Game</title> 
    <meta charset="utf-8"> 
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style/style.css" type="text/css" />
</head> 
<body> 
    <div class="container text-center">
        <h1>Please login to enjoy our math game.</h1>
        <form action="authenticate.php" method="post">
            <div class="form-group row">
                <div class="col-sm-4 text-right col-sm-offset-1">
                    <label class="col-form-label" for="email">Email:</label>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 text-right col-sm-offset-1">
                    <label class="col-form-label" for="password">Password:</label>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>
            <div class="col-sm-12 col-sm-offset-5 text-left">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <div class="col-sm-12 col-sm-offset-5 text-left">
            <span class="message">
                <?php echo $loginError ?>
            </span>
        </div>
    </div> 
</body> 
</html>