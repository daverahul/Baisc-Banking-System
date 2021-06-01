<?php
 include_once "navbar.php";
 include_once 'db_connection.php';
 $sql ="select * from demotable ";
 $query=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> transaction history</title>
</head>

<body>
<div class="container">
        <h2 class="text-center pt-4">Transaction History</h2>
        
       <br>
       <?php
       if(mysqli_num_rows($query)>0){
           ?>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Number</th>
                <th class="text-center">Email</th>
                <th class="text-center">password</th>
                <th class="text-center">balance</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
        while($rows=mysqli_fetch_array($query)){
            
        ?>

            <tr>
            <td class="py-2"><?php echo $rows['userId']; ?></td>
            <td class="py-2"><?php echo $rows['name']; ?></td>
            <td class="py-2"><?php echo $rows['number']; ?></td>
            <td class="py-2"><?php echo $rows['email']; ?> </td>
            <td class="py-2"><?php echo $rows['passowrd']; ?> </td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
                
        <?php
       
            }
            $i++;
        ?>
        </tbody>
    </table>
    <?Php
    }
    else{
        echo"NO  Results found";
    }
    ?>
 
    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
