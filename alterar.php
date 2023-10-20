<?php
$servername = "localhost";
$username = "root";
$password = "masterkey";
$dbname = "catalogo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $linha1 = $_POST["linha1"];
    $linha2 = $_POST["linha2"];
    $linha3 = $_POST["linha3"];
    $linha4 = $_POST["linha4"];

    $sql = "UPDATE DETALHEPRODUTO SET LINHA1 = '$linha1', LINHA2 = '$linha2', LINHA3 = '$linha3', LINHA4 = '$linha4' WHERE CODPROD = '$codigo'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso!";
        echo "<br>";
        echo "<br>";
        echo " Voltando à lista";
        header("Refresh: 1; URL=consulta.php");
        exit; 
        
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}

if (isset($_GET["codigo"])) {
    $codigo = $_GET["codigo"];
    $sql = "SELECT CODPROD, LINHA1, LINHA2, LINHA3, LINHA4 FROM DETALHEPRODUTO WHERE CODPROD = '$codigo'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $codigo = $row["CODPROD"];
        $linha1 = $row["LINHA1"];
        $linha2 = $row["LINHA2"];
        $linha3 = $row["LINHA3"];
        $linha4 = $row["LINHA4"];
    } else {
        echo "Produto não encontrado.";
        exit;
    }
} else {

    echo "";
    exit;
}



$conn->close();
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/jewel-logo.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Alterar Peça</title>
   
</head>
<body>
    <header>
        <img src="images/jewels.png" alt="Logotipo" draggable="false" width="150px">
    </header>

    <div class="container">
        <h4>Alterar Produto <?php echo$codigo ?></h4>
        <form method="POST" action="alterar.php">
            <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
            <label for="linha1">Linha 1:</label>
            <input type="text" name="linha1" id="linha1" value="<?php echo $linha1; ?>"><br>
            <label for="linha2">Linha 2:</label>
            <input type="text" name="linha2" id="linha2" value="<?php echo $linha2; ?>"><br>
            <label for="linha3">Linha 3:</label>
            <input type="text" name="linha3" id="linha3" value="<?php echo $linha3; ?>"><br>
            <label for="linha4">Linha 4:</label>
            <input type="text" name="linha4" id="linha4" value="<?php echo $linha4; ?>"><br>
            <input type="submit" value="Gravar">
        </form>

        <form method="POST" action="excluir.php">
            <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
            <button type="submit" id="excluirItem">Excluir Item</button>
        </form>
    </div>
</body>
</html>
