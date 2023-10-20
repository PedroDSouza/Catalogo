<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST') {

$servername = "localhost";
$username = "root";
$password = "masterkey";
$dbname = "catalogo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$codigo = $_POST["codigo"];
$detalhe1 = $_POST["detalhe1"];
$detalhe2 = $_POST["detalhe2"];
$detalhe3 = $_POST["detalhe3"];
$detalhe4 = $_POST["detalhe4"];


$sql = "INSERT INTO detalheproduto (codprod, linha1, linha2, linha3, linha4) VALUES ('$codigo', '$detalhe1', '$detalhe2', '$detalhe3', '$detalhe4')";

if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/jewel-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Adicionar Itens</title>
    <style>

    </style>
</head>
<body>
    <header>
        <img src="images/jewels.png" alt="Logotipo" draggable="false" width="150px">
    </header>

    <div class="container">
        <h2>Cadastro de Peças</h2>
        <a href="consulta.php" class="button">Consultar Peças</a>
        <form action="" method="post">
            <label for="codigo">Código da Peça:</label>
            <input type="text" id="codigo" name="codigo" required><br>

            <label for="detalhe1">Detalhe 1:</label>
            <input type="text" id="detalhe1" name="detalhe1" required><br>

            <label for="detalhe2">Detalhe 2:</label>
            <input type="text" id="detalhe2" name="detalhe2" ><br>

            <label for="detalhe3">Detalhe 3:</label>
            <input type="text" id="detalhe3" name="detalhe3" ><br>

            <label for="detalhe4">Detalhe 4:</label>
            <input type="text" id="detalhe4" name="detalhe4" ><br>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
