<!--Erich Glenewinkel-->
<?php  
try //try catch to catch and display any errors that have occurred
{
    $dbcon=mysqli_connect("localhost","root","");   //This is a basic connection to the database
    mysqli_select_db($dbcon,"users");               //This is a connection to the users database where in the tables lie

} 
catch (Exception $ex) 
{
    echo "<script>alert('Connection to DB failed')</script>";
}
?>  