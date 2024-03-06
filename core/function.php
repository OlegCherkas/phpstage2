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

function getCategory($url){

    $query = "SELECT * FROM `category` WHERE `url`='{$url}'";

    return select($query)[0];
}

function getCategoryArticle($cid){
    $query = "SELECT * FROM `info` WHERE `cid`='{$cid}'";

    return select($query);
}

function isLoginExist($login){
    $query = "SELECT * FROM `users` WHERE `login`='{$login}'";
    $result = select($query);

    if(count($result) > 0) return true;
    return false;
}

function createUser($login, $password){
    $login    = trim($login);
    $password = md5(md5(trim($password)));

    $query = "INSERT INTO `users` SET `login`='{$login}', `password`='{$password}'";
    execQuery($query);
}

function login($login, $password){
    
    $login    = trim($login);
    $password = md5(md5(trim($password)));

    $query = "SELECT * FROM `users` WHERE `login`='{$login}' AND `password`='{$password}'";
    
    $result = select($query);

    if(count($result) == 0) return false;
    return $result;
}

function generateCode($num){
    $count = '';

    for($i = 0; $i < $num; $i++){
        $count .= rand(0, 9);
    }

    return $count;
}

function updateUser($userId, $hash, $ip){
    if($ip){
        $query = "UPDATE `users` SET `hash`='{$hash}', `ip`=INET_ATON('{$ip}') WHERE `id`='{$userId}'";
    } else {
        $query = "UPDATE `users` SET `hash`='{$hash}' WHERE `id`='{$userId}'";
    }

    return execQuery($query);
}

function getUser(){
    if(isset($_COOKIE['id']) && isset($_COOKIE['hash'])){
        $query = "SELECT `id`, `login`, `hash`, INET_NTOA(ip) as ip FROM `users` WHERE id = ".intval($_COOKIE['id'])." LIMIT 1";
        $user = select($query);

        if(count($user) === 0){
            return false;
        } else {
            $user = $user[0];

            if(!is_null($user['ip'])){
                if($user['ip'] !== $_SERVER['REMOTE_ADDR']){
                    clearCookies();
                    return false;
                }
            }

            if($user['hash'] == $_COOKIE['hash'] && $user['id'] == $_COOKIE['id']){
                $_GET['login'] = $user['login'];
                return true;
            } else {
                clearCookies();
                return false;
            }
        }

    } else {
        clearCookies();
        return false;
    }
}

function clearCookies(){
    setcookie('id', '', time()-60*60*24, '/', null, null, true);
    setcookie('hash', '', time()-60*60*24, '/', null, null, true);
    unset($_GET['login']);
}

function test($a){
    echo $a;
}
?>