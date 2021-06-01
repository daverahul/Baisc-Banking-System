<?php

include_once "navbar.php";
session_start();
$message="";
if(count($_POST)>0){
    include_once 'db_connection.php';
    $sql="select * from demotable WHERE email= '".$_POST["email"]."' and passowrd='".$_POST["password"]."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if(is_array($row)){
        $_SESSION["id"]=$row['userId'];
        $_SESSION["name"]=$row['name'];
    }else{
        $message="invalid username or password";
    }
}
if(isset($_SESSION["id"]))
{
      $name= $_SESSION["name"];
    echo "sucessfully logged IN";
    header("location:home.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOGIN page</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<style>
   
</style>

</head>

<body>
   
<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="" method="post" class="row g-3">
                    <div class="message"><?php if($message!="") { echo $message; } ?></div>

                        <h4>Enter login details</h4>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email ID">
                            <p id="user_error"></p>
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password"  id="password" class="form-control" placeholder="Password">
                            <p id="pswd_error"></p>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="save" class="btn btn-dark float-end">Login</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Have not account yet? <a href="form.php">Signup</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>


</html>