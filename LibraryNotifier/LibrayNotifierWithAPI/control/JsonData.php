<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 10/2/15
 * Time: 3:19 PM
 */

$json = file_get_contents('http://localhost:8080/libraryapi/BookTransactionController');
$obj = json_decode($json);
echo json_encode($obj)

?>