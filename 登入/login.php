<?php
$ourdata=require_once "config.php";
 
$username=$_POST["username"];
$password=$_POST["password"];
$password_hash=password_hash($password,PASSWORD_DEFAULT);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM user WHERE username ='".$username."'";
    $result=mysqli_query($ourdata,$sql);
    if(mysqli_num_rows($result)==1 && $password==mysqli_fetch_assoc($result)["password"]){
        session_start();
        $_SESSION["loggedin"] = true;
        $result=mysqli_query($ourdata,$sql);
        $_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
        function_success("登入成功！"); 
    }
    else{
        function_alert("帳號或密碼錯誤"); 
    }
}
mysqli_close($link);

function function_alert($message){     
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    return false;
} 
function function_success($message){     
    echo "<script>alert('$message');
     window.location.href='../主頁/yanchengtour.html';
    </script>"; 
    return false;
} 
?>
