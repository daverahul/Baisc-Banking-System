<?php
include_once "db_connection.php";
$db =$conn;
function fetch_data(){
    global $db;
    $sql="SELECT * from demotable ORDER BY userId DSEC";
    $query=mysqli_query($db,$sql);
    if(mysqli_fetch_row($query)>0){
        $row=mysqli_fetch_all($query,MYSQLI_ASSOC);
        return $row;


    } else{
        return $row=[];

    }
}
$fetchdata=fetch_data();
show_data($fetchdata);



function show_data($fetchdata){
echo  '<table border="1">
<tr>
    <th>S.N</th>
    <th>Full Name</th>
    <th>Email Address</th>
    <th>Number</th>
    <th>balance</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>';
if(count($fetchdata)>0){
    $sn=1;
    foreach($fetchdata as $data){
        echo "<tr>
        <td>".$sn."</td>
        <td>".$data['name']."</td>
        <td>".$data['email']."</td>
        <td>".$data['number']."</td>
        <td>".$data['balance']."</td>
        <td><a href='crud-form.php?edit=".$data['id']."'>Edit</a></td>
        <td><a href='crud-form.php?delete=".$data['id']."'>Delete</a></td>
 </tr>";
$sn++;
    }
}
else{
    echo "<tr>
           <td colspan='7'>NO data found</td>
           </tr>";
}
echo "</table>";

}
?>