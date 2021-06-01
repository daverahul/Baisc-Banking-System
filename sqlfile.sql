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
$sql="CREATE TABLE login_user(
     id int(11) NOT NULL AUTO_INCREMENT,
     name varchar(50) NOT NULL,
     email varchar(50) NOT NULL,
    password varchar(50)  NOT NULL,
    PRIMARY KEY(id)
)";
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



?php                             ///////transfer.php
include_once 'db_connection.php';
if(isset($_POST['submit'])){
$from= $_GET['id'];
$to= $_POST['to'];
$amount=$_POST['amount'];
$sql ="select * from demotable where id=$from";
$query=mysqli_query($conn,$sql);
$sql1=mysqli_fetch_array($query);


$sql= "select * from demotable where id =$to";
$query=mysqli_query($conn,$sql);
$sql2=mysqli_fetch_array($query);

if(($amount)<0)
{
    echo '<script type =text/javascript>';
    echo 'alert("oops! neagtive values cannot be transferred")';
    echo '</script>';
}


}
?>


<tbody>
       

            <tr>
            <td class="py-2"><?php echo $rows['userId']; ?></td>
            <td class="py-2"><?php echo $rows['name']; ?></td>
            <td class="py-2"><?php echo $rows['number']; ?></td>
            <td class="py-2"><?php echo $rows['email']; ?> </td>
            <td class="py-2"><?php echo $rows['passowrd']; ?> </td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
                
       
        </tbody>




