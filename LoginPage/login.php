<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="login.inc.php" class="LoginForm" method="POST">
        <h1 class="Login" id="username">UserName:</h1>
        <input type="text" placeholder="Enter Username" value="<?php
        if(isset($_GET['passedName'])){
            echo "".$_GET['passedName']."";
        }
        ?>" name="username">
        
        <h1 class="Login" id="password">Password:</h1>
        <input type="password" placeholder="Enter Password" name="pword">

        <button type="submit" class="submit" name="LoginUser">Submit</button>
    
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyInput"){
                    echo "<p class='errorMessage'>Fill in all fields!</p>";
                }else if($_GET["error"] == "invalidInput"){
                    echo "<p class='errorMessage'>Invalid Info!</p>";
                }else if($_GET["error"] == "incorrectPword"){
                    echo "<p class='errorMessage'> Wrong Password!</p>";
                }else if($_GET["error"] == "maxAttempts"){
                    echo "<p class='errorMessage'> Max Number of Attempts Reached!</p>";
                }else if($_GET["error"] == "userDNE"){
                    echo "<p class='errorMessage'> User Does Not Exist!</p>";
                }
            }
        ?>
    
        <a href="../CreatePage/create.php" class="redirect create">Create Account</a>
        <a href="../RecoveryPage/recov_username/recov_username.php" class="redirect recover">Recover Account</a>

    </form>

</body>
</html>