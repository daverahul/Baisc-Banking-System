CREATE TABLE demoTable (
     userId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     name varchar(20) NOT NULL,
     number int(15) NOT NULL,
     email varchar(20) NOT NULL,
     passowrd varchar(20) NOT NULL,
     confirmpassword  varchar(20) NOT NULL,
     balance int(10) NOT NULL,  
     comment varchar(500)
);

if($conn->query($sql)===true){
    echo "table created sucessfully";

}else{
    echo "error".$conn->error;

}
$conn->close();

SELECT * FROM user_data WHERE (userid='" . $_POST["userid_or_email"] . "' or email='" . $_POST["userid_or_email"] . "') and password = '". $_POST["password"]."'");

sql=mysqli_query($conn,"select * from demotable where userid='$ID'");
$row=mysqli_fetch_array($sql);
$ID=$_SESSION["id"];










