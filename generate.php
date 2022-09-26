<?php
    $random = time();
    
    $firstname = "Janet";
    $lastname = "Oduleke";
    
    $splitFirstName = str_split($firstname);
    $splitLastName = str_split($lastname);

    $newFirstName = $splitFirstName[0].$splitFirstName[1].$splitFirstName[2];
    $newLastName = $splitLastName[0].$splitLastName[1].$splitLastName[2];
    
    $generatedId = $newFirstName.$newLastName.$random;
    print_r( $generatedId);
?>