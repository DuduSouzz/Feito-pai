<?php 
include 'conexao.php'; 

// Colocar um novo usuario no site

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter dados do formulário
    $nome = $_POST['NOME'];
    $email = $_POST['EMAIL'];
    $telefone = $_POST['TELEFONE'];
    $empresa = $_POST['EMPRESA'];

    // Inserir dados no banco de dados
    $sql = "INSERT INTO CLIENTES (NOME, EMAIL, TELEFONE, EMPRESA) VALUES ('$nome', '$email', '$telefone', '$empresa')";
    $conexao->query($sql);
}

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Style_inserirclientes.css">
    
    <title>Document</title>

</head>
<style>
    .span-required{
        font-size: 12px;
        color: #e63636;
        margin: 5px 0 0 1px;
        display: none;
    }
</style>
<body>

<a href="listar_clientes.php" class="btn-adicionar">Voltar</a>
    <!-- Formulario para inserir um novo usuario -->
    <h1>Adicionar Novos Clientes</h1>
    <section>
        <form id="form" method="POST">
            <div>
                <label for="NOME">Nome</label>
                <input type="text" id="nome" class="puts" name="NOME" ><br>
                <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
                <label for="EMAIL">Email</label>
                <input type="email" id="email" class="puts" name="EMAIL" ><br>
                <span class="span-required">Digite um e-mail válido</span>
                <label for="TELEFONE">Telefone</label>
                <input type="tel" id="telefone" class="puts" name="TELEFONE" placeholder="(00) 00000-0000" ><br>
                <span class="span-required">Número no modelo: 11999999999</span>
                <label for="EMPRESA">Empresa</label>
                <input type="text" id="empresa" class="puts" name="EMPRESA" ><br>
                <span class="span-required">Obrigátorio</span>
                <button type="submit">Adicionar</button>
            </div>
        </form>
    </section>
    <br>
</body>
<script>
const form = document.querySelector('#form');
const nameInput = document.querySelector('#nome');
const emailInput = document.querySelector('#email');
const telefoneInput = document.querySelector('#telefone');
const empresaInput = document.querySelector('#empresa');
const campos = document.querySelectorAll('.puts');
const spans = document.querySelectorAll('.span-required');


form.addEventListener("submit", (event) => {
    event.preventDefault();



    //VERIFICA A VÁLIDAÇÃO DO NOME

    if(nameInput.value === "" || nameInput.value.length < 3){
        setError(0, 'Nome inválido!');
        return;
    }else{
        removeError(0, 'Nome válido');
    }


    //VERIFICA A VÁLIDAÇÃO DE EMAIL

    if(emailInput.value === "" || !IsEmailValido(emailInput.value)){
        setError(1, 'Digite um email válido');
        return;
    }else{
        removeError(1, 'Email válido');
    }

    //VERIFICA A VALIDAÇÃO DE TELEFONE

    if(telefoneInput.value === "" || !IsTelefoneValido(telefoneInput.value, 11)){
        setError(2, 'Telefone requer no mínimo 11 dígitos.');
        return;
    }else{
        removeError(2, 'Telefone válido.');
    }




    //VERIFICA SE O CAMPOS ESTÃO PREENCHIDOS, SE SIM, FORMULÁRIO SERÁ ENVIADO.
    form.submit();
});

//FUNÇÃO PARA VERIFICAR O EMAIL:

function IsEmailValido(email){
    const emailRegex = new RegExp(
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
    );

    if(emailRegex.test(email)){
        return true;
    }
    return false;
}



//FUNÇÃO PARA VERIFICAR O EMAIL:

function IsTelefoneValido(telefone, minDigitos){
    const telefoneXeger = new RegExp(
        /^[0-9]+$/
    );
    if(telefone.length >= minDigitos ){

        //TELEFONE VÁLIDO.
        return true;
    }
    
    //TELEFONE INVÁLIDO.
    return false;
}




//FUNÇÕES PARA EXIBIÇÃO DE ERRO E REMOVER ERRO:

function setError(index){
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
}

function removeError(index){
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}


</script>
</html>

