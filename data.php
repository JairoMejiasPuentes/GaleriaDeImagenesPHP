<?php
// Indicar ruta

if(isset($_REQUEST["method"])){

    switch($_REQUEST["method"]){
        
        case "delImages":
            echo delImages();
        break;
        case "showAllImages":
            echo (json_encode(showAllImages()));
        break;
        
        default:
        break;
                
    }
}
            
if(isset($_FILES['image'])){
    uploadImage();
}

function uploadImage(){
    if(move_uploaded_file($_FILES['image']['tmp_name'], "img/".$_FILES['image']['name'])){
        return true;
    }else{
        return false;
    }
}

function delImages(){
    if(isset($_REQUEST['filename'])){
        $ar= $_REQUEST['filename'].".jpg";
        unlink($ar);
        return true;
    }

}

function showAllImages(){
    $path = "img/"; // Indicar ruta
    $arrayFiles= [];
    $filehandle = opendir($path); 
    while ($file = readdir($filehandle)) {
        if ($file != "." && $file != "..") {
                $arrayFiles[] = array(
                    'url' => $file
                );
            } 
        } 
    return $arrayFiles;
    closedir($filehandle);
}
