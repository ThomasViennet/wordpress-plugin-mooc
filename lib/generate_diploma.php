<?php
// Load an image from jpeg URL 
require_once('../../../../wp-load.php');
// $imgPath = realpath(plugin_dir_path(__FILE__) . '../assets/img/certification-SEO-referencime.jpg');
// function certificate(){
//     return 'https://referencime.fr/wp-content/uploads/2024/01/certification-SEO-referencime-scaled.jpg';
// }

$certificat = imagecreatefromjpeg('https://referencime.fr/wp-content/uploads/2024/01/certification-SEO-referencime-scaled.jpg'); 
      
    // View the loaded image in browser 
    header('Content-type: image/jpg');   
    imagejpeg($certificat); 
    imagedestroy($certificat); 


