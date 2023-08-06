<?php 
include "../controller/Controller.php";
echo (new Controller)->registerAccount($_POST);