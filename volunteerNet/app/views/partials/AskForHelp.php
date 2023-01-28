
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
        <t1>Need Help?</t1>
        <caption>Submit a request here!</caption>
            <div id = "buttondivide" align = "right">
                <table style="position: absolute; top: 0; right: 0;">
                    <th>
                        <button class="homepagebuttons" align="center" target="">Volunteer</button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center" target="Profile.php">Profile</button>
                    </th>

                    <th>
                        <button class="homepagebuttons" align="center" target="">Ask for help</button>
                     </th>
                </table>
            </div>

            <div style="border: 1px;">
                <form id="Help Request" action="one of the php files idk" method="post">
                    <label for="fname">First Name: </label><br>
                    <input type="text" id="fname"></input><br>
                    <label for="lname">Last Name: </label><br>
                    <input type="text" id="lname"></input><br>

                    <br>
                    <br>
                    <label for="address">Address: </label><br>
                    <input type="text" id="address"></input><br>
                    <label for="ptitle">Post Title: </label><br>
                    <input type="text" id="ptitle"></input>
                    <label for="desc">Post Description: </label><br>
                    <input type="text" id="desc"></input>
                    <input type="submit"></input>
                </form>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>