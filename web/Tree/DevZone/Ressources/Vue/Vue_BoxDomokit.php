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
            <?php $downloadpath = $rootpath."Download/box_domokit/"; ?>



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
                                    permettant de fabriquer votre propre Box Domokit !

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa fas fa-flask"></i> Difficulté :
                                            Intermédiaire</li>
                                        <li class="list-group-item"><i class="fa fas fa-clock"></i> Durée : environ 3
                                            heures</li>
                                    </ul>
                                </p>
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
                                <p class="card-text">Avant de vous lancer dans la réalisation d'une box Domokit,
                                    assurez vous d'avoir accès aux outils suivant :
                                </p>
                            </center>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Raspberry Pi 3B</li>
                                <li class="list-group-item">Imprimante 3D</li>
                                <li class="list-group-item">Fer à souder</li>
                                <li class="list-group-item">Graveuse pour PCB</li>
                                <li class="list-group-item">Visserie M3 et M4</li>
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
                    <!--                             EEPROM  Domokit                            -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'Eeprom.png'?> alt="Photo non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Mémoire EEPROM</h5>

                                    <a href=<?php echo $downloadpath."EEPROM_Domokit.zip"?> class="btn btn-primary"
                                        role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>

                                    <p class="card-text">Apprenez à programmer une mémoire EEPROM sur Raspberry Pi</p>
                                    <p class="card-text">Un premier pas vers la fabrication de cartes HAT !</p>


                                </center>
                            </div>
                        </div>
                    </div>

                    <!-- ############################################################################## -->
                    <!--                             PCB Domokit                            -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'PCB.png'?> alt="Photo non disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Carte HAT</h5>

                                    <a href=<?php echo $downloadpath."HAT_Domokit.zip"?> class="btn btn-primary"
                                        role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>


                                    <p class="card-text">Ajoutez de nouvelles fonctionnalités grâce à la carte HAT
                                        Domokit</p>
                                    <p class="card-text">Fabriquez votre propre carte HAT !</p>


                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- ############################################################################## -->
                    <!--                             Boitier Domokit                            -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'Boitier.png'?> alt="Photo non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Boîtier</h5>

                                    <a href=<?php echo $downloadpath."Boitier_Domokit.zip"?> class="btn btn-primary"
                                        role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>

                                    <p class="card-text">Imprimez et assemblez votre boîtier Domokit !</p>
                                    <p class="card-text">Avec ou sans carte HAT, vous trouverez votre bonheur</p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================================== -->
                <!--                                  RANGEE NUMERO 3                              -->
                <!-- ============================================================================== -->
                <div class="row">

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