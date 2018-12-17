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

                    <form method='post' action="Modele/Modification_Users.php">

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
                        <th><center>Pseudo           </center></th>
                        <th><center>Adresse mail     </center></th>
                        <th><center>Grade            </center></th>
                        <th><center>Action(s)        </center></th>
                       
                      </tr>
                    </thead>
                        <!-- Active les modifications-->
                        <?php HiddenField("Modification","1"); ?>
                    <!-- Contenu généré selon la base de données--> 
                    <tbody id = "example">

                    <?php $count = 0;?>
                    <?php foreach($donnees as $affichage){ ?>
                                            
                        <tr data-nb_item="18"> 
                            <!-- Caractéristiques masquées -->
                            <?php 
                                HiddenField("ID[$count]",$affichage['ID']);
                            ?>
                            
                            <!-- Login -->
                            <td><center>
                                <?php 
                                if ($grade_user == 'Administrateur'){
                                    if ($affichage['Grade'] != "Administrateur" && $affichage['Grade'] != "Propriétaire"){
                                        print(
                                            TextField("Nom_User","Login[$count]",$affichage['Login'])
                                        );    
                                    }
                                    else{
                                        HiddenField("Login[$count]",$affichage['Login']);
                                        print($affichage['Login']);
                                    }
                                }
                                else{
                                    print(
                                        TextField("Nom_User","Login[$count]",$affichage['Login'])
                                    ); 
                                }
                                
                                ?>
                            </center></td>

                            <!-- Email -->
                            <td><center>
                                <?php 
                                if ($grade_user == 'Administrateur'){
                                    if ($affichage['Grade'] != "Administrateur" && $affichage['Grade'] != "Propriétaire"){
                                        print(
                                            TextField("Nom_User","Email[$count]",$affichage['Email'])
                                        );
                                    }
                                    else{
                                        HiddenField("Email[$count]",$affichage['Email']);
                                        print($affichage['Email']);
                                    }
                                }
                                else{
                                    print(
                                        TextField("Nom_User","Email[$count]",$affichage['Email'])
                                    );
                                }
                                
                                ?>
                            </center></td>
                            
                            
                            <!-- Grade -->
                            <td><center>
                            <?php 
                                if ($affichage['Grade'] == "Propriétaire")
                                {
                                    HiddenField("Grade[$count]",$affichage['Grade']);
                                    print('
                                    <span style="font-size:17px;" class="badge badge-pill badge-primary">Propriétaire</span>');
                                }
                                else
                                {
                                    if ($grade_user == 'Administrateur')
                                    {
                                        if ($affichage['Grade'] != "Administrateur" && $affichage['Grade'] != "Propriétaire")
                                        {
                                            print('<select class="form-control" size="1" name="Grade['.$count.']">');
                                            foreach($grade as $affichage_grade)
                                                {
                                                    if ($affichage_grade['Grade'] != "Administrateur"){
                                                        $condition_select = ($affichage_grade['Grade'] == $affichage['Grade']);
                                                        $val = $affichage_grade['Grade'];
                                                        ListItem($val, $val, $condition_select);
                                                    }
                                                    
                                                }
                                            print('</select>');
                                        }
                                        else
                                        {
                                            HiddenField("Grade[$count]",$affichage['Grade']);
                                            print($affichage['Grade']);
                                        }
                                    }
                                    else
                                    {
                                        print('<select class="form-control" size="1" name="Grade['.$count.']">');
                                        foreach($grade as $affichage_grade)
                                        {
                                            $condition_select = ($affichage_grade['Grade'] == $affichage['Grade']);
                                            $val = $affichage_grade['Grade'];
                                            ListItem($val, $val, $condition_select);
                                        }
                                        print('</select>');
                                    }
                                }
                            ?>
                            </center></td>

                            <!-- Actions-->
                            <td><center>    
                            <!-- Bouton pour réinitialiser le password d'un utilisateur -->
                            <?php 
                            if ($affichage['Grade'] != "Propriétaire")
                            {
                                // Les administrateur ne peuvent pas modifier les autres administrateurs
                                if ($grade_user == 'Administrateur')
                                {
                                    if ($affichage['Grade'] != "Administrateur"){
                                        print(
                                            Bouton("Reset","Reset_User[$count]","Reset","Reset Mot de Passe","outline-primary")
                                        );
                                    }
                                }
                                else
                                {
                                    print(
                                        Bouton("Reset","Reset_User[$count]","Reset","Reset Mot de Passe","outline-primary")
                                    );
                                }
                                
                            }
                            ?>

                            <!-- Bouton pour supprimer un objet de la BDD-->           
                            <?php
                             if ($affichage['Grade'] != "Propriétaire")
                             {
                                 // Les administrateur ne peuvent pas supprimer les autres administrateurs
                                if ($grade_user == 'Administrateur'){
                                    if ($affichage['Grade'] != "Administrateur")
                                    {
                                        print(
                                            Bouton("Supprimer","Supprimer_User[$count]","Supprimer","Supprimer","outline-danger")
                                        );
                                    }
                                }
                                else
                                {
                                    print(
                                        Bouton("Supprimer","Supprimer_User[$count]","Supprimer","Supprimer","outline-danger")
                                    );
                                }
                             }
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
