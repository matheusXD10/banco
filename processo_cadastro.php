<?php

    //nosso servidor
    $servername= "localhost";

    //usuário padrão do servidor local
    $username= "root";

    //senha padrão do servidor local
    $password= "";

    //nome do banco de dados
    $db_name= "usuarios";

    //faz a coneção com o banco de dados, sequindo informações especificadas
    $conn= new mysqli($servername,$username,$password,$db_name);

    //verifica a conexão com o banco de dados, em caso de erro
    if($conn->connect_error) {
        //o die encerra o script e pode conter uma mensagem de erro
        die("Falha na coneção!" . $conn->conect_error);
    }

    //capturando os dados fornecidos pelo formulário
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha=password_hash($_POST['senha'], PASSWORD_DEFAULT);

    //
    //
    $sql= "INSERT INTO usuarios (nome, email, senha)
    VALUES('$nome', '$email', '$senha')";

    if ($conn->query($sql)) {
        echo "Usuário verificado com sucesso";
    }

    else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
?>
