<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/2/2016
 * Time: 2:40 PM
 */

include "DbConnection.php";

$categoryTitle = $_POST["categoryTitle"];
$query="Select *from Task where CategoryId='$categoryTitle'";
$queryResult=$conn->query($query);

$data = array();
while($row=mysqli_fetch_assoc($queryResult)) {
    $uQuery = "Select *from User where Username='".$row["UserId"]."'";
    $qResult = $conn->query($uQuery);
    while($qRow=mysqli_fetch_assoc($qResult)){
        $data[] = array("Title" =>$row["Title"],"Description" =>$row["Description"],"StartTime" =>$row["StartTime"],"EndTime" =>$row["EndTime"],
            'Name'=>$qRow["Name"],"Location"=>$qRow["Location"],"PhoneNo"=>$qRow["PhoneNo"],"Email"=>$qRow["Email"]);
    }
}
echo json_encode($data);