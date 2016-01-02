
<html>

<?php
//
include '../CommonPage/initializer.php';
include 'autoMail.php';
//Check For Login using checkUser function

?>
<!--<link rel="stylesheet" href="../jquery-ui-1.11.4.custom/jquery-ui.css">-->
<!--<script src="../jquery-ui-1.11.4.custom/jquery-ui.js"></script>-->
<head>
    <meta http-equiv="refresh" content="3600">
    <?php
    include '../CommonPage/addDetails.php';
    ?>
    <script>
        $(document).ready(function () {
            activeClass('home')
        })
    </script>
    <style>
        div#allButton {
            float: right;
            margin-top: -43px;}

    </style>
</head>
<body>
<?php
if($_SESSION['deleteMessage']!=null){
if($_SESSION["deleteMessage"]==true) {
    $_SESSION["deleteMessage"]=null;
    echo '<script>
           $.msgBox({
                title: "Deleted",
                content: "Sucessfully Deleted",
                type: "alert",
                opacity: 0.5,
                buttons: [{ value: "Ok" }],
                success: function (result) {
                   return true;
                }
            });
            </script>';
}
}
if($_SESSION["mailSent"]!=null){
    if($_SESSION["mailSent"]==true){
        /* echo '<div class="ui positive message" id="saveSuccess">
                                     <p>Mail sent!!!</p>
                                 </div>';*/
        echo '<script>$.msgBox({
                    title: "Mail",
                    content: "Mail Sent Sucessfully!!",
                    type: "alert",
                    opacity: 0.5,
                    buttons: [{ value: "Ok" }],
                    success: function (result) {
                        if (result == "Ok") {
                        }
                    }
                });</script>';
        $_SESSION["mailSent"]=null;
    }
    else{
        echo '<div class="ui negative message" id="saveSuccess">
                                    <p>Error while sending mail!!!</p>
                                </div>';
        $_SESSION["mailSent"]=null;
    }
}

?>
<?php
        include "../CommonPage/header.php";
        include_once '../CommonPage/nav.php'
        ?>
    <div class="container-fluid">
        <?php
       include '../CommonPage/addPopUp.php'
        ?>
    </div>
<div class="ui segment">
    <div class="table-responsive">




        <?php
        echo '<form action="sendMail.php" method="post">';
        foreach ($sId as $value) {
            $queryStudent = $conn->query("SELECT *FROM student WHERE Rollno = '" . $value . "'");
            while ($row1=mysqli_fetch_assoc($queryStudent)) {
                $emailId[] = $row1["Email"];
            }
            echo "<input type='hidden'  name='mailNumber' value='$mailNumber'/>";
            echo "<input type='hidden' name='emailId_".$i."' value='$emailId[$i]'/>";
            echo "<input type='hidden' name='bookName_".$i."' value='$bName[$i]'/>";
            $i++;
        }
        echo '<button type="submit" class="ui primary button">Send Mail&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button>';
        ?>
        </form>
        <div id="allButton">
            <a class='ui primary button' href="editAll.php">Edit All&nbsp;&nbsp;<span class='glyphicon glyphicon-edit' aria-hidden='true'></a>
            <a class='ui button' onclick="javascript:fnOpenNormalDialog('ajakoDate')">Delete All&nbsp;&nbsp;<span class='glyphicon glyphicon-remove' aria-hidden='true'></a>
        </div>

        </th>
        </tr>
        </tfoot>
        </table>
    </div>
    <?php

?>
</div>
</body>
</html>
