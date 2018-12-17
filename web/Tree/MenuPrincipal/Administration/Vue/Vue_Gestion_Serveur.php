<?php 
session_start();
?>

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
      <!-- ############################################################################## -->
      <!--                                  BLOC SYSTEME                                     -->
      <!-- ############################################################################## -->
        <div class="col-lg-6">
        <div class="card">
          <div class="card-header">Actions sur le système</div>
          <div class="card-body card-block">

          <!-- ############################################################################## -->
          <!--                      Formulaire : redémarrer le serveur                      -->
          <!-- ############################################################################## -->
          <form method='post' action="Modele/Reboot.php">
          <?php HiddenField("rootpath" , $rootpath) ?>
          
          <div class="form-group">
            <div class="input-group">
              <h3> Redémarrage de la box </h3>
              <p>  Permet de redémarrer le système à distance. </p>
              <p>  (Temps nécessaire : 2 minutes)</p>
            </div>
          </div>

              <!-- Bouton de validation-->
          <div class="form-group">
            <div class="input-group">
              <?php
                print(
                  BoutonPrimary("Reboot","Reboot","1","Redémarrage de la Box Domokit")
                );
              ?>
            </div>
          </div>
      </form>


      <div class="form-group">
        <div class="input-group">
              </br>
              </br>
        </div>
      </div>

      <!-- ############################################################################## -->
      <!--                      Formulaire : reset industriel du serveur                -->
      <!-- ############################################################################## -->
      <form method='post' action="Modele/Reset_Industriel.php">
      <?php HiddenField("rootpath" , $rootpath) ?>
          
          <div class="form-group">
          <h3> Réinitialisation Industrielle</h3>
            <div class="input-group">
              
              </br>
              <p>Remise à zéro des données de la box. </p>
              <p> Attention ! L'ensemble des utilisateurs, des objets connectés, et des configurations réalisées seront effacées. </p>
              <p> Pour confirmer la réinitialisation, veuillez saisir le mot de passe du propriétaire </p>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group" style='color:red;'>
            <p style="color:red;"> <?php echo $error_reset ?> </p>
            <p style="color:green;"> <?php echo $success_reset ?> </p>
            </div>
          </div>

              <!-- Confirmation password wifi-->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Mot de passe :</div>
                <input type="password" id="ResetPassword" name="ResetPassword" class="form-control">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              </div>
          </div>

              <!-- Bouton de validation-->
          <div class="form-group">
            <div class="input-group">
              <?php
                print(
                  BoutonDanger("Reset","Reset","1","Réinitialisation industrielle de la Box")
                );
              ?>
            </div>
          </div>

          </form>         
          
          </div>
          </div>
        </div>
        </div>
        <!-- ############################################################################## -->
      

      <!-- ############################################################################## -->
      <!--                                  BLOC WIFI                                     -->
      <!-- ############################################################################## -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">Paramétrage du Wifi</div>
          <div class="card-body card-block">


          <!-- ############################################################################## -->
          <!--                      Formulaire 1 : Changer le password Wifi                   -->
          <!-- ############################################################################## -->
          <form method='post' action="Modele/Wifi_Password.php">
          <?php HiddenField("rootpath" , $rootpath) ?>
          
          <div class="form-group">
            <div class="input-group">
              <h3> Changer le mot de passe du Wifi </h3>
              <p> Vous pouvez saisir un nouveau mot de passe pour votre réseau wifi Domokit.  </p>
              <p> Remarque : Une fois le mot de passe changé, passez en mode appairage pour que vos objets prennent également en compte ce changement. </p>
              
            </div>
          </div>
          <div class="form-group" >
            <div class="input-group">
              <p style="color:red;"> <?php echo $error_wifi ?> </p>
              <p style="color:green;"> <?php echo $success_wifi ?> </p>
            </div>
          </div>

          <!-- Nouveau password wifi-->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Votre nouveau mot de passe</div>
                <input type="password" id="NewPassword" name="NewPassword" class="form-control">
              <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
              </div>
          </div>

              <!-- Confirmation password wifi-->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">Confirmation mot de passe</div>
                <input type="password" id="ConfPassword" name="ConfPassword" class="form-control">
              <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
              </div>
          </div>

              <!-- Bouton de validation-->
          <div class="form-group">
            <div class="input-group">
              <?php
                print(
                  BoutonPrimary("PasswordWifi","PasswordWifi","1","Modifier")
                );
              ?>
            </div>
          </div>
          </form>

          <!-- ############################################################################## -->
          <!--                      Formulaire 2 : Choix du réseau wifi                            -->
          <!-- ############################################################################## -->
          <form method='post' action="Modele/Mode_Appairage.php">
          <?php HiddenField("rootpath" , $rootpath) ?>

              <div class="form-group">
                <div class="input-group">
                  <h3> Sélection du réseau Wifi </h3>
                  <p> Permet de choisir le réseau wifi à activer (Mode Normal ou Mode Appairage).</p>
                  <p> Le mode appairage vous permet de connecter de nouveaux objets. En cliquant sur le bouton, vous serez déconnecté du réseau Wifi, qui laissera place au réseau "Domokit Appairage". Veuillez consulter la notice pour plus d'informations. </p>
                  <p> Remarque : le mode appairage se coupe automatiquement au bout de 30 minutes </p>
                </div>
              </div>

              <!-- Bouton de validation-->
              <div class="form-group">
                <div class="input-group">
                  <?php
                    $Titre = "Sélection du réseau Wifi";
                    $Texte = "Veuillez choisir le mode de fonctionnement wifi à activer";
                    $BoutonAppairage = Bouton("ModeAppairage","ModeAppairage","1","Appairage","primary");
                    $BoutonNormal = Bouton("ModeAppairage","ModeAppairage","0","Normal","success");

                    print(DialogBox("AppairageDialog",$Titre,$Texte,$BoutonNormal,$BoutonAppairage));
                    ?>
                </div>
              </div>
          </form>
          <?php
            //print(BoutonSuccess("ModeAppairage","ModeAppairage","1","Passage en mode Appairage"));
            print(
              BoutonDialogBox("ModeAppairage","ModeAppairage","1","Sélection du réseau wifi","success btn-block","AppairageDialog")
            );
          ?>

          </div>
          </div>
        </div>
        </div>
          <!-- ############################################################################## -->
      

    <!-- ============================================================================== -->
        </div>
        </div>
    </div> 

    <!-- ############################################################################## -->
    <!--                             Scripts à exécuter                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Script.php"); ?>
    

</body>
</html>
