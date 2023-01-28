<?php
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
$UID = $comp_model->getUserID();
?>
<html>
    <head>
        <!--- meta data --->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Missions</title>
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
        <!--- buttons --->
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
        <!-- foreach loop creates multiple html divs as it is in between the braces -->
        <?php
            $arr = $comp_model->getMissions($UID);
            foreach($arr as $row) {
?>
        <div id="<?php echo $row["event_name"] ?>">
            <h2><?php echo $row["event_name"]?></h2>
            <p><?php echo $row["description"]?></p>
            <p><b><?php echo $row["time"]?>, At: <?php echo $row["address"]?></b></p>
            <p><?php echo $row["author"]?>, <?php echo $row["organizstion"] ?></p>
        </div>
        </br>
<?php }?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>
