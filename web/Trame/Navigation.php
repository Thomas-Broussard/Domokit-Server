        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand">
                    <img class="align-content" src="<?php echo $rootpath;?>images/Logo/logo_left.png" alt="DomoKit">
                </a>
                <a class="navbar-brand hidden">
                    <img class="align-content" src="<?php echo $rootpath;?>images/Logo/logo_only.png" alt="">
                </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ BEGIN @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

                    <!-- ############################################################################## -->
                    <!--                                 CONSTRUCTION DE L'ARBORESCENCE                 -->
                    <!-- ############################################################################## -->
                    <?php
                        // Arborescence de navigation
                        $Tree  = $rootpath."Tree";
                        $Base_URL = "http://" . $_SERVER['SERVER_NAME'];//"http://".$_SERVER['SERVER_ADDR'];

                        $Menu1 = $Tree."/MenuPrincipal";
                        $SousMenu1A = $Menu1."/MesObjets";
                        $SousMenu1B = $Menu1."/Configuration";
                        $SousMenu1C = $Menu1."/Administration";         

                        $Menu2 = $Tree."/DevZone";
                        $SousMenu2A = $Menu2."/Ressources";
                        $SousMenu2B = $Menu2."/Interfaces";
   
                    ?>

                    <!-- ############################################################################## -->
                    <!--                                      ACCUEIL                                   -->
                    <!-- ############################################################################## -->
                    <li class="<?php if ($Menu_Actif == "Accueil") echo "active"; else echo "";?>">
                        <a href=<?php echo $rootpath."index.php"?>> <i class="menu-icon fa fa-home"></i>Accueil </a>
                    </li>
                    <!-- ############################################################################## -->
                    <!--                                      DECONNEXION                               -->
                    <!-- ############################################################################## -->
                    <li>
                        <a href=<?php echo $rootpath."Fonctions/fct_Unlogin.php"?>> <i class="menu-icon fa fa-sign-out-alt"></i>Déconnexion </a>
                    </li>

                    <!-- ############################################################################## -->
                    <!--                                      MENU N°1                                  -->
                    <!-- ############################################################################## -->
                    <h3 class="menu-title">Menu Principal</h3>

                    <!-- =============================================== -->
                    <!--                    Sous-Menu 1A                -->
                    <!-- =============================================== -->
                    <li class="menu-item-has-children dropdown <?php if ($Menu_Actif == "SousMenu1A") echo "active"; else echo "";?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-tachometer-alt"></i>Mes Objets</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="fa fa-eye"></i>        
                                <a href=<?php echo $SousMenu1A."/Ensemble_Objets.php"?> >Vue d'ensemble</a>
                            </li>
                            
                            <li><i class="fa fa-cubes"></i>      
                                <a href=<?php echo $SousMenu1A."/Gestion_Objets.php"?> >Gestion</a>
                            </li>
                        </ul>
                    </li>

                    <!-- =============================================== -->
                    <!--                    Sous-Menu 1B                 -->
                    <!-- =============================================== -->
					<li class="menu-item-has-children dropdown <?php if ($Menu_Actif == "SousMenu1B") echo "active"; else echo "";?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Configuration</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="fa fas fa-briefcase"></i> 
                                <a href=<?php echo $SousMenu1B."/Gestion_Fonctions.php"?>>Mes Fonctionnalités</a>
                            </li>

                            <li><i class="fa fa-sitemap"></i> 
                                <a href=<?php echo $SousMenu1B."/Gestion_Pieces.php"?>>Mon Habitat</a>
                            </li>

                        </ul>
                    </li>

                    <!-- =============================================== -->
                    <!--                    Sous-Menu 1C                 -->
                    <!-- =============================================== -->
                    <li class="menu-item-has-children dropdown <?php if ($Menu_Actif == "SousMenu1C") echo "active"; else echo "";?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Administration</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="menu-icon fa fa-users"></i>       
                                <a href=<?php echo $SousMenu1C."/Gestion_Users.php"?>>Utilisateurs</a>
                            </li>

                            <li><i class="menu-icon fa fa-server"></i>      
                                <a href=<?php echo $SousMenu1C."/Gestion_Serveur.php"?>>Serveur</a>
                            </li>

                        </ul>
                    </li>

                    <!-- ############################################################################## -->
                    <!--                                      MENU N°2                                  -->
                    <!-- ############################################################################## -->
                    <h3 class="menu-title">Zone Développeurs</h3><!-- /.menu-title -->

                    <!-- =============================================== -->
                    <!--                    Sous-Menu 2A                -->
                    <!-- =============================================== -->
                    <li class="menu-item-has-children dropdown <?php if ($Menu_Actif == "SousMenu2A") echo "active"; else echo "";?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-parachute-box"></i>Ressources</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="menu-icon fa fa-server "></i>       
                                <a href=<?php echo $SousMenu2A."/BoxDomokit.php"?>>Box Domokit</a>
                            </li>

                            <li><i class="menu-icon fa fa-microchip"></i>       
                                <a href=<?php echo $SousMenu2A."/ObjetsConnectes.php"?>>Objets Connectés</a>
                            </li>

                            <li><i class="fa fa-file"></i> 
                                <a href=<?php echo $SousMenu2A."/Documentations.php"?>>Documentations</a>
                            </li>

                            <li><i class="fa fa-download"></i> 
                                <a href=<?php echo $SousMenu2A."/Logiciels.php"?>>Logiciels</a>
                            </li>
                        </ul>
                    </li>

                    <!-- =============================================== -->
                    <!--                    Sous-Menu 2B                -->
                    <!-- =============================================== -->
                    <li class="menu-item-has-children dropdown <?php if ($Menu_Actif == "SousMenu2B") echo "active"; else echo "";?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i> Interfaces</a>
                        <ul class="sub-menu children dropdown-menu">

                            <li><i class="menu-icon fab fa-node "></i>    
                                <a href=<?php echo $Base_URL.":1880"?>>Node-Red</a>
                            </li>

                            <li><i class="menu-icon fa fa-database"></i>       
                                <a href=<?php echo $Base_URL."/phpmyadmin"?>>Base de données</a>
                            </li>
                        </ul>
                    </li>

                    <!-- ############################################################################## -->
                    <!--                                      COPYRIGHTS                                -->
                    <!-- ############################################################################## -->
                    <h3 class="menu-title">Copyright</h3><!-- /.menu-title -->
                    <li><a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/thomas-broussard-463b85129">&copy; 2018 Thomas Broussard</a></li>
                <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ END @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
                </ul>
            </div>
        </nav>
