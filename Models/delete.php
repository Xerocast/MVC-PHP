<!--Erich Glenewinkel-->
<?php  

include("./database.php");  
$deleteUser=$_GET['del'];   //here we receive a input from the previous page
$deleteQuery="delete  from users WHERE username='$deleteUser'";//delete query  
$run=mysqli_query($dbcon,$deleteQuery);  
try
{
    if($run)   //here our query gets built and then run
    {   
        //javascript function to open in the same window
        echo "<script>window.open('../Views/adminDashboard.php?deleted=user has been deleted','_self')</script>";  
    }
} 
catch (Exception $ex) 
{
    echo "<script>alert('Delete FROM DB failed: $ex')</script>";       
}
?>  