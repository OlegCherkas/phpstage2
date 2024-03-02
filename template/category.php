<?php 
$url = $route[1];

$cat= getCategory($url);

if($cat['id']){
    $result = getCategoryArticle($cat['id']);
} else {
    header("Location: /template/404.php");
    exit();
}

$outCat = "";
$outCat .= "<div>";
$outCat .= "<h4>Category: {$cat['title']}</h4>";
$outCat .= "<p>Category: {$cat['description']}</p>";
$outCat .= "</div>";

echo $outCat; #Вывод категории

$outArticle = "";

foreach($result as $item){
    $outArticle .= "<div>";
    $outArticle .= "<h4>{$item['title']}</h4>";
    $outArticle .= "<p>{$item['description']}</p>";
    $outArticle .= "<img src='../static/images/{$item["image"]}' alt='{$item["image"]}' width='500px'>";
    $outArticle .= "</div>";
    $outArticle .= "<a href='../article/{$item["url"]}'> Read more...</a>";
}

echo $outArticle;

// var_dump($result);