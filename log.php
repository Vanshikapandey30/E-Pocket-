<?php

$userid=filter_input(INPUT_POST,'userid');
$password=filter_input(INPUT_POST,'password');
if(!empty($userid)) {
    if(!empty($password)){
        $host = "localhost";
        $dbuserid = "root";
        $dbpassword = "";
        $dbname = "lp";
//create connection
        $conn = new mysqli ( $host, $dbuserid, $dbpassword, $dbname);
        if (mysqli_connect_error()){
        die('Connect Error ('.
            mysqli_connect_errno().')' .
            mysqli_connect_error());

        }
        else{
            $sql = "INSERT INTO login1 (userid,password) values ('$userid','$password')";
            if ($conn->query($sql)) {
                echo "New record is inserted succesfully";
        }
        else{
            echo "Error: ". $sql . "<br>" . $
                    conn->error;
            }
            $conn->close();
        
        }
    }
    else{
        echo "Password should not be empty";
        die();
    }
}
else{
    echo "Userid shpould not be empty";
    die();
}

?>