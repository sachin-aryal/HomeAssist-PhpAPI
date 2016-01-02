<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/2/2016
 * Time: 1:07 PM
 */

include "DbConnection.php";

$name = $_POST["name"];
$location = $_POST["location"];
$phoneNumber = $_POST["phone"];
$emailAddress = $_POST["emailAddress"];
$username=$_POST["uname"];
$password=$_POST["passwordPInfo"];

$queryL="Select *from User where Username='$username'";
$result = $conn -> query($queryL);
$row = mysqli_fetch_assoc($result);
if($row){
    $data = Array("register" => "Username already exists. Try another username",'result'=>'error');
    echo json_encode($data);
}
else
{
    $queryR="Insert into User VALUES(NULL,'$name','$location','$phoneNumber','$emailAddress','$username','$password')";
    $conn -> query($queryR);
    $resultC = $conn -> query($queryL);
    $rowC = mysqli_fetch_assoc($resultC);
    if($rowC){
        $data = Array("register" => "Your profile saved successfully",'result'=>'success');
        echo json_encode($data);
    }else{
        $data = Array("register" => "Error while saving your profile..",'result'=>'error');
        echo json_encode($data);
    }

}