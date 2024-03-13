<?php
if(!getUser()){
    header('Location: /login');
} else {
    echo "<h2>Admin panel</h2>";
    $query = "SELECT * FROM `info`";
    $result = select($query);
}

$out = '';
foreach($result as $item){
    $out .= "<div>";
    $out .= "<h4>{$item['title']}</h4>";
    $out .= "<p>{$item['description']}</p>";
    $out .="<img src='static/images/{$item["image"]}' alt='{$item["image"]}' width='200px'>";    
    $out .= '<a href="./admin/delete/' . $item['id'] . '" onclick="return confirm(\'Удалить статью\')">Delete</a>';
    // $out .='<a href="/admin/delete/'.$item['id'].'" onclick="return confirm(\'Точно???\')">Удалить</a>';
    $out .="</div>";
}
echo $out;

?>