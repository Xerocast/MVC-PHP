<!--Erich Glenewinkel-->
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->  
    <title>View Users</title>  
</head>  
<style>  
    .login-panel 
    {  
        margin-top: 150px;  
    }  
    .table 
    {  
        margin-top: 50px;  
    }  
  
</style> 
<body>  
<div class="table-scrol">  
    <h1 align="center">Welcome Admin</h1> 
    <h1 align="center">All the Users</h1>  
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
        <tr>  
            <th>Username</th>  
            <th>Password</th>  
            <th>Delete User</th>  
        </tr>  
        </thead>  
  
        <?php   
        include("../Models/database.php");  
        $view_users_query="select * from users";//select query for viewing users.  
        $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $username=$row[0];  
            $userpass=$row[1];  
        ?>  
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $username;  ?></td>  
            <td><?php echo $userpass;  ?></td>  
            <!--//here we display the rows of users with their hashed passwords-->
            <td><a href="..\Models\delete.php?del=<?php echo $username ?>"><button class="btn btn-danger">Delete</button></a></td>
            <!--here we have a button which calls a function (gives the function a username) that will in turn delete the selected user-->
        </tr>  
        <?php } ?>  
    </table>  
        </div>  
</div>  
<center><b>Want to logout?</b> <br></b><a href="../welcome.php" <?PHP session_abort(); ?>>Logout here</a></center><!--basic logout button-->  
  
</body>  
  
</html>  