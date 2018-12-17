<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <?php include_once($rootpath."Fonctions/Components.php") ?>
    <!-- ############################################################################## -->
    <!--                              Titre de la page                                  -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Title.php"); ?>

    <!-- ############################################################################## -->
    <!--                              Feuilles de Style                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/StyleSheet.php"); ?>  
    

    <style type="text/css" class="init">
        td.details-control {
            background: url('Script/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('Script/details_close.png') no-repeat center center;
        }
    </style>


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
        <!--                             Tableau des objets appairés                        -->
        <!-- ============================================================================== -->    
        
        <div class="row">
            <div class="col-md-12" >
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tableau de configuration</strong>
                    </div>
                    <div class="card-body">

                    <form method='post' action="Modele/Modification_Objets.php">

                    <!-- transmission du rootpath -->
                    <?php HiddenField("rootpath" , $rootpath) ?>

                    <div style="margin: left">
                    <!-- ========================================================================= -->
                    <!-- Valider les modifications  -->
                    <!-- ========================================================================= -->
                    <?php
                    print(
                        Bouton("Valider","Autoriser_Connexion[$count]","Sauvegarder les modifications","Sauvegarder les modifications","outline-primary")
                    );
                    ?>
                    </div>
                    <br/>
                <!--<table id="example" class="display" style="width:100%">-->
   
                 <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th><center>ID                  </center></th>
                        <th><center>Nom                 </center></th>
                        <th><center>Fonction            </center></th>
                        <th><center>Pièce associée      </center></th>
                        <th><center>Adresse MAC         </center></th>
                        <th><center>Authentification    </center></th>
                        <th><center>Action(s)           </center></th>
                       
                      </tr>
                    </thead>
                        <!-- Active les modifications-->
                        <input type="hidden"   name="Modification" value="1" />   
                    <!-- Contenu généré selon la base de données--> 
                    <tbody id = "example">

                    <?php $count = 0;?>
                    <?php foreach($donnees as $affichage){ ?>
                                            
                        <tr data-nb_item="18"> 
                            <!-- Caractéristiques masquées -->
                            <?php 
                                HiddenField("ID[$count]",$affichage['ID']);
                                HiddenField("Adresse_MAC[$count]",$affichage['Adresse_MAC']);
                            ?>
                            
                            <!-- ID -->
                            <td><center>
                                <?php echo $affichage['ID'];?>
                            </center></td>
                            
                            <!-- Nom -->
                            <td><center>
                                <?php 
                                print(
                                    TextField("Nom_Objet","Nom[$count]",$affichage['Nom'])
                                );
                                ?>
                            </center></td>
                            
                            
                            <!-- Fonction -->
                            <td><center>
                                <select class="form-control" size="1" name="<?php echo "Fonction[".$count."]";?>">
                                    <?php 
                                        foreach($fonctions_existantes as $affichage_fonction)
                                        {
                                            $condition_select = ($affichage_fonction['Fonction'] == $affichage['Fonction']);
                                            $val = $affichage_fonction['Fonction'];
                                            print(
                                                ListItem($val, $val, $condition_select)
                                            );
                                        }
                                    ?>
                                </select>
                            </center></td>
                            
                            
                            <!-- Pièce associée -->
                            <td><center>
                                <select  class="form-control" size="1" name="<?php echo "Piece[".$count."]";?>">
                                    <?php 
                                        foreach($pieces_existantes as $affichage_piece)
                                        {
                                            $condition_select = ($affichage_piece['Piece'] == $affichage['Piece']);
                                            $val = $affichage_piece['Piece'];
                                            print(
                                                ListItem($val, $val, $condition_select)
                                            );
                                        }
                                    ?>
                                </select>
                           </center></td>
                                

                            <!-- Adresse MAC -->
                            <td><center>
                                <?php echo $affichage['Adresse_MAC'];   ?>
                            </center></td>
                            

                            <!-- Autoriser la connexion d'un objet-->
                            <td><center>
                                    <?php 
                                        HiddenField("Autoriser_Connexion[$count]","0");
                                        HiddenField("Rejeter_Connexion[$count]","0");
                                    
                                        if( $affichage['Auth'] == 0){
                                            print(
                                                BoutonDanger("Valider","Autoriser_Connexion[$count]","Autoriser","Interdit")
                                            );
                                        }
                                        else {
                                            print(
                                                BoutonSuccess("Valider","Autoriser_Connexion[$count]","Interdire","Autorisé")
                                            );
                                        }
                                    ?>
                            </center></td>

                            <!-- Bouton pour supprimer un objet de la BDD-->
                            <td><center>               
                            <?php
                            print(
                                Bouton("Supprimer","Supprimer_Objet[$count]","Supprimer","Supprimer","outline-danger")
                            );
                            ?>
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
        <!-- ============================================================================== -->

    </div>
        <!-- Contenu à insérer ici. -->

        </div> 

    </div>


    <!-- ############################################################################## -->
    <!--                             Scripts à exécuter                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Script.php"); ?>
    <script type="text/javascript" language="javascript" src=<?php echo "\"".$rootpath."assets/js/lib/data-table/jquery.dataTables.min.js\""?>></script>
    <script type="text/javascript" language="javascript" class="init" src="Script/details_objets.js"></script>
    
    

</body>
</html>
