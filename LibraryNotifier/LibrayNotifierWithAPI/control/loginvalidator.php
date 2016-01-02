<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 7/24/15
 * Time: 12:30 PM
 */
require_once '../CommonPage/initializer.php';
$username=$_POST["Username"];
$password=$_POST["Password"];
$action="login";
//$query="Select *from user where Username='$username' AND Password='$password'";
$json_data = json_encode($query);

$accessResult = file_get_contents('http://localhost:8080/libraryapi/BookTransactionController/'.$username."&".$password."/".$action,null,stream_context_create(array(
    'http' => array(
        'protocol_version' => 1.1,
        'user_agent'       => 'PHPExample',
        'method'           => 'GET',
        'header'           => "Content-type: application/json\r\n".
            "Connection: close\r\n" .
            "Content-length: " . strlen($json_data) . "\r\n",
        'content'          => $json_data,
    ),
)));

$_SESSION["Username"]=null;
if($accessResult=="false"){
    redirect_to('index.php');
}
else
{
    $_SESSION["Username"] = $row["Username"];
    redirect_to('admin.php');
}
?>

<script>
    function parseData(json){
        console.log(json)
    }

</script>

