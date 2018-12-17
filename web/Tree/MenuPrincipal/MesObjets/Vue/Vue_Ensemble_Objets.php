<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
    <div class="animated fadeIn">
    <div class="content mt-3 ">
    <div id="refresh_5s">    
        <div class="row">
		<div class="col-md-12" >
		<div class="card">
		<div class="card-header">
			<strong class="card-title">Stats</strong>
        </div>
        <div class="card-body">
        <!-- ============================================================================== -->
        <!--                             Nombre d'objets appairés                           -->
        <!-- ============================================================================== -->    
        <div class="col-lg-3 col-md-3" >
            <div class="card">
                <div class="card-body" >
                    <div class="stat-widget-one" >
                        <div class="stat-icon dib"><i class="fas fa-microchip text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Objets Appairés</div>
                            <div class="stat-digit">
                                <?php    
                                    $nb_objets = 0;
                                    foreach($donnees as $affichage){ 
                                        $nb_objets ++;
                                    }
                                    echo $nb_objets; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================================== -->
        <!--                             Nombre d'objets actifs                             -->
        <!-- ============================================================================== -->    
        <div class="col-lg-3 col-md-3" >
            <div class="card">
                <div class="card-body" >
                    <div class="stat-widget-one" >
                        <div class="stat-icon dib"><i class="fas fa-play text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Objets Actifs</div>
                            <div class="stat-digit">
                                <?php    
                                    $nb_objets_actifs = 0;
                                    foreach($donnees as $affichage){ 
                                        if (($affichage['Actif'] == 1) && ($affichage['Auth'] == 1))
                                            $nb_objets_actifs++;
                                    }
                                    echo $nb_objets_actifs; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================================== -->

        <!-- ============================================================================== -->
        <!--                             Nombre d'objets autorisés inactifs                 -->
        <!-- ============================================================================== -->    
        <div class="col-lg-3 col-md-3" >
            <div class="card">
                <div class="card-body" >
                    <div class="stat-widget-one" >
                        <div class="stat-icon dib"><i class="fas fa-pause text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Objets Inactifs</div>
                            <div class="stat-digit">
                                <?php    
                                    $nb_objets_inactifs = 0;
                                    foreach($donnees as $affichage){ 
                                        if (($affichage['Actif'] == 0) && ($affichage['Auth'] == 1))
                                            $nb_objets_inactifs++;
                                    }
                                    echo $nb_objets_inactifs; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================================== -->
        <!--                             Nombre d'objets interdits                          -->
        <!-- ============================================================================== -->    
        <div class="col-lg-3 col-md-3" >
            <div class="card">
                <div class="card-body" >
                    <div class="stat-widget-one" >
                        <div class="stat-icon dib"><i class="fas fa-ban text-danger border-danger"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Objets Interdits</div>
                            <div class="stat-digit">
                                <?php    
                                    $nb_objets_interdits = 0;
                                    foreach($donnees as $affichage){ 
                                        if ($affichage['Auth'] == 0)
                                            $nb_objets_interdits++;
                                    }
                                    echo $nb_objets_interdits; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================================== -->
        </div>
        </div>
        </div>
        </div>
    </div>

        <!-- ============================================================================== -->
        <!--                             Tableau des objets appairés                        -->
        <!-- ============================================================================== -->    
        
        <div class="row">
            <div class="col-md-12" >
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Liste des objets appairés à la Box Domotique</strong>
                    </div>
                    <div class="card-body">
                    <div id="refresh_1s">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">

                    <thead>
                      <tr>
                        <th><center>Nom</center></th>
                        <th><center>Fonction</center></th>
                        <th><center>Pièce</center></th>
                        <th><center>Statut</center></th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php   $count = 0;
                            foreach($donnees as $affichage){ 
                    ?>
                                <tr>
                                    
                                    <!-- Nom -->
                                    <td><center><?php echo $affichage['Nom'];?></center></td>
                                    
                                    <!-- Fonction -->
                                    <td><center><?php echo $affichage['Fonction'];?></center></td>
                                    
                                    <!-- Pièce associée -->
                                    <td><center><?php echo $affichage['Piece'];?></center></td>
                                    
                                    <!-- Icones d'état -->
                                    <td><center>               
                                        <input type="hidden" id="idObjet"   value="<?php echo $affichage['ID'];?>"/>
                                        <input type="hidden" class="fields" value="<?php echo $affichage['ID'];?>"/>
                                        
                                        <p id="<?php echo "Icone_Actif_".$affichage['ID'];?>" >
                                            <?php 
                                                // Objet actif
                                                if (($affichage['Actif'] == 1) && ($affichage['Auth'] == 1)){
                                                    print '<img src="'.$rootpath.'images/Icones/green_circle.png" width="20" height="20" alt="actif" />';
                                                    print '<input type="hidden" value="2"/>';
                                                }

                                                // Objet inactif
                                                else if(($affichage['Actif'] == 0) && ($affichage['Auth'] == 1)){
                                                    print '<img src="'.$rootpath.'images/Icones/yellow_circle.png" width="20" height="20" alt="inactif" />';
                                                    print '<input type="hidden" value="1"/>';
                                                }

                                                // Objet interdit
                                                else{
                                                    print '<img src="'.$rootpath.'images/Icones/red_circle.png" width="20" height="20" alt="interdit" />';
                                                    print '<input type="hidden" value="0"/>';
                                                }
                                            ?>
                                        </p>
                                    </center></td>
                                </tr>
                                    
                            <?php $count++; ?>
                            <?php  }; ?> 
                    </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> 
        <!-- ============================================================================== -->

    </div>


    <!-- ############################################################################## -->
    <!--                             Scripts à exécuter                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Script.php"); ?>
    <?php //include($rootpath."Trame/Script_DataTable.php"); ?>

</body>
</html>
