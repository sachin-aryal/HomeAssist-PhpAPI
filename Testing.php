<?php
/**
 * Created by IntelliJ IDEA.
 * User: sachin
 * Date: 1/2/2016
 * Time: 3:15 PM
 */

?>
<html>
<head>
    <script src="AllFunction.js" type="text/javascript"></script>
    <script src="jquery-1.8.0.min.js" type="text/javascript"></script>
</head>
<body>
    <button onclick="fetchCategory()">Category</button>
</body>
<input type="text" id="username" name="username"/>
<input type="text" id="password" name="password"/>
<button onclick="login()">Login</button>
<select name="categoryTitle" id="categoryTitle" onchange="fetchTask()">

</select>
<table id="taskTable">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Start Time</th>
        <th>End Time</th>
    </tr>
    <tbody id="taskBody">

    </tbody>
</table>
</html>