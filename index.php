<?php 
session_start(); 
if (!isset($_SESSION["authenticated"])){
	header("Location: login.php"); 
    die();
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title>Math Game</title> 
    <meta charset="utf-8"> 
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="style.css" type="text/css" />
</head> 
<body> 
    <div class="container text-center">
        <div class="col-sm-12 text-right">
        	<a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
        <header><img src="images/pixel-speech-bubble.png" alt=""></header>
        <div class="row" id="equation">
            <?php 
            extract($_POST);
            if (isset($_SESSION["score"])) {
                $_SESSION["score"] = $_SESSION["score"];
            } else {
                $_SESSION["score"] = 0;
            }
            if (isset($_SESSION["attempts"])) {
                $_SESSION["attempts"];
            } else {
                $_SESSION["attempts"] = 0;
            }
            $attempts = 0;
            $number1 = rand(0,50);
            $number2 = rand(0,50);
            $operator = array('+','-');
            $randoperator = $operator[rand(0,1)];
            
            echo $number1 . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $randoperator . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $number2;
            
            switch ($operation) {
            case "+":
                $correct_value = $first_number + $second_number;
                break;
            case "-":
                $correct_value = $first_number - $second_number;
                break;
            }
            
            ?>    
        </div>   
        <form action="index.php" method="post">
            <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-4"><br />
                	<input type="text" class="form-control" id="input" name="input" placeholder="Enter answer" size="6">
                </div>
            </div>
            <div class="col-sm-12 text-center">
            	<button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div>
                <input type="hidden" name="first_number" value= "<?php echo $number1 ?>"/>
                <input type="hidden" name="operation" value="<?php echo $randoperator ?>" />
                <input type="hidden" name="second_number" value="<?php echo $number2 ?>" />
                <input type="hidden" name="total" value="<?php echo $score ?>" />
                <input type="hidden" name="score" value="<?php echo $attempts ?>" />
            </div>
        </form>
        <hr class="col-sm-12">
        <div class="col-sm-12">
            <?php 
                extract($_POST);
                    if (is_numeric($input)) {
                        $_SESSION["attempts"]++;
                        if ($input == ($correct_value)) {
                            $_SESSION["score"]++;
                            echo "<p style='green'>Score: " .$_SESSION["score"]. " / " .$_SESSION["attempts"]. "</p>";
                        } else {
                            echo "<p style='green'>Score: " .$_SESSION["score"]. " / " .$_SESSION["attempts"]. "</p>";
                        }
                    } else {
                         echo "<p style='green'>Score: " .$_SESSION["score"]. " / " .$_SESSION["attempts"]. "</p>";
                    }
            ?>    
        </div>
        <div class="col-sm-12">
            <?php 
                extract($_POST);
                    if (is_numeric($input)) {
                        if ($input == $correct_value) {
                            echo '<div class="col-sm-4 col-sm-offset-4"><span class=correct>Correct</div>';
                        } else {
                            echo '<div class="col-sm-4 col-sm-offset-4"><span class=message>INCORRECT, ' . $first_number . " " . $operation . " " . $second_number . ' is ' . $correct_value . '.</span></div>';
                        }
                    } else {
                        echo '<div class="col-sm-4 col-sm-offset-4"><span class=message>Please input number</span></div>';
                    }
            ?>
        </div>
    </div> 
</body> 
</html>