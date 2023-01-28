<?php 

class LoginController extends SecureController {
    function login() {
        if (authenticate_user() == true) {
            return true;
        }
            if (isset($_
    }
}
