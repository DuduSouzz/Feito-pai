<?php 
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM CLIENTES WHERE ID = $id";
    $resultado = $conexao->query($sql);
    $cliente = $resultado->fetch_assoc();
}


// Atualizar usuário
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] == 'atualizar') {
    $nome = trim($_POST['NOME']);
    $email = trim($_POST['EMAIL']);
    $telefone = trim($_POST['TELEFONE']);
    $empresa = trim($_POST['EMPRESA']);

    $sql = "UPDATE CLIENTES SET NOME = '$nome', EMAIL = '$email', TELEFONE = '$telefone', EMPRESA = '$empresa' WHERE ID = $id";
    $conexao->query($sql);

    header("Location: listar_usuarios.php");
    exit();
}


$conexao->close();

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Style_editarclientes.css">
    <title>Editar Cliente</title>
</head>
<style>
    .span-required{
        font-size: 15px;
        color: #e63636;
        margin: -15px 0 12px 5px;
        display: none;
    }
</style>
<body>
    <h2>Editar Cliente</h2>
    <section>
    <form id="form" method="POST">
        <div>
        <input type="hidden" name="acao" value="atualizar"><br>
        <label for="NOME">Nome:</label><br>
        <input type="text" id="nome" class="puts" name="NOME" value="<?php echo $cliente['NOME']; ?>" ><br>
        <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
        <label for="EMAIL">Email:</label><br>
        <input type="email" id="email" class="puts" name="EMAIL" value="<?php echo $cliente['EMAIL']; ?>" ><br>
        <span class="span-required">Digite um e-mail válido</span>
        <label for="TELEFONE">Telefone:</label><br>
        <input type="tel" id="telefone" class="puts" name="TELEFONE" value="<?php echo $cliente['TELEFONE']; ?>" ><br>
        <span class="span-required">Número no modelo 11 dígitos: 85900000000</span>
        <label for="EMPRESA">Empresa:</label><br>
        <input type="text" id="empresa" class="puts" name="EMPRESA" value="<?php echo $cliente['EMPRESA']; ?>" ><br>
        <span class="span-required">Obrigátorio</span>
        <button type="submit">Atualizar</button>
        </div>
    </form>
</section>
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




