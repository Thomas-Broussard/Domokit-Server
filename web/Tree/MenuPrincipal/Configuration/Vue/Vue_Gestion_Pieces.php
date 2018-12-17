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
        <div class="content mt-3">

        <div class="animated fadeIn">
        <!-- ============================================================================== -->
        <!--                     Tableau de configuration des pièces                        -->
        <!-- ============================================================================== -->    
        <div class="row">
            
            <div class="col-md-8" >
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tableau de configuration</strong>
                    </div>
                    <div class="card-body">

                    <form method='post' action="Modele/Modification_Pieces.php">

                    <!-- transmission du rootpath -->
                    <input type="hidden"   name="rootpath" value="<?php echo $rootpath; ?>" />  

                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th><center>Pièce                  </center></th>
                        <th><center>Action                 </center></th>
                      </tr>
                    </thead>
  
                    <!-- Contenu généré selon la base de données--> 
                    <tbody>
                        <?php $count = 0;?>
                        <?php foreach($donnees_piece as $affichage_piece){ 
                        if($affichage_piece['Piece']!="Inconnu"){?>
                        <tr>     
                            <!-- Données invisibles (pour la BDD) -->
                            <input type="hidden"   name=<?php echo "ID_Piece[".$count."]";?> value="<?php echo $affichage_piece['ID'];?>" />
                            <input type="hidden"   name=<?php echo "Piece[".$count."]";?> value="<?php echo $affichage_piece['Piece'];?>" />
                            
                            <!-- Nom de la pièce -->
                            <td>
                                <input name=<?php echo "Piece[".$count."]"?> value="<?php echo $affichage_piece['Piece'];?>" type="text" class="form-control"/>
                            </td>
                           
                            
                            <!-- Actions -->
                            <td><center>
                                <!-- Bouton de sauvegarde-->
                                <input type="hidden" name=<?php echo "Sauvegarder_Piece[".$count."]";?> value="0"/>
                                <button type="submit" id="Sauvegarder" class="btn btn-outline-primary btn-sm" name=<?php echo "Sauvegarder_Piece[".$count."]";?> value="Sauvegarder">
                                    <i class="fas fa-save"></i> Sauvegarder
                                </button>
                                
                                <!-- Bouton de suppression-->
                                <input type="hidden" name=<?php echo "Supprimer_Piece[".$count."]";?> value="0"/>
                                <button type="submit" id="Supprimer" class="btn btn-outline-danger btn-sm" name=<?php echo "Supprimer_Piece[".$count."]";?> value="Supprimer">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </center></td>       
                        </tr>
                        
                        <?php $count++; ?>
                        <?php  };}; ?>     
                        <!-- ========================================================================= -->
                        <!-- Ajout d'une pièce -->
                        <!-- ========================================================================= -->
                        <tr>
                            <!-- Affichage des caractéristiques -->                 
                                <td>
                                    <input class="form-control" name="Nom_Ajout_Piece" placeholder="Ajouter une pièce" type="text"></input>
                                </td>

                                <td><center>
                                <!-- Bouton d'ajout-->
                                <input type="hidden" name="Ajouter_Piece" value="0"/>
                                <button type="submit" id="Ajouter" class="btn btn-outline-success btn-sm" name="Ajouter_Piece" value="Ajouter">
                                    <i class="fas fa-plus-circle"></i> Ajouter
                                </button>
                                </center></td>
                            
                        </tr>   
                    </tbody>
                    </table>
                    </form>
                    </div>

                </div>
            </div>
            <!-- ============================================================================== -->
        <!--                             Nombre de pièces disponibles                       -->
        <!-- ============================================================================== -->    
        <div class="col-lg-3 col-md-3" >
            <div class="card">
                <div class="card-body" >
                    <div class="stat-widget-one" >
                        <div class="stat-icon dib"><i class="fas fa-puzzle-piece  text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Pièces Créées</div>
                            <div class="stat-digit">
                                <?php    
                                    echo $count; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </div> 

        <!-- ============================================================================== -->

    </div>
        <!-- Contenu à insérer ici. -->

        </div> 

    </div>


    <!-- ############################################################################## -->
    <!--                             Scripts à exécuter                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Script.php"); ?>
    

</body>
</html>
