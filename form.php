<!DOCTYPE html>
<html>

<head>
    <title>Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        #head_text {
            text-align: center;

        }

        #description {
            text-align: center;
        }

        body {
            background-color: lavenderblush;
        }
    </style>

</head>


<body>
    <?php
    include "navbar.php";
     include "db_connection.php";
    
    $name = $number = $email = $password = $confirmpswd = $comment ="";
    $name_err = $number_err = $email_err = $pswd_err = $confirm_err="";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $number=$_POST['number'];
            $password=$_POST['password'];
            $confirmpswd=$_POST['confirmpswd'];
            $balance=$_POST['balance'];
            $comment=$_POST['comment'];
           
          
        }
       
        if (empty($_POST["name"])) {
            $name_err = "Name is required";
            
        } else {
            $name = input_data($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $name_err = "only letters are allowed";
                
            }
        }
        
        if (empty($_POST["number"])) {
            $number_err = "number is required";
            
        } else {
            if (!preg_match("/^[0-9]*$/", $number)) {
                $number_err = "only numeric value is allowed";
                
            } else {
                
            }
        }

        if (empty($_POST["email"])) {
            $email_err = "Email is required";
        
        } else {
            $email = input_data($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "invalid email addresss";
            
            }
        }
       if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = input_data($_POST["comment"]);
        }
        
        if (empty($_POST["password"])) {
            $pswd_err = "passowrd must not be empty";
            
        } else {
            $password = input_data($_POST["password"]);
            
        }
        
        if (empty($_POST["confirmpswd"])) {
            $confirm_err = "field  must not be empty";
            
        } else if($password != $confirmpswd) {
            $confirm_err = "password does not match ";
            
        } 
        
        
        
    }
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

       
    ?>

    <div class="container-fluid" id="heading1">
        <h1 id="head_text">Signup form </h1>
        <p id=description> Fill this form to become a regular customer</p>
    </div>
    <hr>

    <div class="container">
        <h6>All * included inputs are mandantory to fill</h6>
        <form method="POST" action= "contact.php">
            <div class="form-group">
                <label for="name">Fullname:</label>
                *<input class="form-control" name="name" id="name" type="text" placeholder="Fullname" value="<?php echo $name ?>">
                <p id="fullname_error"><?php echo $name_err ?></p>
            </div>
          


            <div class="form-group">
                <label for="number">Number:</label>
                *<input class="form-control" name="number" id="number" type="number"  min="10" placeholder="Mobile-number" >
                <p id="number_error"><?php echo $number_err ?></p>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>*
                <input class="form-control" name="email" id="email" type="email" placeholder="1234@gmail.com" >
                <p id="email_error"><?php echo $email_err ?></p>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>*
                <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                <p id="passowrd_error"><?php echo $pswd_err ?></p>
            </div>
            <div class="form-group">
                <label for="confirmpswd">Confirm Password:</label>*
                <input class="form-control" name="confirmpswd" id="confirmpswd" type="password" placeholder="Confirm-password" >
                <p id="confirmpswd_error"><?php echo $confirm_err ?></p>
            </div>
            <div class="form group">
            balance:
                <input class="form-control" type="number" placeholder="balance" name="balance">
            </div>
            <div class="form-group">
                <label for="comment"><strong>Comments:</strong></label>
                <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
            </div>
            <label>
                <input type="checkbox" checked="checked" name="Remember">
                Remember-Me
            </label>
            <p>By creating an account you agree to our<a href="#">Terms and Conditions</a></p>
            <div class="clearfix">
                <button type="button" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary" name ="submit">Sign-up</button>
            </div>
        </form>
    </div>
</body>
<script type=text/javascript>
    $(document).ready(function() {
        $("#name").blur(function() {
                var username = $("#name").val();
                var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
                if (username == '') {
                    $("#fullname_error").text("Fullname must not be empty").css("color", "red");
                    return false;
                } else if (username != '') {
                    if (username.match(format)) {
                        $("#fullname_error").text("fullname must not contain any symbol").css("color", "red");
                        return false;
                    } else if (username.length < 2) {
                        $("#fullname_error").text("fullname must contain at least 2 character").css("color", "red");
                        return false;
                    } else {
                        return true;

                    }
                }
            }),
            //$("#number").blur(function() {
               // var reg = /[0-9]{10}/;
               // var mobnum = $("#number").val();
                //if (mobnum.match(reg)) {
                    //return true;

                //} else {
                   // $("#number_error").text("Invalid input").css("color", "red");
                    //return false;

                //}
            //}),
            $("#email").blur(function() {
                var input = $("#email").val();
                var validRegex = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;"
                if (input.match(validRegex)) {
                    return true;

                } else {
                    $("#email_error").text("invalid Email Address").css("color", "red");
                    return false;

                }

            }),
            $("#passowrd").blur(function() {
                var letter = /[a-zA-Z]/;
                var number = /[0-9]/;
                var pswd = $("#password").val();
                if (pswd.length < 8 || !letter.test(pswd) || !number.test(pswd)) {
                    $("#password_error").text("weak password");
                    return false;
                } else {
                    return true;
                }

            }),
            $("#confirmPswd").blur(function() {
                if ($("#password").val() == $("#confirmpswd_error").val()) {
                    $("#confirmpswd_error").text("Matched").css("color", "green");
                } else {
                    $("#confirmpswd_error").text("Not Matched").css("color", "red");
                }

            })
    });
</script>

</html>