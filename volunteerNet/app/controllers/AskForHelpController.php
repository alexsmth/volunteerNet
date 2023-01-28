<?php

class AskForHelpController extends SharedController {
	function __construct(){
		parent::__construct();
		$this->tablename = "events";
	}
    function index() {
        $this->render_view("AskForHelp.php", "main_layput.php");
    }
    function add() {
        if (isset($_POST['submit'])) {
            //check csrf token
            var_dump($_POST);
            $token = $_POST['csrf_token'];//do something with security if you have time
            $db = $this->GetModel();
            $geo = new GeoCoderController($_POST['address']);//connect to main feature
            $coords = $geo->getGeoInfo();
            $longitude = $coords[0];
            $latitude = $coords[1];
            $UserID = $this->getUserID();//currently undefined
            $author = $_POST['author'];
            $organization = $_POST['organization'];
            $address = $_POST['address'];
            $event_name = $_POST['event_name'];
            $description = $_POST['description'];
            $time = date("y-m-d");
            $status = true;
            $query = "INSERT INTO `events` (`UserID`, `address`, `time`, `description`, `organizstion`, `author`, `event_name`, `status`) values ($UserID, '$address', '$time', '$description', '$organization', '$author', '$event_name', $status)";
            $queryparams = null;
            $db->rawQuery($query, $queryparams);
    }
	$page_title = $this->view->page_title = "Create Event";
	$this->render_view("AskForHelp.php", "main_layput.php");
}
}
