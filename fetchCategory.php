<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/2/2016
 * Time: 12:41 PM
 */

include "DbConnection.php";

$query="Select *from Category";
$queryResult=$conn->query($query);

$i=1;
while($row=mysqli_fetch_assoc($queryResult)) {
    $data[] = array($i =>$row["Title"]);
    $i++;
}
echo json_encode($data);