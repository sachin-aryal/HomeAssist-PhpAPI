<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/3/2016
 * Time: 2:50 AM
 */

include "DbConnection.php";

$searchItem = $_POST["searchItem"];
$query="Select *from Task where CategoryId='%$searchItem%' OR Title='%$searchItem%' OR Description='%$searchItem%',";
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