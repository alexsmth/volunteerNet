
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
                padding: 10px;
                margin-right: 5px;
            }
        </style>
    </head>

    <body>
        <!--- meow --->
        <t1></t1>
        <!-- consider adding the resume script on this page or a link to it --->
        <?php
            $info = $comp_model->getUserInfo($UID);
            ?>
            <div id="userInformation">
                <h1><?php echo $info[0]["username"]?>,</h1> <br>
                <p><?php echo $info[0]["description"]?>,</p> <br> 
                <p>Email: <b><?php echo $info[0]["email"]?></b></p><br>
                <p>Phone Number: <b><?php echo $info[0]["phoneNumber"]?></b></p><br>
                <caption>Date Joined: <b><?php echo $info[0]["dateJoined"]?> </caption>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>

</html>
