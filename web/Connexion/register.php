<?php 
session_start();
if (empty($_SESSION['error'])) $_SESSION['error'] = null;
if (empty($_SESSION['success'])) $_SESSION['success'] = null;
if (empty($_SESSION['authenticated'])) $_SESSION['authenticated'] = null;

$rootpath = "../";
include_once($rootpath."Fonctions/fct_Login.php"); 

?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <?php 
        $Titre_Browser = "Login";
    ?>
    <!-- ############################################################################## -->
    <!--                              Titre de la page                                  -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/Title.php"); ?>

    <!-- ############################################################################## -->
    <!--                              Feuilles de Style                                 -->
    <!-- ############################################################################## -->
    <?php include($rootpath."Trame/StyleSheet.php"); ?>  

</head>

    <!-- ############################################################################## -->
    <!--                              Contenu principal                                 -->
    <!-- ############################################################################## -->
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a>

                        <img class="align-content" src=<?php echo $rootpath."images/Logo/logo_left.png"?> alt="DomoKit">
                    </a>
                </div>

                <!-- ############################################################################## -->
                <!--                              Formulaire de connexion                           -->
                <!-- ############################################################################## -->
                <div class="login-form">
                     <form method='post' action="register_user.php">
                        <center><a class="error" style="color: red;"> <?php if ($_SESSION['error'] != null)  echo $_SESSION['error']; $_SESSION['error'] = null; ?></center>
                        <center><a class="success" style="color: green;"> <?php if ($_SESSION['success'] != null) echo $_SESSION['success']; $_SESSION['success'] = null;?></center>

                        <div class="form-group">
                            <label>Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="login" placeholder="Nom d'utilisateur">
                        </div>
                        <div class="form-group">
                            <label>Adresse Mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                        </div>

                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">S'inscrire</button>

                        <div class="social-login-content">
                        <div class="register-link m-t-15 text-center">
                            <p>Vous possédez déjà un compte ? <a href="login.php"> Connectez vous</a></p>
                        </div>
                        </div>
                    </form>

                <!-- ############################################################################## -->
                <!--                                    Copyrights                                  -->
                <!-- ############################################################################## -->
                    <div class="register-link m-t-15 text-center">
                        <p> <a>Powered by Sufee HTML5 Admin Dashboard Template</a></p>
                        <p> <a>&copy; 2018 </a>
                           
                            <a href="https://www.linkedin.com/in/thomas-broussard-463b85129">Thomas Broussard</a> et 
                            <a href="https://www.linkedin.com/in/samir-kherchaoui-5738ba122">Samir Kherchaoui</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
