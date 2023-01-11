<?php
//Download rss file
$rss = simplexml_load_file('#');
//Check if 1 hour has passed
$filetime = time() - filemtime('feed.xml');
if ($filetime > 3600) {
    //Download rss file
    $rss = simplexml_load_file('#');
    //Save rss file
    $rss->asXML('feed.xml');
}
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }



        @media (min-width: 1919px) {

            #img {
                background-image: url('');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 0;
            }

            #bar {
                position: absolute;
                top: 80%;
                left: 0;
                width: 100%;
                height: 20%;
                background-image: url('./assets/barra.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                z-index: 1;
                border: 1px solid rgba(0, 0, 0, 0.8);
            }

            #content {
                position: absolute;
                top: 0%;
                left: 12%;
                width: 87.5%;
                height: 100%;
                z-index: 2;
                overflow: visible;
            }

            #logo {
                background-image: url('./img/logos.png');
                position: absolute;
                top: 1%;
                left: 0;
                width: 100%;
                height: 35%;
                padding-left: 35px;


                color: #fff;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 4em;
                font-weight: bold;
            }

            #logob {
                background-image: url('./img/detail1.png');
            }

            #rodap {
                background-image: url('./img/rodape.png');
                position: absolute;
                top: 35%;
                left: 0;
                padding-left: 35px;
                width: 85%;
                height: 65%;

                color: #fff;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 3em;
            }

            #barrav {
                background-image: url('./img/rectangle.png');
            }

            #record {
                background-image: url('./img/text-raster.png');
            }

            #totaldem {
                background-image: url('./img/text-raster2.png');
            }
        }
    </style>
    <script>

    </script>
</head>

<body>
    <!-- DISCLAIMER -->
    <!-- All rights reserved to Combo Videos -->
    <!-- Usage of this feed is limited to Combo Videos partners -->
    <!-- Contact development team for more info -->
    <!-- desenvolvimento@combovideos.com.br -->
    <div id="img" src="./linuxbg.jpg" class="animate__animated animate__fadeIn"></div>
    <div id="bar" class="animate__animated animate__slideInUp">
        <div id="content">
            <div id="logo" class="animate__animated animate__delay-1s animate__fadeIn">###</div>
            <div id="logob" class="animate__animated animate__delay-1s animate__fadeIn">###</div>
            <div id="barrav" class="animate__animated animate__delay-1s animate__fadeIn">###</div>
            <div id="record" class="animate__animated animate__delay-1s animate__fadeIn">###</div>
            <div id="totaldem" class="animate__animated animate__delay-1s animate__fadeIn">###</div>
            <div id="rodap" class="animate__animated animate__delay-1s animate__fadeIn">###</div>
        </div>
    </div>
    <script>
        function is_cached(src) {
            var image = new Image();
            image.src = src;

            return image.complete;
        }


        $.ajaxSetup({
            cache: false
        });
        //Get rss file feed.xml
        $.get('feed.xml', function(data) {
            //Get entire file
            var item = $(data).find('item');
            //Get size of
            var size = item.length;
            console.log(size);

            //localStorage set item
            if (localStorage.getItem('index') == null) {
                localStorage.setItem('index', size);
            }
            if (localStorage.getItem('current') == null) {
                localStorage.setItem('current', 0);
            } else if (localStorage.getItem('current') == 0) {
                localStorage.setItem('current', 1);
            } else if (localStorage.getItem('current') < size - 1) {
                localStorage.setItem('current', parseInt(localStorage.getItem('current')) + 1);
            } else {
                localStorage.setItem('current', 0);
            }
            console.log(localStorage.getItem('current'));

            var title = $(item[localStorage.getItem('current')]).find('title').text();

            var link = $(item[localStorage.getItem('current')]).find('image').text(); //Ao invés de "linkfoto" é "image" no .xml
            //Por vir como 0.jpg, diriamos que antes de 0.jpg ou "link" temos "https://combovideos.com.br/integra/valor_economico_v2/"

            //Var link = url + link (O link antigo vai ser o "0.jpg")
            link = "https://combovideos.com.br/integra/valor_economico_v2/" + link;
            $('#description').text(title);
            $('#img').css('background-image', 'url(' + link + ')');
        });

        //Esse trecho coloca todas as fotos do .xml em cache quando a página é carregada

        //Quando documento estiver pronto
        $(document).ready(function() {
            //Carrega o feed.xml
            $.get('feed.xml', function(data) {
                //Pega todos os itens do feed.xml
                var item = $(data).find('item');
                //Pega a quantidade dos itens
                var size = item.length;
                //Percorre todos os itens
                for (i = 0; i < size; i++) {
                    //Se for o primeiro item
                    if (i == 0) {
                        //Verifica se a imagem está em cache
                        $check = is_cached($(item[i]).find('image').text());
                        console.log($check);
                    }
                    //Se não estiver em cache	
                    if ($check == false) {
                        //Cria um novo objeto imagem
                        var image_preload = new Image();
                        //Atribui a imagem ao objeto
                        image_preload.src = $(item[i]).find('image').text();
                    }
                    //Continua o loop até todas imagens estarem em cache
                }
            });
        });
    </script>
</body>

</html>