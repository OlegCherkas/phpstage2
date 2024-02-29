<?php 
#main page template

$query = "SELECT * FROM info";
$result = select($query);

$out = '';

foreach($result as $item){
    $out .="<div>";
    $out .="<h4>{$item['title']}</h4>";
    $out .="<p>{$item['descr_min']}</p>";
    $out .="<img src='{$item["image"]}' alt='{$item["image"]}'>";
    $out .="</div>";
}

echo $out;