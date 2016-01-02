<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/2/2016
 * Time: 2:13 PM
 */

include "DbConnection.php";


$categoryTitle = $_POST["categoryTitle"];
$taskTitle = $_POST["taskTitle"];
$description = $_POST["description"];
$startTime = $_POST["startTime"];
$endTime=$_POST["endTime"];
$username=$_POST["Username"];

$dupQuery="Select *from Task where CategoryId='$categoryTitle' and Title='$taskTitle' and Description='$description' and StartTime='$startTime' and EndTime='$endTime' and UserId='$username'";
$dupResult = $conn->query($dupQuery);

if($dupRow = mysqli_fetch_assoc($dupResult)){
    $data = Array("subscriber" => "Your Task is already in the list");
    echo json_encode($data);
}else {

    $query = "Insert into Task VALUES(NULL,'$categoryTitle','$taskTitle','$description','$startTime','$endTime','$username')";
    $conn->query($query);

    $dupQuery = "Select *from Task where CategoryId='$categoryTitle' and Title='$taskTitle' and Description='$description' and StartTime='$startTime' and EndTime='$endTime' and UserId='$username'";
    $checkResult = $conn->query($dupQuery);

    if ($checkResult) {
        $data = Array("subscriber" => "Your Task is saved successfully!!");
        echo json_encode($data);
    } else {
        $data = Array("subscriber" => "Error while saving your Task!!");
        echo json_encode($data);
    }
}

