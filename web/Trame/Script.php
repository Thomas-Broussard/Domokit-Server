    

    <!-- Chemin d'accès aux fichiers -->
    <?php $path = $rootpath."assets/js/"?>


    <!-- Inclusion des scripts -->
    <script src="<?php echo $path;?>vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo $path;?>plugins.js"></script>
    <script src="<?php echo $path;?>main.js"></script>

    <script src="<?php echo $path;?>lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo $path;?>dashboard.js"></script>
    <script src="<?php echo $path;?>widgets.js"></script>
    <script src="<?php echo $path;?>lib/vector-map/jquery.vmap.js"></script>
    <script src="<?php echo $path;?>lib/vector-map/jquery.vmap.min.js"></script>
    <script src="<?php echo $path;?>lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo $path;?>lib/vector-map/country/jquery.vmap.world.js"></script>
    
    <script src="<?php echo $path;?>lib/data-table/jquery.dataTables.min.js"></script>

    <script src="<?php echo $path;?>jquery.js"></script>
    <script src="<?php echo $path;?>savescroll.js"></script>

    
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

    <script type="text/javascript">
    /* =====================================================
     *   Refresh périodiques de certains éléments de la page
     * ===================================================== */
    window.onload = setupRefresh;

    function setupRefresh()
    {
        setInterval("refreshBlock_1s();" ,1000);
        setInterval("refreshBlock_5s();" ,5000);
        setInterval("refreshBlock_10s();",10000);
        setInterval("refreshBlock_30s();",30000);
        setInterval("refreshBlock_60s();",60000);
    }
    
    function refreshBlock_1s()
    {
       var $container = $('#refresh_1s');  
       $container.load(document.URL + ' #refresh_1s');
    }
    function refreshBlock_5s()
    {
       var $container = $('#refresh_5s');  
       $container.load(document.URL + ' #refresh_5s');
    }
    function refreshBlock_10s()
    {
       var $container = $('#refresh_10s');  
       $container.load(document.URL + ' #refresh_10s');
    }
    function refreshBlock_30s()
    {
       var $container = $('#refresh_30s');  
       $container.load(document.URL + ' #refresh_30s');
    }
    function refreshBlock_60s()
    {
       var $container = $('#refresh_60s');  
       $container.load(document.URL + ' #refresh_60s');
    }
  </script>

