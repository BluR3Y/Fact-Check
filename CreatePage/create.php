<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>

    <form action="create.inc.php" method="POST" class="createForm">
        <div>
            <h1>Choose a username:</h1>
            <input type="text" placeholder="Enter username" name="username" required>
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "takenName"){
                        echo "<p class='errorMessage'>Username already taken!</p>";
                    }else if($_GET['error'] == "invalidUsername"){
                        echo "<p class='errorMessage'>Username may contain unaccepted characters</p>";
                    }
                }
            ?>
        </div>
        <div>
            <h1>Enter your Email:</h1>
            <input type="text" placeholder="Enter Email" name="email" required>
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "invalidEmail"){
                        echo "<p class='errorMessage'>Email address is invalid!</p>";
                    }else if($_GET['error'] == "takenEmail"){
                        echo "<p class='errorMessage'>Email address is already taken!</p>";
                    }
                }
            ?>
        </div>
        <div>
            <h1>Create your password:</h1>
            <input type="password" placeholder="Enter password" name="pword" required><br>
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "invalidPword"){
                        echo "<p class='errorMessage'>Password is too short!</p>";
                        echo "<p class='errorMessage'>Minimum is 6 characters.</p>";
                    }
                }
            ?>
        </div>
        <div>
            <h1>Choose recovery question:</h1>
            <select name="recov_question" id="questions">
                <option value="What was the house number and street name you lived in as a child?">What was the house number and street name you lived in as a child?</option>
                <option value="What were the last four digits of your childhood telephone number?">What were the last four digits of your childhood telephone number?</option>
                <option value="What primary school did you attend?">What primary school did you attend?</option>
                <option value="In what town or city was your first full time job?">In what town or city was your first full time job?</option>
                <option value="In what town or city did you meet your spouse or partner?">In what town or city did you meet your spouse or partner?</option>
                <option value="What is the middle name of your oldest child?">What is the middle name of your oldest child?</option>
                <option value="What is the name of the city where you were born?">What is the name of the city where you were born?</option>
                <option value="What is the name of your favorite movie?">What is the name of your favorite movie?</option>
            </select>
        </div>
        <div>
            <h1>Enter the answer to your security question:</h1>
            <input type="text" placeholder="Enter answer" name="recov_answer" required>
            <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "blanks"){
                        echo "<p class='errorMessage'>Please fill in all fields!</p>";
                    }else if($_GET['error'] == "problem"){
                        echo "<p class='errorMessage'>There was a problem creating your account!</p>";

                    }
                }
            ?>
        </div>
        <button type="submit" class="submit" name="createUser">Submit</button>
    </form>

</body>
</html>