<!--Erich Glenewinkel-->
<html>
    <head></head>
    <body>
        <form action="" method="POST">
            <p>
                <label>Username</label>
                <input id="username" value="" name="username" type="text" required="" />
                <br>
            </p>
            <p>
                <label>Password</label>
                <input id="password" name="password" type="password" required=""/>
            </p>
            <br />
            <p>
                <button type="submit"<span>Login</span></button>
                <button type="reset"<span>Cancel</span></button>
            </p>
            <p>
                <center><b>Not registered yet?</b> <br></b><a href="Views/Registration.php">Register here</a></center><!--for centered text--> 
                <!--this is a very basic html based login which runs and upon submission returns 2 inputs to the model class to login.-->
                <!--the data from the 2 inputs are requested by the next page.-->
            </p>
        </form>
    </body>
</html>