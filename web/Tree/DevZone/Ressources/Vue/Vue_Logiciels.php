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

        <div class="content mt-3">

            <?php $imagepath = $rootpath."images/logiciels/"; ?>

            <div class="container">
                <div class="row">
                    <!-- ============================================================================== -->
                    <!--                                  RANGEE NUMERO 1                                -->
                    <!-- ============================================================================== -->
                    <!-- ############################################################################## -->
                    <!--                             Visual Studio Code                     -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'visual_studio_code.png'?> alt="Photo
                            non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Visual Studio Code </h5>
                                </center>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fas fa-laptop"></i> Plateformes :
                                        Windows, Mac , Linux</li>
                                </ul>
                                </br>
                                <center>
                                    <a target="_blank" rel="noopener noreferrer" href="https://code.visualstudio.com/Download" class="btn btn-primary" role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>
                                    <p> Lien direct :</p>
                                    <p> <a target="_blank" rel="noopener noreferrer" href="https://code.visualstudio.com/Download">
                                            https://code.visualstudio.com/Download </a></p>

                                    </br>
                                    <p>Environnement de développement supportant de nombreux langages</p>
                                    <p>(Nécessaire pour utiliser PlatformIO)</p>


                                </center>

                            </div>
                        </div>
                    </div>

                    <!-- ############################################################################## -->
                    <!--                             PlatformIO                     -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'platformio.png'?> alt="Photo
                            non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">PlatformIO </h5>
                                </center>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fas fa-laptop"></i> Plateformes :
                                        Windows, Mac , Linux</li>
                                </ul>
                                </br>
                                <center>
                                    <a target="_blank" rel="noopener noreferrer" href="https://projetsdiy.fr/installer-extension-platformio-ide-visual-studio-code-vscode-windows-linux/"
                                        class="btn btn-primary" role="button">
                                        <i class="fa fas fa-download"></i> Installer
                                    </a>
                                    </a>
                                    <p> Lien direct : </p>
                                    <p><a target="_blank" rel="noopener noreferrer" href="https://projetsdiy.fr/installer-extension-platformio-ide-visual-studio-code-vscode-windows-linux/">
                                            https://projetsdiy.fr/installer-extension-platformio-ide-visual-studio-code-vscode-windows-linux/
                                        </a></p>

                                    </br>
                                    <p>Extension pour Visual Studio Code</p>
                                    <p>Permet de programmer les ESP8266 </p>


                                </center>

                            </div>
                        </div>
                    </div>
                    <!-- ############################################################################## -->
                    <!--                             Etcher                    -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'etcher.png'?> alt="Photo
                            non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Etcher </h5>
                                </center>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fas fa-laptop"></i> Plateformes :
                                        Windows, Mac , Linux</li>
                                </ul>
                                </br>
                                <center>
                                    <a target="_blank" rel="noopener noreferrer" href="https://www.balena.io/etcher/" class="btn btn-primary" role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>
                                    <p> Lien direct : </p>
                                    <p><a target="_blank" rel="noopener noreferrer" href="https://www.balena.io/etcher/">
                                            https://www.balena.io/etcher/
                                        </a></p>

                                    </br>
                                    <p>Utilitaire permettant de flasher une carte SD avec une image OS</p>
                                    <p>Essentiel pour installer l'OS Domokit sur votre Raspberry Pi !</p>


                                </center>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================================== -->
                <!--                                  RANGEE NUMERO 2                              -->
                <!-- ============================================================================== -->
                <div class="row">
                    <!-- ############################################################################## -->
                    <!--                             Ideamaker                    -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src=<?php echo $imagepath.'ideamaker.png'?> alt="Photo
                            non
                            disponible
                            :(">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">IdeaMaker </h5>
                                </center>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="fas fa-laptop"></i> Plateformes :
                                        Windows, Mac , Linux</li>
                                </ul>
                                </br>
                                <center>
                                    <a target="_blank" rel="noopener noreferrer" href="https://www.raise3d.com/pages/download" class="btn btn-primary" role="button">
                                        <i class="fa fas fa-download"></i> Télécharger
                                    </a>
                                    </a>
                                    <p> Lien direct : </p>
                                    <p><a target="_blank" rel="noopener noreferrer" href="https://www.raise3d.com/pages/download">
                                            https://www.raise3d.com/pages/download
                                        </a></p>

                                    </br>
                                    <p>Logiciel permettant de préparer les fichiers d'impression 3D à partir de modèles
                                        3D au format 3MF, OBJ ou STL</p>

                                </center>

                            </div>
                        </div>
                    </div>

                    <!-- ############################################################################## -->
                    <!--                             EasyEDA                    -->
                    <!-- ############################################################################## -->
                    <div class="col-xs-12 col-sm-6 col-md-4  d-flex align-items-stretch">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src=<?php echo $imagepath.'easyeda.png'?> alt="Photo
                                non
                                disponible
                                :(">
                                <div class="card-body">
                                    <center>
                                        <h5 class="card-title">EasyEDA </h5>
                                    </center>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fas fa-laptop"></i> Plateformes :
                                            Windows, Mac , Linux</li>
                                    </ul>
                                    </br>
                                    <center>
                                        <a target="_blank" rel="noopener noreferrer" href="https://easyeda.com/editor" class="btn btn-primary" role="button">
                                            <i class="fa fas fa-download"></i> Outil en ligne
                                        </a>
                                        </a>
                                        <p> Lien direct : </p>
                                        <p><a target="_blank" rel="noopener noreferrer" href="https://easyeda.com/editor">
                                            https://easyeda.com/editor
                                            </a></p>
    
                                        </br>
                                        <p>Outil en ligne permettant de concevoir des PCB (et d'en faire fabriquer !)</p> 
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


        <!-- ############################################################################## -->
        <!--                             Scripts à exécuter                                 -->
        <!-- ############################################################################## -->
        <?php include($rootpath."Trame/Script.php"); ?>


</body>

</html>