<?php
$texto = file_get_contents('./config/data.txt');
$texto = explode("\n", $texto);
$textoc = $texto[0];
$textob = $texto[1];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Tecmundo</title>

    <link rel="preload" href="./assets/animate.min.css" as="style">
    <link rel="preload" href="./assets/jquery.min.js" as="script">


    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <script src="./assets/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/animate.min.css">
    <style>
        @font-face {
            font-family: "museo";
            src: url('./Museo900-Regular.otf');

        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }



        #logo {

            position: absolute;
            background-image: url('./assets/logos.png');
            background-repeat: no-repeat;
            top: 0;
            width: 100%;
            height: 20%;
            z-index: 1;
        }

        #detallogo {
            position: absolute;
            background-image: url('./assets/detail1.png');
            background-repeat: no-repeat;
            top: 10%;
            width: 100%;
            height: 20%;
            z-index: 1;
        }

        #txttotal {
            position: absolute;
            background: url('./assets/text-raster.png') no-repeat center;

            top: 13%;
            width: 100%;
            height: 58%;

            z-index: 1;



            object-fit: contain;
        }

        #txtbv {
            position: absolute;
            background: url('./assets/text-raster2.png') no-repeat center;
            background-repeat: no-repeat;
            top: 8%;

            justify-content: center;
            width: 100%;
            height: 100%;

            z-index: 1;
            object-fit: contain;


        }

        #barrav {
            position: absolute;
            background-image: url('./assets/rectangle.png');
            background-repeat: no-repeat;
            top: 72%;
            width: 100%;
            height: 18%;

            z-index: 1;

        }

        #bar {
            position: absolute;
            top: 90%;
            left: 5.6%;
            width: 100%;
            height: 10%;
            background-image: url('./assets/rodape.png');

            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;

            object-fit: contain;
        }

        #content {
            position: absolute;
            top: 5%;

            width: 100%;
            height: 70%;
            z-index: 1;
            overflow: visible;
        }

        #dias {
            position: absolute;
            top: 31%;
            width: 100%;
            height: 17%;
            color: green;
            z-index: 10;
            font-family: 'museo';
            font-size: 15.5em;
            text-align: center;
            font-weight: 800;


        }

        #diabv {
            position: absolute;
            top: 79.7%;
            width: 100%;
            height: 10%;
            color: white;
            z-index: 10;
            font-family: 'museo';
            font-size: 8.5em;
            text-align: center;
            font-weight: 800;

        }
    </style>
    <script>

    </script>
</head>

<body>

    <!-- rodap-->
    <div id="bar" class="animate__animated animate__slideInRight"></div>



    <!--barra verde -->
    <div id="barrav" class="animate__animated  animate__fadeIn">

        <div id="content">
            <div id="txtbv" class="animate__animated animate__delay-1s 250ms; animate__fadeIn"></div>
        </div>

    </div>
    <!-- texto do centro -->
    <div id="txttotal" class="animate__animated animate__delay-1s animate__fadeIn animate__slow "></div>

    <!-- linha em baixo do logo-->
    <div id="detallogo" class="animate__animated animate__slideInDown"></div>

    <!-- logo-->
    <div id="logo" class="animate__animated animate__slideInDown"></div>

    <!--dias centro -->
    <div id="dias" class="animate__animated animate__delay-1s animate__fadeIn animate__slow"><?= $textoc ?></div>

    <!-- dias barra verde -->
    <div id="diabv" class="animate__animated animate__delay-1s animate__fadeIn"><?= $textob ?></div>

    <script>



    </script>
</body>

</html>