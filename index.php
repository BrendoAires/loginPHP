<?php
    $login_cookie = $_COOKIE['login'];

        if(isset($login_cookie)){
            echo"Bem-vindo, $login_cookie<br>";
            echo"Essas informações <font color='red'>podem</font> ser acessadas por vc";
            echo"<a href='index.html'>Sair</a>";

            
        }else{
            echo"Bem-vindo, convidado<br>";
            echo"Essas informações <font color='red'>podem</font> ser acessadas por vc";
            echo"<br> <a href='index.html'>Faça login</a> para ler o conteudo";
        }

?>