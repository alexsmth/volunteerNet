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
    function add($formdata = null)
    {
        if (isset($_POST['submit'])) {
            //check csrf token
            $token = $_GET['csrf_token'];
            $db = $this->getModel();
            $geo = new GeoCoderController($_POST['address']);
            $coords = $geo->getGeoInfo();
            $longitude = $coords[0];
            $latitude = $coords[1];
            $username = $_POST['userName'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $dateJoined = date("m-d-y");
            $description = $_POST['description'];
            $query = "INSERT INTO `users` (`userName`, `password`, `address`, `longitude`, `email`, `phoneNumber`, `dateJoined`, `description`) values ($username, $password, $address, $longitude, $latitude, $email, $phoneNumber, $dateJoined, $description)";
            $page_title = $this->view->page_title = "Create Account";
            $this->render_view("CreateAcc.php");
        }
    }
}