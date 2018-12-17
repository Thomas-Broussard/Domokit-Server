        <!-- @@@@@@@@@@@@@@@ BEGIN @@@@@@@@@@@@@@@ -->

        <!-- ############################################################################## -->
        <!--                              HEADER DE LA PAGE                                 -->
        <!-- ############################################################################## -->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <!-- =============================================== -->
                    <!--             Icône d'accès au menu               -->
                    <!-- =============================================== -->
                    <a id="menuToggle" class="menutoggle fa pull-left"><i class="fa fa-angle-double-left"></i></a>

                    <!-- =============================================== -->
                    <!--                Contenu du header                -->
                    <!-- =============================================== -->
                    <div class="header-left">
                    	<!--
                        <i class="fas fa-clock"></i>
                        <span id="date_heure"></span>
                    	-->
                    </div>
                    
                </div>
            </div>
        </header>

        <!-- ############################################################################## -->
        <!--                              TITRE DU PANEL DROITE                             -->
        <!-- ############################################################################## -->
        <div class="breadcrumbs">
            <!-- =============================================== -->
            <!--                   Titre de Gauche               -->
            <!-- =============================================== -->
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php if(isset($Titre_Page)) echo $Titre_Page?></h1>
                    </div>
                </div>
            </div>
            <!-- =============================================== -->
            <!--                   Titre de Droite               -->
            <!-- =============================================== -->
            <!--
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Template</li>
                        </ol>
                    </div>
                </div>
            </div>-->

        </div>
        <!-- @@@@@@@@@@@@@@@ END @@@@@@@@@@@@@@@ -->
        <!--
        <script type="text/javascript">
            window.onload = date_heure('date_heure');
            function date_heure(id)
            {
                date = new Date;
                annee = date.getFullYear();
                moi = date.getMonth();
                mois = new Array('Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre');
                j = date.getDate();
                jour = date.getDay();
                jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
                h = date.getHours();
                if(h<10)
                {
                    h = "0"+h;
                }
                m = date.getMinutes();
                if(m<10)
                {
                    m = "0"+m;
                }
                s = date.getSeconds();
                if(s<10)
                {
                    s = "0"+s;
                }
                resultat =jours[jour]+' '+j+' '+mois[moi]+' '+annee+' - '+h+':'+m+':'+s;
                document.getElementById(id).innerHTML = resultat;
                setTimeout('date_heure("'+id+'");','1000');
                return true;
            }
        </script>
        -->