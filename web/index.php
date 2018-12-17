<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <!-- ############################################################################## -->
    <!--                          Définition des variables php                          -->
    <!-- ############################################################################## -->
    <?php 
        // Chemin relatif d'accès aux fichiers
        $rootpath = "";
        $Titre_Browser = "Accueil";
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

			<p> Bienvenue sur Domokit ! </p>

			<p> L'ensemble de ce travail a été réalisé par Thomas Broussard et Samir Kherchaoui, étudiants à Polytech Sorbonne en ei2i-4</p>
			
            <?php $downloadpath = $rootpath."Download/"; ?>

			<a class="btn btn-outline-primary" href=<?php echo $downloadpath."Template_DomoKit.zip"?> role="button">Créez votre premier objet connecté ! </a>
			
			<br><br>
			<p> Envie d'aller plus loin ? Découvrez nos objets DomoKit Open-Source ! </p>
			<a class="btn btn-outline-primary" href=<?php echo $downloadpath."Relai_SonOff_S20.zip"?> role="button">
                Hackez un Relai SonOFF S20 
            </a>
            <br><br>
			<a class="btn btn-outline-success" href=<?php echo $downloadpath."Garden_Secure.zip"?>role="button">
                Garden Secure surveille vos plantes
            </a>
            <br><br>
			<a class="btn btn-outline-warning" href=<?php echo $downloadpath."Sonar_Wall_E.zip"?> role="button">
                Plus d'intrus avec Sonar Wall-E ! 
            </a>
            <br><br>
			<a class="btn btn-outline-primary" href=<?php echo $downloadpath."RFID_Access.zip"?> role="button">
                Badgez tous ce que vous voulez ! 
            </a>
            <br><br>
			<a class="btn btn-outline-success" href=<?php echo $downloadpath."Test_Helium_Atom.zip"?> role="button">
                Découvrez l'IoT avec Google Helium
            </a>
            <br><br>
			<a class="btn btn-outline-danger" href=<?php echo $downloadpath."HeliumCube.zip"?> role="button">
                Votre premier projet IoT : L'HeliumCube 
            </a>
            <br><br>
			
            <p> </p>
        </div> 

    </div>


    <!-- ############################################################################## -->
    <!--                             Scripts à exécuter                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Script.php"); ?>
    

</body>
</html>
