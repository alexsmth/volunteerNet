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
                        <button class="homepagebuttons" align="center"><a href = "<?php print_link("MissionsFirst")?>" target="_self">Volunteer</a></button>
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

            <div align = "center" style= "border: 20px;">
            <div style="border: 1px;">
            <form id="Help Request" action="<?php print_link("AskForHelp/add") ?>" method="get">
                    <label for="name">Name: </label><br>
                    <input type="text" name=author id="name"></input><br>
                    <label for="org">Organization: </label><br>
                    <input type="text" name=organization id="org"></input><br>
                    <br>
                    <br>
                    <label for="address">Address: </label><br>
                    <input type="text" name=address id="address"></input><br>
                    <label for="ptitle">Post Title: </label><br>
                    <input type="text" name=event_name id="ptitle"></input>
                    <label for="desc">Post Description: </label><br>
                    <input type="text" id="desc" name=description></input>
                    <input type=hidden name=csrf_token value="<?php echo $csrf_token?>"></input>
                    <input type="submit" name="submit" value="Submit"></input>
                </form>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>
