<?php

class CreateAccController extends SharedController {
	function __construct(){
		parent::__construct();
		$this->tablename = "users";
	}
    function index() {
        $this->render_view("CreateAcc.php");
    }
    function add() {
        //index();
        //var_dump($_POST);
        //$this->render_view("CreateAcc.php");
        //tester();
            //check csrf token
            //tester();
            //$token = $_POST['csrf_token'];
            //$db = $this->getModel();
            //$geo = new GeoCoderController($_POST['address']);
            //$coords = $geo->getGeoInfo();
            //$longitude = $coords[0];
            //$latitude = $coords[1];
            //$username = $_POST['userName'];
            //$password = $_POST['password'];
            //$address = $_POST['address'];
            //$email = $_POST['email'];
            //$phoneNumber = $_POST['phoneNumber'];
            //$dateJoined = date("m-d-y");
            //tester();
            //$description = $_POST['description'];
            //$query = "INSERT INTO `users` (`userName`, `password`, `address`, `longitude`, `email`, `phoneNumber`, `dateJoined`, `description`) values ($username, $password, $address, $longitude, $latitude, $email, $phoneNumber, $dateJoined, $description)";
            //$queryparams = null;
            //tester();
            //$db->rawQuery($query, $queryparams);
		//$page_title = $this->view->page_title = "Create Account";
		//$this->render_view("CreateAcc.php");
    }
    function tester() { //remove in production
        echo "<h1>Test</h1>";
}
}
