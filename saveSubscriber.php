<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/2/2016
 * Time: 1:58 PM
 */

include "DbConnection.php";

$username=$_POST["Username"];
$categoryTitle=$_POST["CategoryTitle"];
$dupQuery = "Select *from Subscriber where CategoryId='$categoryTitle' and UserId='$username'";

$dupResult = $conn->query($dupQuery);

if($dupRow = mysqli_fetch_assoc($dupResult)){
    $data = Array("subscriber" => "Your profile is already in the list");
    echo json_encode($data);
}else{

    $query = "Insert into Subscriber VALUES(NULL,'$categoryTitle','$username')";
    $conn -> query($query);

    $checkResult = $conn->query($dupQuery);

    if($dupRow = mysqli_fetch_assoc($checkResult)){
        $data = Array("subscriber" => "Your profile is saved successfully!!");
        echo json_encode($data);
    }
    else
    {
        $data = Array("subscriber" => "Error while saving your profile!!");
        echo json_encode($data);
    }
}