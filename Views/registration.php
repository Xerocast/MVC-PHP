<!--Erich Glenewinkel-->
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">  
    <title>Registration</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
  
</style>  
<body>  
  
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Registration</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="registration.php">  
                        <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Username" name="name" type="text" autofocus>  
                            </div> 
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                            </div>  
                                <!--this is our buttons and inputs that will dispaly on the page-->
  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >  
  
                        </fieldset>  
                    </form>  
                    <center><b>Already registered ?</b> <br></b><a href="../Welcome.php">Login here</a></center><!--for centered text-->  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
  
</html>  
  
<?php  
  
include "../Models/database.php";//make connection here  
if(isset($_POST['register']))  
{  
    $user_name=$_POST['name'];//here getting result from the post array after submitting the form.  
    $user_pass=$_POST['pass'];//same  
  
    
    if($user_name=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the name')</script>";  
        exit();//this use if first is not work then other will not show  
    }  
  
    if($user_pass=='')  //basic validation on the fields
    {  
        echo"<script>alert('Please enter the password')</script>";  
        exit();  
    } 
    //here query check weather if user already registered so user can't register again.  
    $check_user="select * from users WHERE username='$user_name'";  
    $run_query=mysqli_query($dbcon,$check_user);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
        echo "<script>alert('name $user_name is already exist in our database, Please try another one!')</script>";  //will throw an alert to tell you that a user already exists
        exit();  
    }  
    //insert the user into the database.  
    $salted = "hasher512encryption" + $user_pass + "saltadded"; //here basic salt is used (nothing too complex for this application).
                                                                //a unique salt would be used in real world applications and stored with the password in the database
    $hashedpass = hash('sha512', $salted);                      //Now the salted password is hashed with sha512.              //for future reference this encryption is not very secure. Crypt and other algorithms will need to be used
                                                                //we add the encrypted password instead of the actual one into the database which is safer (as data gets transferred the hashed password is difficult to crack as a simple password could have been easily used)
    $insert_user="insert into users (username , password) VALUE ('$user_name','$hashedpass')";  //Here the user will be registered/inserted into the database
             
    try 
    {
        if(mysqli_query($dbcon,$insert_user))                                                       //The hashed password is sent to the database
        {                                                                                           //then upon logon we salt and hash the password again and compare that to the stored password in the database
            echo "<script>alert('User $user_name created. Redirecting to login page...')</script>";
            header('Location: ..\welcome.php'); 
        }  
    } 
    catch (Exception $ex) 
    {
        echo "<script>alert('User registration failed: $ex')</script>";
    }
}  
  
?>  