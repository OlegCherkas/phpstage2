<?php

if(isset($_POST['submit'])){    
    $user = login($_POST['login'], $_POST['password']);
}

if($user){
    $user = $user[0];    
    $hash = md5(generateCode(10));
    $ip = NULL;
    if(isset($_POST['ip']) && $_POST['ip'] == 'on'){
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    updateUser($user['id'], $hash, $ip);

    setcookie('id', $user['id'], time()+60*60*24, '/');
    setcookie('hash', $hash, time()+60*60*24, '/');
    header("Location: /admin");
    exit();    
} else {
    echo "Wrong login or password";
}

?> 
<h3>Login</h3>
<form method="POST">
    Login: <input type="text" name="login" required>
    Password:<input type="text" name="password" required>    
    Attach to IP:<input type="checkbox" name="ip">
    <input type="submit" name="submit" value="sign in">
</form>
