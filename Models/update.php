<!--Erich Glenewinkel-->
<?php  

include("./database.php");  
$upUser=$_REQUEST['a'];   //here we receive a input from the previous page
$upPass = $_REQUEST['b'];
$use = $_GET['c'];
$updateQuery="UPDATE users SET username='$upUser', password='$upPass' WHERE username = '$use'";//update query  
$run=mysqli_query($dbcon,$updateQuery);  
try
{
    if($run)   //here our query gets built and then run
    {   
        //javascript function to open in the same window
        echo "<script>window.open('../Welcome.php?deleted=user has been deleted','_self')</script>";  
      
    }
} 
catch (Exception $ex) 
{
        echo "<script>alert('Delete FROM DB failed: $ex')</script>";
}

  
?>  