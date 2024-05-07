<?php
    $tanggal = new DateTime('2024-05-06'); 

    $tanggal->add(new DateInterval('P3D'));
    
    echo $tanggal->format('Y-m-d'); 
    
?>