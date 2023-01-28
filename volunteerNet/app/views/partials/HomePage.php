
<html>
    <head>
        <!--- meta data --->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VolunteerNet</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" src="/temppic.png">

        <style>
            .homepagebuttons{
                border-radius: 25px;
                padding: 10px;
                margin-right: 5px;
            }
        </style>
    </head>

    <body>
        <!--- home page website --->
        <div id="HomePage" align = "center">
            <h1 style="padding: 20px;">Welcome to the VolunteerNet!</h1>
            <p>description</p>

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
            
            <hr/>
            <br>
            <br>

            <h3 align = "center">
                Missions in your location.
            </h3>

            <div style=" border-block: double; height: 900px; width: 1000px; padding: 50px;">
                <h5 style="background-color: green; color: rgb(255, 255, 255);"> What's new in your area.<h5>
                <iframe href="php/Missions.php" style="padding: 50px;" height="900px" width="1000px" title="poop time"></iframe>
             </div>

             <br>
             <br>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>