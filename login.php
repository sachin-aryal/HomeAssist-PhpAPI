<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/2/2016
 * Time: 12:48 PM
 */


include "DbConnection.php";

$username=$_POST["Username"];
$password=$_POST["Password"];
$query="Select *from User where Username='$username' AND Password='$password'";
$result = $conn -> query($query);
$row = mysqli_fetch_assoc($result);
if($row){
    $data = Array("login" => true,"name"=>$row["Name"],"location"=>$row["Location"],"phoneNumber"=>$row["PhoneNo"],
        "emailAddress"=>$row["Email"],"username"=>$row["Username"]);
    echo json_encode($data);
}
else
{
    $data = Array("login" => false);
    echo json_encode($data);
}
