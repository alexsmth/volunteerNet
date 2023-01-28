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
                        <button class="homepagebuttons" align="center" action = "" target="_self">Volunteer</button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center" action = "" target="_self">Home</button>
                    </th>
<th>
                        <button class="homepagebuttons" align="center" target="_self">Profile</button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center" target="_self">Ask for help</button>
                     </th>
                </table>
        </div>     

        <!--- Create account form --->
        <h1 align="center">Don't have an account?</h1>
        <caption align="center">Don't worry! You can make one right here. :)</caption>

        <hr/>

        <div align="center "style="border: 1px;">
        <form action="<?php print_link("CreateAcc/add")?>" method="post">
        <input  name='userName' required value="test" type="text"/>
        <input  name='password' required value="test" type="text"/>
        <input  name='email' required value="test" type="text"/>
        <input  name='phoneNumber' value="test" type="text"/>
        <input   name='address' required value="test" type="text"/>
        <input  name='description' value="test" type="text"/>
        <input name=crsf_token type=hidden value="<?php echo $csrf_token?>"/>
        <input type="submit" name="submit" value="Submit"/>
        </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>
