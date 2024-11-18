<?php

include 'conexao.php'; 

    $nome = $_POST['NOME'];
    $email = $_POST['EMAIL'];
    $telefone = $_POST['TELEFONE'];
    $empresa = $_POST['EMPRESA'];

 
    $sql = "INSERT INTO CLIENTES (NOME, EMAIL, TELEFONE, EMPRESA) VALUES ('$nome', '$email', '$telefone', '$empresa')";
    $resultado = $conexao->query($sql);

    if ($resultado) {
        header("Location: ../HTML/FaleConosco.html?message=Dados enviados com sucesso!&type=success");
        exit(); 
    } else {
   
        header("Location: ../HTML/FaleConosco.html?message=Erro ao enviar os dados.&type=error");
        exit();
    }

    // Fecha a conexão
    $conexao->close();  

?>