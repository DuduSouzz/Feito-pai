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
<body>
    <h2>Editar Cliente</h2>
    <section>
    <form method="POST">
        <div>
        <input type="hidden" name="acao" value="atualizar"><br>
        <label for="NOME">Nome:</label><br>
        <input type="text" name="NOME" value="<?php echo $cliente['NOME']; ?>" required><br>
        <label for="EMAIL">Email:</label><br>
        <input type="email" name="EMAIL" value="<?php echo $cliente['EMAIL']; ?>" required><br>
        <label for="TELEFONE">Telefone:</label><br>
        <input type="tel" name="TELEFONE" value="<?php echo $cliente['TELEFONE']; ?>" required><br>
        <label for="EMPRESA">Empresa:</label><br>
        <input type="text" name="EMPRESA" value="<?php echo $cliente['EMPRESA']; ?>" required><br>
        <button type="submit">Atualizar</button>
        </div>
    </form>
</section>
</body>
</html>




