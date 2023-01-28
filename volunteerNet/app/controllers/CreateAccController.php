<?php

class CreateAccController extends SharedController
{
    function __construct()
    {
        parent::__construct();
        $this->tablename = "users";
    }
    function index()
    {
        $this->render_view("CreateAcc.php");
    }
    function add() {
        if (isset($_GET['submit'])) {
            //check csrf token
            var_dump($_GET);
            $token = $_GET['csrf_token'];
            $db = $this->getModel();
            $geo = new GeoCoderController($_GET['address']);
            $coords = $geo->getGeoInfo();
            $longitude = $coords[0];
            $latitude = $coords[1];
            $username = $_GET['userName'];
            $password = $_GET['password'];
            $address = $_GET['address'];
            $email = $_GET['email'];
            $phoneNumber = $_GET['phoneNumber'];
            $dateJoined = date("m-d-y");
            tester();
            $description = $_GET['description'];
            $query = "INSERT INTO `users` (`userName`, `password`, `address`, `longitude`, `email`, `phoneNumber`, `dateJoined`, `description`) values ($username, $password, $address, $longitude, $latitude, $email, $phoneNumber, $dateJoined, $description)";
            $queryparams = null;
            tester();
            $db->rawQuery($query, $queryparams);
        }
		$page_title = $this->view->page_title = "Create Account";
		$this->render_view("CreateAcc.php");
    }
    function tester() {// remove in production
        $this->render_view("CreateAcc.php");
}
}
