<?php 

function explodeUrl($url){
    return explode("/", $url);
}

function getArticle($url){
    $query = "SELECT * FROM info WHERE `url`='{$url}'";
    $res = select($query)[0];

    if(!$res && $url !== 'template'){
        header("Location: /template/404.php");
        exit();
    } else {
        return $res;
    }    
}