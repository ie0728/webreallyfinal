<?php 
$ourdata=require_once("config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $check="SELECT * FROM user WHERE username='".$username."'";
    if(mysqli_num_rows(mysqli_query($ourdata,$check))==0){
        $sql="INSERT INTO user (username,password)
            VALUES('".$username."','".$password."')";
        
        if(mysqli_query($ourdata, $sql)){
            function_success("註冊成功！將跳轉至登入頁面");
        }
    }
    else{
        function_alert("該帳號已有人使用!");
        exit;
    }
}

mysqli_close($ourdata);

function function_alert($message) { 
      
    echo "<script>alert('$message');
     window.location.href='register.php';
    </script>"; 
    
    return false;
} 
function function_success($message){     
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    return false;
} 
?>