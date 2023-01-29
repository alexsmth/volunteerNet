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
            $dateJoined = date("y-m-d");
            $description = $_GET['description'];
            $query = "INSERT INTO `users` (`userName`, `password`, `address`, `longitude`, `latitude`, `email`, `phoneNumber`, `dateJoined`, `description`) values ('$username', '$password', '$address', $longitude, $latitude, '$email', '$phoneNumber', '$dateJoined', '$description')";
            echo $query;
            $queryparams = null;
            $db->rawQuery($query, $queryparams);
        }
		$page_title = $this->view->page_title = "Create Account";
		$this->render_view("CreateAcc.php", "main_layout.php");
    }
}
