<?php

    function emptyValues($username,$email,$pword,$recov_question,$recov_answer)
    {
        $results = false;
        if(empty($username) || empty($email) || empty($pword) || empty($recov_question) || empty($recov_answer)){
            $results = true;
        }
        return $results;
    }

    function validUsername($username){
        $results = true;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ //error
            $results = false;
        }
        return $results;
    }

    function validEmail($email)
    {
        $results = false;
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $results = true;
        }
        return $results;
    }

    function validPword($pword)
    {
        $results = true;
        if(strlen($pword)<6)
        {
            $results = false;
        }
        return $results;
    }


?>