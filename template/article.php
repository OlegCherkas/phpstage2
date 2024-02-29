<?php
$url = $route[1];
$result = getArticle($url);

$out .="<div>";
$out .="<h4>Title: {$result['title']}</h4>";
$out .="<p>Category ID: {$result['cid']}</p>";
$out .="<p>Descr_min: {$result['descr_min']}</p>";
$out .="<p>Description: {$result['description']}</p>";
$out .="<img src='../static/images/{$result["image"]}' alt='{$result["image"]}' width='200px'>";
$out .="</div>";

echo $out;
