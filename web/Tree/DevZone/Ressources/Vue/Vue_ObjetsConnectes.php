<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>

    <!-- ############################################################################## -->
    <!--                              Titre de la page                                  -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Title.php"); ?>

    <!-- ############################################################################## -->
    <!--                              Feuilles de Style                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/StyleSheet.php"); ?>

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

            <?php $imagepath = $rootpath."images/domokit/"; ?>
            <?php $downloadpath = $rootpath."Download/objets_connectes/"; ?>

            <div class="container">
                <div class="row">
                    <!-- ============================================================================== -->
                    <!--                                  RANGEE NUMERO 1                                -->
                    <!-- ============================================================================== -->
                    <!-- ############################################################################## -->
                    <!--                             Description                            -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-6  d-flex align-items-stretch">
                        <div class="card">
                            <center>
                                <div class="card-header">
                                    Description
                                </div>
                                <p class="card-text">
                                    Nous vous proposons ici toutes les ressources logicielles et documentaires
                                    permettant de fabriquer vos objets connectés !
                                </p>

                                <p class="card-text">
                                    Apprenez pas à pas à réaliser vos objets connectés : chaque ressource contient :
                                    <li class="list-group-item">Les fichiers de programmation</li>
                                    <li class="list-group-item">Le PCB à réaliser</li>
                                    <li class="list-group-item">Le modèle 3D du boîtier</li>
                                    <li class="list-group-item">La documentation sur l'objet à réaliser</li>

                                </p>

                                <h3>
                                    Bon codage ! <i class="far fa-smile"></i>
                                </h3>
                                <p></p>
                            </center>
                        </div>
                    </div>

                    <!-- ############################################################################## -->
                    <!--                             Materiel necessaire                            -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-6  d-flex align-items-stretch">
                        <div class="card">
                            <center>
                                <div class="card-header">
                                    Prérequis
                                </div>
                                <p class="card-text">Hop hop hop ! Assurez vous d'avoir accès aux outils suivant avant
                                    de vous lancer dans la fabrication :
                                </p>
                            </center>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">NodeMCU ou ESP8266</li>
                                <li class="list-group-item">Fer à souder</li>
                                <li class="list-group-item">Capteurs / Actionneurs</li>
                                <li class="list-group-item">Composants passifs (résistances et capacités)</li>
                                <li class="list-group-item">Visserie M3</li>
                                <li class="list-group-item">Tournevis, pinces, etc...</li>
                            </ul>
                        </div>
                    </div>


                </div>

                <!-- ============================================================================== -->
                <!--                                  RANGEE NUMERO 2                              -->
                <!-- ============================================================================== -->
                <div class="row">
                    <!-- ############################################################################## -->
                    <!--                             Start Guide                         -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'Start.png'?> alt="Photo non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Prise en main </h5>
                                </center>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fa fas fa-flask"></i> Difficulté :
                                        Débutant</li>
                                    <li class="list-group-item"><i class="fa fas fa-clock"></i> Durée : 1
                                        heure</li>
                                </ul>
                                </br>
                                <center>
                                    <a href=<?php echo $downloadpath."EEPROM_Domokit.zip"?> class="btn btn-primary"
                                        role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>

                                    <p>Apprenez à utiliser les outils de développement Domokit !</p>
                                    <p>(IDE, Librairies, Programmation des cartes, etc...)</p>


                                </center>

                            </div>
                        </div>
                    </div>

                    <!-- ############################################################################## -->
                    <!--                             Capteur de lumière                            -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'Capteur_Lumiere.png'?> alt="Photo non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Capteur de lumière </h5>
                                </center>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fa fas fa-flask"></i> Difficulté :
                                        Débutant</li>
                                    <li class="list-group-item"><i class="fa fas fa-clock"></i> Durée : 1
                                        heure</li>
                                </ul>
                                </br>
                                <center>
                                    <a href=<?php echo $downloadpath."Capteur_Lumiere.zip"?> class="btn btn-primary"
                                        role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>

                                    <p>Développez votre premier objet connecté :</p>
                                    <p>Apprenez à fabriquer un capteur de lumière !</p>

                                </center>

                            </div>
                        </div>
                    </div>
                    <!-- ############################################################################## -->
                    <!--                             Ruban à LEDS                            -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'Ruban_LEDS.png'?> alt="Photo non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Ruban à LEDS</h5>
                                </center>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fa fas fa-flask"></i> Difficulté :
                                        Débutant</li>
                                    <li class="list-group-item"><i class="fa fas fa-clock"></i> Durée : 45
                                        minutes </li>
                                </ul>
                                </br>
                                <center>
                                    <a href=<?php echo $downloadpath."Ruban_LEDS.zip"?> class="btn btn-primary"
                                        role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>

                                    <p>Maîtrisez votre éclairage :</p>
                                    <p>Apprenez à fabriquer un Ruban à LED pilotable !</p>

                                </center>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================================== -->
                <!--                                  RANGEE NUMERO 3                              -->
                <!-- ============================================================================== -->
                <div class="row">
                    <!-- ############################################################################## -->
                    <!--                             Détecteur de flammes                           -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'Detecteur_Flamme.png'?> alt="Photo non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Détecteur de flammes</h5>
                                </center>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fa fas fa-flask"></i> Difficulté :
                                        Intermédiaire</li>
                                    <li class="list-group-item"><i class="fa fas fa-clock"></i> Durée : 1 heure 30 </li>
                                </ul>
                                </br>
                                <center>
                                    <a href=<?php echo $downloadpath."Detecteur_Flamme.zip"?> class="btn btn-primary"
                                        role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>

                                    <p>Restez alerté en cas de problème :</p>
                                    <p>Apprenez à fabriquer un détecteur de flamme !</p>

                                </center>

                            </div>
                        </div>
                    </div>
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