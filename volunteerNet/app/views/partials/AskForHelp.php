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
        <h3 align="center">Need Help?</h3>
        <hr>
        <br>
        <p align="center">Submit a volunteer request here!</p>
            <div id = "buttondivide" align = "right">
                <table style="position: absolute; top: 0; right: 0;">
                    <th>
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("home")?>" target="_self">Home</a></button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("Missions")?>" target="_self">Volunteer</a></button>
                    </th>         

                    <th>
                        <button class="homepagebuttons" align="center" ><a href = "<?php print_link("Login")?>" target="_self">Login</a></button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("AskForHelp")?>" target="_self">Ask for help</a></button>
                     </th>
                </table>
            </div>

            <div align = "center" style= "border: 20px;">
            <form id="Help Request" action="<?php print_link("AskForHelp/?crsf_token=$csrf_token") ?>" method="post">
                    <label for="fname">First Name: </label><br>
                    <input type="text" id="fname"></input><br>
                    <label for="lname">Last Name: </label><br>
                    <input type="text" id="lname"></input><br>
                    <label for="email">Email: </label><br>
                    <input type="text" id="email"></input><br>
                    <label for="phonenum">Phone Number: </label><br>
                    <input type="text" id="phonenum"></input><br>

                    <br>
                    <br>
                    <label for="address">Address: </label><br>
                    <input type="text" id="address"></input><br>
                    <label for="ptitle">Post Title: </label><br>
                    <input type="text" id="ptitle"></input><br>
                    <label for="desc">Post Description: </label><br>
                    <input type="text" id="desc"></input><br>
                    <input type="submit"></input>
                </form>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>
