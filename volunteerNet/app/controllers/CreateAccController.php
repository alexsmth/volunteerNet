<?php

class CreateAccController extends BaseController {
	function __construct(){
		parent::__construct();
		$this->tablename = "users";
	}
    function index() {
        $this->render_view("CreateAcc.php");
    }
    function add($formdata = null) {
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("UserID", "userName", "password", "address", "email", "phoneNumber", "dateJoined", "description");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'UserID' => 'required|numeric',
				'userName' => 'required',
				'password' => 'required',
				'address' => 'required',
				'email' => 'required',
				'phoneNumber' => '',
				'dateJoined' => 'required',
				'description' => '',
			);
			$this->sanitize_array = array(
				'UserID' => 'sanitize_string',
				'userName' => 'sanitize_string',
				'password' => 'sanitize_string',
				'address' => 'sanitize_string',
				'email' => 'sanitize_string',
				'phoneNumber' => 'sanitize_string',
				'dateJoined' => 'sanitize_string',
				'description' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			//Check if Duplicate Record Already Exit In The Database
			$db->where("UserID", $modeldata['UserID']);//add username has been taken later
			if($db->has($tablename)){
				$this->view->page_error[] = $modeldata['UserID']." Already exist!";
			} 
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Account Created", "success");
					//return	$this->redirect("HomePage");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Create Account";
		$this->render_view("CreateAcc.php");
    }
}
