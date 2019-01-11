<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>

    <!-- ############################################################################## -->
    <!--                          Définition des variables php                          -->
    <!-- ############################################################################## -->
    <?php 
        // Chemin relatif d'accès aux fichiers
        $rootpath = "";
        $Titre_Browser = "Accueil";
        $Titre_Page = "Bienvenue sur Domokit !";
        // Menu de navigation en cours d'utilisation 
        $Menu_Actif = "Accueil";

        // On vérifie qu'on est autorisé à accéder à la page
        session_start();
         if ($_SESSION['authenticated'] != true) {header('Location: '.$rootpath.'Connexion/login.php');}
    ?>

    <!-- ############################################################################## -->
    <!--                              Titre de la page                                  -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Title.php"); ?>

    <!-- ############################################################################## -->
    <!--                              Feuilles de Style                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/StyleSheet.php"); ?>


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>


    <!-- ############################################################################## -->
    <!--                             Panel Gauche (Navigation)                          -->
    <!-- ############################################################################## -->
    <aside id="left-panel" class="left-panel">

        <?php include($rootpath."Trame/Navigation.php"); ?>

    </aside>

    <!-- ############################################################################## -->
    <!--                             Panel Droite (Header)                              -->
    <!-- ############################################################################## -->
    <div id="right-panel" class="right-panel">


        <?php include($rootpath."Trame/Header.php"); ?>

        <!-- ############################################################################## -->
        <!--                             Panel Droite (Contenu)                             -->
        <!-- ############################################################################## -->
        <div class="content mt-3">


            <!-- ############################################################################## -->
            <!--                             Carousel                            -->
            <!-- ############################################################################## -->
            <?php $imagepath = $rootpath."images/domokit/carousel/"; ?>
            <?php $avatarpath = $rootpath."images/avatar/"; ?>

            <?php $image_doc_path = $rootpath."images/domokit/"; ?>
            <?php $downloadpath = $rootpath."Download/"; ?>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12  d-flex align-items-stretch">
                        <div class="card">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                                    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                    <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
                                </ol>
                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <a href=<?php echo $rootpath."Tree/DevZone/Ressources/BoxDomokit.php"?>> <img
                                            class="first-slide" src=<?php echo $imagepath.'image1.png'?>
                                            alt="First slide">
                                            <div class="container">
                                                <div class="carousel-caption">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="https://github.com/Thomas-Broussard/">
                                            <img class="first-slide" src=<?php echo $imagepath.'image2.png'?>
                                            alt="First slide">
                                            <div class="container">
                                                <div class="carousel-caption">
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="carousel-item ">
                                        <a href=<?php echo $rootpath."Tree/MenuPrincipal/MesObjets/Gestion_Objets.php"?>>
                                            <img class="first-slide" src=<?php echo $imagepath.'image3.png'?>
                                            alt="First slide">
                                            <div class="container">
                                                <div class="carousel-caption">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================================== -->
                <!--                                  RANGEE NUMERO 1                                -->
                <!-- ============================================================================== -->

                <div class="row">

                    <!-- ############################################################################## -->
                    <!--                             Start Guide                         -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $image_doc_path.'Documentation.png'?> alt="Photo non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Guides de démarrage</h5>
                                    <a href=<?php echo $downloadpath."Documentation.zip"?> class="btn btn-primary"
                                        role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>

                                    <p>Prenez facilement en main votre box Domokit grâce aux manuels utilisateurs et administrateurs</p>

                                </center>

                            </div>
                        </div>
                    </div>
                    <!-- ############################################################################## -->
                    <!--                            Thomas Broussard                -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <center>
                                    <a href="https://www.linkedin.com/in/thomas-broussard-463b85129/">
                                        <img class="rounded-circle" src=<?php echo $avatarpath.'Thomas_Broussard.png'?>
                                        alt="Photo non disponible :(" width="140" height="140">
                                    </a>
                                    <h2>Thomas</h2>
                                    <h2>Broussard</h2>
                                    <p>Initiateur du projet Domokit en Mai 2018 </p>
                                    <i>« J’ai lancé le projet Domokit pour apporter ma contribution dans l’univers de
                                        l’Open Source et de la Domotique. J’espère que ce projet apportera du plaisir,
                                        aussi bien aux débutants qu’aux makers expérimentés ! »</i>
                                </center>
                            </div>
                        </div>
                    </div>

                    <!-- ############################################################################## -->
                    <!--                            Samir Kherchaoui               -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <center>
                                    <a href="https://www.linkedin.com/in/samir-kherchaoui-5738ba122/">
                                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                            alt="Photo non disponible :(" width="140" height="140">
                                    </a>
                                    <h2>Samir</h2>
                                    <h2>Kherchaoui</h2>
                                    <p>A rejoint le projet Domokit en Juin 2018 </p>
                                    <i>« J’ai rejoint le projet Domokit pour découvrir de nouvelles technologies et
                                        acquérir de nouvelles compétences, tout en participant à un projet qui favorise
                                        le partage et la liberté d’apprendre. » </i>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================================== -->
                <!--                                  RANGEE NUMERO 2                                -->
                <!-- ============================================================================== -->
                <div class="row">
                    <!-- ############################################################################## -->
                    <!--                            Antoine Choplin               -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <center>
                                    <a href="https://www.linkedin.com/in/antoine-choplin-99291211a/">
                                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                            alt="Photo non disponible :(" width="140" height="140">
                                    </a>
                                    <h2>Antoine</h2>
                                    <h2>Choplin</h2>
                                    <p>A rejoint le projet Domokit en Septembre 2018</p>
                                    <i>« Dans le cadre d’un projet scolaire j’ai participé au développement de Jarvis,
                                        notre assistant vocal orienté vers la domotique. Rejoindre le projet Domokit
                                        s’est avéré être la suite logique à ce projet. Et c’est avec grande motivation
                                        que je participe aujourd’hui au développement de ce projet qui ouvre la
                                        domotique à tout le monde »</i>
                                </center>
                            </div>
                        </div>
                    </div>

                    <!-- ############################################################################## -->
                    <!--                            Seldie MBongo               -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <center>
                                    <a href="https://www.linkedin.com/in/seldie-mbongo-280343a8/">
                                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                            alt="Photo non disponible :(" width="140" height="140">
                                    </a>
                                    <h2>Seldie</h2>
                                    <h2>MBongo</h2>
                                    <p>A rejoint le projet Domokit en Septembre 2018</p>
                                    <i>« Dans le cadre d’un projet universitaire en année 4, j’ai participé au
                                        développement de Jarvis, notre assistant vocal. Le projet Domokit est en
                                        quelques sortes une suite à ce projet. Aujourd’hui, je participe au
                                        développement du projet Domokit car c’est un projet qui m’inspire et qui me
                                        passionne </i>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- ############################################################################## -->
                    <!--                            Yanis Boumghar               -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <center>
                                    <a href="https://www.linkedin.com/in/yanis-boumghar-9483a3177/">
                                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                            alt="Photo non disponible :(" width="140" height="140">
                                    </a>
                                    <h2>Yanis</h2>
                                    <h2>Boumghar</h2>
                                    <p>A rejoint le projet Domokit en Septembre 2018</p>
                                    <i>« J’ai participé au projet Jarvis, un assistant vocal orienté vers le domaine de
                                        la domotique dans le cadre d’un projet universitaire. La fusion entre le projet
                                        Domokit et Jarvis me parait très pertinente et c’est pourquoi je participe
                                        aujourd’hui à son développement avec le reste de l’équipe » </i>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- ############################################################################## -->
                </div>
            </div>
        </div>
    </div>


    <!-- ############################################################################## -->
    <!--                             Scripts à exécuter                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Script.php"); ?>


</body>

</html>