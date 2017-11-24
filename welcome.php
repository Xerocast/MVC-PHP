<!--Erich Glenewinkel-->
<?php
SESSION_START();

require_once("controllers/controller.php");

$controllers = new Controller(); //here we instantiate the controller and then use the log function inside of it
$controllers->log();
//here we start by including (inserting pages into this page moving inside the mvc-based structure
//USERNAME: G PASSWORD: E is the default admin account
//please check inside database or use user a/a for testing purposes

?>