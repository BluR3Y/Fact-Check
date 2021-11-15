<!DOCTYPE html>
<html>
<head>
    <title>Recover Username</title>
    <link rel="stylesheet" href="recov_username.css">
</head>
<body>

    <form action="recov_username.inc.php" method="POST" class="recov_username">
        
        <div class="username">
            <h1>Please Enter the Username or Email address associated with your account</h1>
            <input type="text" placeholder="username/email" name="givenName" required>
        </div>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "userNotFound"){
                    echo "<p class='errorMessage'>User Not Found!</p>";
                }
            }
        ?>

        <button type="submit" class="submit" name="searchName">Search</button>


    </form>

</body>
</html>