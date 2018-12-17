<?php 
    function DownloadFile($filename){
        header('Content-Type: application/download');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Content-Length: " . filesize($filename));

        $fp = fopen($filename, "r");
        fpassthru($fp);
        fclose($fp);
    }
    

    DownloadFile("DomokitApp-release.apk");
?>