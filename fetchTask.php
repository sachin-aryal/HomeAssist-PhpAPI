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
    $data[] = array("Title" =>$row["Title"],"Description" =>$row["Description"],"StartTime" =>$row["StartTime"],"EndTime" =>$row["EndTime"]);
}
echo json_encode($data);