<?php

    $login = $_POST['in_login'];
    $password = MD5($_POST['in_password']);
    $enter = $_POST['enter'];

    $conexao = mysqli_connect('localhost', 'root', '', 'test');
    $sel = "select * from user where login = '$login' AND password = '$password'";

    if(isset($enter)){
            $verify = mysqli_query($conexao, $sel) or die("erro");
            if (mysqli_num_rows($verify) <= 0){
                echo "<script language='javascript' type='text/javascript'>
                alert('Login e/ou senha incorretos'); window.location.href='index.html'</script>";
                die();
            }else{
                setcookie("login", $login);
                header("Location: index.php");
            }

    }
?>