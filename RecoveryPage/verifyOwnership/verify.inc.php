<?php
    session_start();
?>
<?php

    if(isset($_POST['submit'])){
        $givenPword = $_POST['answer'];

        if($givenPword == $_SESSION['recov_answer']){
            header("Location: ../resetPword/reset.php");
            exit();
        }else{
            header("Location: verify.php?error=incorrect");
            exit();
        }
    }else{
        header("Location: ../recov_username/recov_username.php");
        exit();
    }

?>