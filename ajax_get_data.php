<?php
include_once "db_connection.php";
$sql="select *  from demotable";
$rs=$conn->query($sql);
$fetchalldata=$rs->fetch_all(MYSQLI_ASSOC);
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
foreach($fetchalldata as $customerdata)
{
    ?>
    <tr>
            <td class="py-2"><?php echo $customerdata['userId']; ?></td>
            <td class="py-2"><?php echo $customerdata['name']; ?></td>
            <td class="py-2"><?php echo $customerdata['email']; ?></td>
            <td class="py-2"><?php echo $customerdata['passowrd']; ?> </td>
            <td class="py-2"><?php echo $customerdata['number']; ?> </td>
            <td class="py-2"><?php echo $customerdata['balance']; ?> </td>
    </tr>
<?php
}
?>
</table>
 


