<?php
    session_start();
?>
<?php
    if(!isset($_SESSION['username'])){
        header("Location: ../recov_username/recov_username.php");
        exit();
    }
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify Ownership</title>
    <link rel="stylesheet" href="verify.css">
</head>
<body>

    <form action="verify.inc.php" method="POST" class="verify">
        <?php
            echo "<h1 class='username'>".$_SESSION['username']."</h1>";
        ?>

        <h1 id="prompt">Please Answer the Recovery Question:</h1>
        <?php
            echo "<p class=recov_question>".$_SESSION['recov_question']."</p>";
        ?>

        <input type="text" placeholder="answer" name="answer" required>

        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "incorrect"){
                    echo "<p class='errorMessage'>Incorrect Answer!</p>";
                }
            }
        ?>

        <button type="submit" name="submit">Submit</button>

    </form>


</body>
</html>