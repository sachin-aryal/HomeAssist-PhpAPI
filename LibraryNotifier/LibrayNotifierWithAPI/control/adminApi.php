<!---->
<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: sachin-->
<!-- * Date: 10/3/15-->
<!-- * Time: 12:17 PM-->
<!-- */-->
<?php
$action="todaysData";
$json_data = json_encode($action);
$todaysData = file_get_contents('http://localhost:8080/libraryapi/BookTransactionController/ignore/todaysData',null,stream_context_create(array(
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
$parsedData=str_replace(array("[","]"),"",explode(',',(string)$todaysData));
?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
</head>
<body>
<table id="example">
    <thead>
    <tr>
        <th>Member Name</th>
        <th>Book Name</th>
        <th>Email Address</th>
        <th>Issue Date</th>
        <th>Due Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $size= sizeof($parsedData)/5;
    for($i=0;$i<sizeof($parsedData);$i++) {
        ?>
        <tr>
            <td><?php echo $parsedData[$i++] ?></td>
            <td><?php echo $parsedData[$i++] ?></td>
            <td><?php echo $parsedData[$i++] ?></td>
            <td><?php echo $parsedData[$i++] ?></td>
            <td><?php echo $parsedData[$i] ?></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $(function(){
        $("#example").dataTable();
    })
</script>
</body>
</html>