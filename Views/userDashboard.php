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
    }  /*styling rules*/
    .table 
    {  
        margin-top: 50px;  
    }  
</style>  
<body> 
<div class="table-scrol">  
    <h1 align="center">Welcome User: <?php echo $_SESSION["USERNAME"]; ?></h1>  
    <!--here we print the user which is written into said session. We can then use this session for quite a couple of nice calculations and such-->
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
        <tr>  
            <th>Username</th>  
            <th>Password</th>  
        </tr>  
        </thead>  
  
        <?php  
        $USER = $_SESSION["USERNAME"];
        echo $USER;
        
        include("\Models\database.php");  
        $view_users_query="select * from users WHERE username='$USER'";//select query for viewing users.  
        $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $username=$row[0];  
            $userpass=$row[1]; //stores username and password in a variable and outputs said variabls one by one as the while loop iterates through the results
        }
        
        $link = "Views/Update.php?userher=" . urlencode($username);         //variable which stores the link and theuser that will be sent to the update page to use for updating current logged in user data
        ?>  
  
        <tr>  
            <!--here showing results in the table -->  
            <td><?php echo $username;  ?></td>                              
            <td><?php echo $userpass;  ?></td>  
        </tr>  
    </table>  
</div>  
</div>  
                                        <!--here we send the user through the link to the next page and use that user as our user to update their data-->
<center><b>Want to update?</b> <br></b><a href="<?PHP echo $link ?>">Update your details here</a></center><!--for centered text-->
<center><b>Want to logout?</b> <br></b><a href="welcome.php" <?PHP session_abort(); ?>>Logout here</a></center><!--for centered text--> 
  
</body>  
  
</html>  