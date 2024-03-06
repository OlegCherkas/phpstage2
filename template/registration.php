<?php
if(isset($_POST['submit'])){
    $err = [];

    if(strlen($_POST['login']) < 4 or strlen($_POST['login'] > 20)){
        $err[] = "Логин не меньше 4 и не больше 20 символов";
    }

    if(strlen($_POST['password']) < 6 or strlen($_POST['password']) > 30){
        $err[] = "Пароль не меньше 6 и не больше 30 символов" . strlen($_POST['password']);
    }

    if(isLoginExist($_POST['login'])){
        $err[] = "Такой пользователь уже существует";
    }

    if(count($err) > 0){
        echo "Ошибки регистрации";
        foreach($err as $item){
            echo $item . ';';
        }
    } else {
        createUser($_POST['login'], $_POST['password']);
        
        header("Location: template/login");
        exit();
    }

}
?>

<h3>Registration</h3>
<form method="POST">
    Login: <input type="text" name="login" required>
    Password:<input type="text" name="password" required>
    <input type="submit" name="submit" value="registration">
</form>

