<!--Erich Glenewinkel-->
<?php

    require_once('models/models.php');
    class Controller
    {
        public $model;
        
        public function __construct()
        {
            $this->models= new Model();//basic instantiate of the models class
        }
        
        public function log()
        {
            $reslt = $this->models->getlogin();
            
            if($reslt == 'login')
            { //here we have a type of menu within which the controller will decide page will get dumped onto the welcome page.
                include 'views/userdashboard.php';
            }
            else
            {
                include 'views/login.php';
            }
        }
    }
?>