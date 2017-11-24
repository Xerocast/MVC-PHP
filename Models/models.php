<!--Erich Glenewinkel-->
<?php
require_once('models/models.php');

class Model {
                    //in here we find functions that we will use. By dumping most functions into the models folder we can simply call these functions
    public function getlogin() {        //instead of having to rebuild each function each and every time that we want to do an insert, select, etc...

        if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) //this checks basically is the fields that we are gonna use set
        {

            include("/database.php");  //here we assign 2 variables the username and password
            $username=$_REQUEST['username'];  
            $password=$_REQUEST['password']; 
            
            $_SESSION["USERNAME"] = "$username"; //here we assign the session a username
            
            $salted = "hasher512encryption" + $password + "saltadded"; //here basic salt is used (nothing too complex for this application).
                                                                //a unique salt would be used in real world applications
            $hashedpass = hash('sha512', $salted);  
                    
            $check_user="select * from users WHERE username='$username' AND password='$hashedpass'";   //the hashed and salt added variable is now used to compare the database's hashed and salt password
                                                                                                       //if they are the same the the system will allow you to log in.
            $run=mysqli_query($dbcon,$check_user);  //basic variable used to connect and retreive data from the database
            
            if($username=="G" && $password=="E") //hardcoded to show some CRUD operations
            {
                header("Location: Views\adminDashboard.php");
            }
            else if(mysqli_num_rows($run))  
            {  
                return 'login'; //here we return to our model/controller a value which will allow us to move within the mvc-based structure.
       
            }  
            else  
            {  
                echo "<script>alert('Email or password is incorrect!')</script>";  // just as simple alert to let you know what went wrong
            }  
        }                                                                           //if the database were to be bigger I would create a class which would encapsulate the fields being inserted/updated in the database
    }                                                                               //this would also base the design more on OOP principles as well as safer as the data can be made private
} 
?>