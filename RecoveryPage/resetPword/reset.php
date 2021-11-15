<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="reset.css">
</head>
<body>

    <form action="reset.inc.php" method="POST" class="resetPword">

    <?php
        echo "<h1 class='username'>".$_SESSION['username']."</h1>";
    ?>

    <h1 id="prompt">Enter new account password:</h1>
    <input type="password" placeholder="password" name="newPword" required>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "invalidPword"){
                echo "<p class='errorMessage'>Invalid Password!</p>";
                echo "<p class='errorMessage'>Must have atleast 6 characters</p>";
            }else if($_GET['error'] == "unknown"){
                echo "<p class='errorMessage'>Something Went Wrong!</p>";
                echo "<p class='errorMessage'>Please Try Again</p>";
            }
        }
    ?>

    <button type="submit" name="submit">Submit</button>

    </form>

</body>
</html>