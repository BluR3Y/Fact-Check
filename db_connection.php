
<?php

class Database
{
    public function connect()
    {
        $dbhost = "localhost";  
        $dbuser = "root";   
        $dbpass = "";   
        $db = "factcheck"; 
        $this->connection = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }

    public function query($query)
    {
        return mysqli_query($this->connection,$query);
    }
}

?>