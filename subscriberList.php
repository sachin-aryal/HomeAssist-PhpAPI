<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/2/2016
 * Time: 8:28 PM
 */

include "DbConnection.php";
$categoryTitle = $_POST["categoryTitle"];

$query = "Select *from Subscriber where CategoryId='$categoryTitle'";
$result = $conn->query($query);
while($row = $result){
    $uQuery = "Select *from User where Username='".$row["UserId"]."'";
    $qResult = $conn->query($uQuery);
    while($qRow=mysqli_fetch_assoc($qResult)){
        $data[] = array("Name"=>$qResult["Name"],"Location"=>$qResult["Location"],"PhoneNo"=>$qResult["PhoneNo"]);
    }
    echo json_encode($data);
}
