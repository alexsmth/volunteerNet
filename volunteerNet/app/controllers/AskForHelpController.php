<?php

class AskForHelpController extends SecureController {
	function __construct(){
		parent::__construct();
		$this->tablename = "events";
	}
    function index() {
        $this->render_view('AskForHelp.php');
    }
    function add($formdata = null) {
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("eventID", "UserID", "address", "time", "description", "organizstion", "author", "event_name");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'eventID' => 'required|numeric',
				'UserID' => 'required|numeric',
				'address' => 'required',
				'time' => 'required',
				'event_name' => 'required',
				'description' => '',
				'author' => 'required',
				'organization' => '',
			);
			$this->sanitize_array = array(
				'eventID' => 'sanitize_string',
				'UserID' => 'sanitize_string',
				'address' => 'sanitize_string',
				'time' => 'sanitize_string',
				'event_name' => 'sanitize_string',
				'description' => 'sanitize_string',
				'author' => 'sanitize_string',
				'organization' => 'sanitize_string',
            );
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			//Check if Duplicate Record Already Exit In The Database
			$db->where("eventID", $modeldata['eventID']);//add username has been taken later
			if($db->has($tablename)){
				$this->view->page_error[] = $modeldata['eventID']." Already exist!";
			} 
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Event Created", "success");
					//return	$this->redirect("HomePage");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Create Event";
		$this->render_view("AskForHelp.php");
    }
}
