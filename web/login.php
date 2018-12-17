<?php 
session_start();
if (empty($_SESSION['error'])) $_SESSION['error'] = null;
if (empty($_SESSION['success'])) $_SESSION['success'] = null;
if (empty($_SESSION['authenticated'])) $_SESSION['authenticated'] = null;
include_once("Fonctions/fct_Login.php"); 

?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <?php 
        $rootpath = "";
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
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a>

                        <img class="align-content" src="images/Logo/logo_left.png" alt="DomoticPi">
                    </a>
                </div>
                <div class="login-form">
                    
                    <form action="login.php" method="POST">
                        <center><a class="error" style="color: red;"> <?php echo Login('index.php'); ?> </a></center>
                        <a class="error"> <?php if ($_SESSION['error'] != null)  echo $_SESSION['error']; $_SESSION['error'] = null; ?></a>
                        <a class="success"> <?php if ($_SESSION['success'] != null) echo $_SESSION['success']; $_SESSION['success'] = null;?></a>

                        <div class="form-group">
                            <label>Login</label>
                            <input name="username" type="text" class="form-control" placeholder="Login" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Mot de Passe</label>
                            <input  name="password" type="password" class="form-control" placeholder="Mot de Passe" required autofocus>
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" value="Connexion">Connexion</button>
                        <div class="social-login-content">

                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p> <a>Powered by Sufee HTML5 Admin Dashboard Template</a></p>
                            <p> <a>&copy; 2018 </a><a href="https://www.linkedin.com/in/thomas-broussard-463b85129">Thomas Broussard</a></p>
                        </div>
                    </form>
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
