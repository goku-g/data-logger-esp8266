<?php
    include('config.php');

    $var = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data=test_input($_POST['distance']);
        $remark=test_input($_POST['remarks']);

        if($data && $remark)
        {
            
            // $con->query("INSERT INTO distance_data (id, distance, timestamp, remarks) VALUES (NULL, '".$data."', current_timestamp(), '".$remark."');");
            
            $var = "ok";

        }
        else
        {
            $var = "invalid";
        }
        echo $var;
        
        
    }
    else
    {
        $var = "There is no POST requests.";
    }

    function test_input($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }
?>