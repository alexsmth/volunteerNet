i<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<?php 
        if (isset($_POST['submit'])) {
            $token = $_POST['csrf_token'];
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
            tester();
            $description = $_POST['description'];
            $query = "INSERT INTO `users` (`userName`, `password`, `address`, `longitude`, `email`, `phoneNumber`, `dateJoined`, `description`) values ($username, $password, $address, $longitude, $latitude, $email, $phoneNumber, $dateJoined, $description)";
            $queryparams = null;
            tester();
            $db->rawQuery($query, $queryparams);
		$page_title = $this->view->page_title = "Create Account";
        }
?>
<html>
    <head>
        <!--- meta data --->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!---- somebody PLEASE fix the favicon it wont work and its upsetting me----->
        <link rel="icon" type="image/x-icon" href="views/images/temppic.png">

        <style>
            .homepagebuttons{
                border-radius: 25px;
                padding: 10px;
                margin-right: 5px;
            }
        </style>
    </head>

    <body>
        <!--- The little buttons --->
        <div id = "buttondivide" align = "right">
                <table style="position: absolute; top: 0; right: 0;">
                    <th>
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("home")?>" target="_self">Home</a></button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("MissionsFirst")?>" target="_self">Volunteer</a></button>
                    </th>         

                    <th>
                        <button class="homepagebuttons" align="center" ><a href = "<?php print_link("Login")?>" target="_self">Login</a></button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("AskForHelp")?>" target="_self">Ask for help</a></button>
                     </th>
                </table>
        </div>     

        <!--- Create account form --->
        <h1 align="center">Don't have an account?</h1>
        <br>
        <p align="center">Don't worry! You can make one right here. :)</p>

        <hr/>

        <div align="center "style="border: 1px;">
        <form action="<?php print_link("CreateAcc/add")?>" method="get">
            <label for="userName">Username: </label><br>
            <input  name='userName' required value="test" type="text"/><br>
            <label for="userName">Password: </label><br>
            <input  name='password' required value="test" type="text"/><br>
            <label for="email">Email: </label><br>
            <input  name='email' required value="test" type="text"/><br>
            <label for="phoneNumber">Phone Number: </label><br>
            <input  name='phoneNumber' value="test" type="text"/><br>
            <label for="address">Address: </label><br>
            <input   name='address' required value="Fishers High School, Promise+Road, Fishers, IN" type="text"/><br>
            <label for="description">User description: </label><br>
            <input  name='description' value="test" type="text"/><br>
            <input name='crsf_token' type='hidden' value="<?php echo $csrf_token?>"/><br>
            <input type="submit" name="submit" value="Submit"/>
        </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>
