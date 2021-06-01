<?php
   include_once 'db_connection.php';
   if(isset($_POST['submit'])){
       $name=$_POST['name'];
       $email=$_POST['email'];
       $number=$_POST['number'];
       $password=$_POST['password'];
       $confirmpswd=$_POST['confirmpswd'];
       $balance=$_POST['balance'];
       $comment=$_POST['comment'];
     
   
  
   $sql="INSERT INTO demotable(name,number,email,passowrd,confirmpassword,balance,comment)
   VALUES ('$name','$number','$email','$password','$confirmpswd','$balance','$comment')";
   if(mysqli_query($conn,$sql)){
        echo "successfully registered";
        header("Location: login.php?status=success");

   }else{
       echo "error:".$sql."<br>".mysqli_error($conn);
      }
}
mysqli_close($conn);
?>
