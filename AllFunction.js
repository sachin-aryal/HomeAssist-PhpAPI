/**
 * Created by sachin on 1/2/2016.
 */

function fetchCategory(){
    $("#categoryTitle").empty();
    $("#categoryTitle").append($('<option value="">'+"Select Option"+'</option>'));
    $.ajax({
        url:'http://localhost/HomeAssist/fetchCategory.php',
        type:'POST',
        dataType: "JSON",
        success:function(data){
            var i=1;
            for(var j=0;j<data.length;j++){
                $("#categoryTitle").append($('<option value="'+data[j][i]+'">'+data[j][i]+'</option>'));
                i++;
            }
        }
    });
}

function login(){
    var userName = $("#username").val();
    var password = $("#password").val();
    var data = "Username="+userName+"&Password="+password;
    var dataName=["login","name","location","phoneNumber","emailAddress","username"];
    $.ajax({
        url:'http://localhost/HomeAssist/login.php',
        type:'POST',
        data:data,
        dataType: "JSON",
        success:function(data){
            if(data[dataName[0]]==true){
                alert("Logged in successfully!!");
                for(var i=0;i<dataName.length;i++){
                    console.log(data[dataName[i]]);
                }
            }else{
                alert("Username and Password did not match..");
            }

        }
    })
}

function register(){
    var data = $("#frmPersonalInfo").serialize();
    console.log(data);
    $.ajax({
        url:'http://localhost/HomeAssist/register.php',
        type:'POST',
        data:data,
        dataType:"JSON",
        success:function(data){
            if(data["result"]=="success"){
                alert(data["register"])
            }else{
                alert(data["register"])
            }

        }
    })

}


function fetchTask(){
    var categoryTitle = $("#categoryTitle").val();
    var taskD = $("#taskTable").find("#taskBody");
    taskD.empty();
    var data = "categoryTitle="+categoryTitle;
    var dataName=["Title","Description","StartTime","EndTime"];
    $.ajax({
        url:'http://localhost/HomeAssist/fetchTask.php',
        type:'POST',
        data:data,
        dataType:"JSON",
        success:function(data){
            for(var i=0;i<data.length;i++){
                var taskD = $("#taskTable").find("#taskBody");
                taskD.append('<tr id="'+i+'"></tr>');
                for(var k=0;k<dataName.length;k++){
                    console.log(data[i][dataName[k]]);
                    if(data[i][dataName[k]]!="undefined"){
                        $(taskD).find("#"+i).append($('<td>"'+data[i][dataName[k]]+'"</td>'))
                    }
                }

            }
        }
    })
}
