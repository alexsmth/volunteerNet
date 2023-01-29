i<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
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
        <!--- meow --->
        <!--- The little buttons --->
        <div id = "buttondivide" align = "right">
                <table style="position: absolute; top: 0; right: 0;">
                    <th>
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("home")?>" target="_self">Home</a></button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center">
                            <a href = "<?php print_link("MissionsFirst")?>" target="_self">Volunteer</a>
                        </button>
                    </th>         

                    <th>
                    <button class="homepagebuttons" align="center">
                        <?php
                           if($isloggedin = false){
                               echo "<a href = 'Login' target = '_self'> Login</a>)";
                           }else{
                               echo "<a href = 'Profile' target='_self'>Profile</a>)";
                           }
                        ?>
                        </button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("AskForHelp")?>" target="_self">Ask for help</a></button>
                     </th>
                </table>
        </div>     

        <!--- Login form --->
        <h3 align="center">Login!</h3>

        <hr/>

        <div align="center " style = "border-block: double; border-radius: 20px; border: 2px;">
        <form action="<?php print_link("Login/login")?>" method="get">

                <label for="username">Username: </label><br>
                <input type="text" name=username id="username"></input><br>

                <label for="password">Password: </label><br>
                <input type="text" name=password id="username"></input><br>

                <input type="submit" name=submit value="Submit"></input><br>
            </form>
        </div>

        <h6 align="center"><a href="<?php print_link("CreateAcc")?>" target="_self">Don't have an account? Create one here!</a></h6>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>
