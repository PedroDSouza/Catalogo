<?php
if (isset($_POST["codigo"])) {
    $codigo = $_POST["codigo"];

    $servername = "localhost";
    $username = "root";
    $password = "masterkey";
    $dbname = "catalogo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }


    $sqlDelete = "DELETE FROM DETALHEPRODUTO WHERE CODPROD = '$codigo'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Registro excluído com sucesso!";
        echo "<br>";
        echo "<br>";
        echo " Voltando à lista";
        header("Refresh: 1; URL=consulta.php");
        exit;
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Código não foi fornecido.";
}
?>