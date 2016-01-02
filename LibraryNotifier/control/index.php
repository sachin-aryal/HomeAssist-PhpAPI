<html>
<head>
    <?php
    include '../CommonPage/linking.php';
    include '../CommonPage/initializer.php';
    ?>

    <script type="text/javascript">
        function login(){
            var data = $("#loginForm").serialize();
            console.log(data)
            $.ajax({
                url:'http://localhost/HomeAssist/login.php',
                type:'POST',
                data:data,
                success:function(data){
                    for(var i=0;i<data.length;i++){
                        console.log(data[i].login)
                    }
                }
            })
        }
    </script>
</head>
<body>
<?php include "../CommonPage/header.php"; ?>
<div class="container">
    <div id="formWrapper" style="
    width: 330px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 10px;
    border:2px solid #00827c;
    margin-top:15px;
">
        <form id="loginForm" >
            <fieldset>
                <legend>
                    <h2 style="text-align: center">Login</h2>
                </legend>
                <label>Username</label><i class="user icon"></i>
                <input type="text" id="Username"  class="form-control" placeholder="Username" required autofocus name="Username">

                <br>
                <label>Password</label><i class="lock icon"></i>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="Password"/>
                <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login();">Login</button>
            </fieldset>
        </form>
    </div>
</div>




</body>
</html>