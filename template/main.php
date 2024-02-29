<?php 
#main page template

$query = "SELECT * FROM info";
$result = select($query);

$out = '';

foreach($result as $item){
    $out .="<div>";
    $out .="<h4>Title: {$item['title']}</h4>";
    $out .="<p>Category ID: {$item['cid']}</p>";
    $out .="<p>Descr_min: {$item['descr_min']}</p>";
    $out .="<p>Description: {$item['description']}</p>";
    $out .="<img src='static/images/{$item["image"]}' alt='{$item["image"]}' width='200px'>";

    $out .="<a href='article/{$item["url"]}'> Read more...</a>";
    $out .="</div>";
}

echo $out;