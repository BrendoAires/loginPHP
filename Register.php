<?php
    

    $name =$_POST['in_name'];
    $login = $_POST['in_login'];
    $email = $_POST['in_email'];
    $password = MD5($_POST['in_password']);
   // $db_name = ('test');

    $conexao = mysqli_connect('localhost', 'root', '', 'test');
    //mysqli_select_db('test');

    $query_select = "select login from user where login = '$login'";
    $select = mysqli_query($conexao, $query_select);

    $array = mysqli_fetch_array($select);
    $logarray = $array['login'];

    if ($login == "" || $login == null){
        echo "<script language='javascript' type='text/javascript'> 
        alert('Preencha o campo login'); 
        window.location.href='Register.html';</script>";
    } else {
        if ($logarray == $login){
            echo"<script language='javascript' type='text/javascript'> 
            alert('Já existe usuário com esse login'); 
            window.location.href='Register.html';</script>";
            die();
        }else{
            $query = "INSERT INTO user (name, login, email, password) VALUES ('$name', '$login', '$email', '$password')";
            $insert = mysqli_query($conexao, $query);

            if($insert){
                echo "<script language='javascript' type='text/javascript'> 
                alert('Usuário cadastrado com sucesso'); 
                window.location.href='index.html';</script>";
            }else{
                echo "<script language='javascript' type='text/javascript'> 
                alert('Não fpo possível cadastrar usuário'); 
                window.location.href='Register.html';</script>";
            }
        }
    }

    if(mysqli_affected_rows($conexao)>0){
        echo "<p> Usuário cadastrado</p>";
        echo '<a href="index.html"> Voltar</a>';
    }
    else{
        echo "não foi possivel cadastrar";
    }
    


?>