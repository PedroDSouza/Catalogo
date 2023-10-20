<?php
$servername = "localhost";
$username = "root";
$password = "masterkey";
$dbname = "catalogo";

if (isset($_GET["id"])) {
    $produto_id = $_GET["id"];
}

if (isset($_GET["parc"])) {
    $produto_parc = $_GET["parc"];
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT  LINHA1, LINHA2, LINHA3, LINHA4, CAMINHO_IMAGEM FROM DETALHEPRODUTO WHERE CODPROD = '" . $_GET["id"] . "'";
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $campo1 = $row["LINHA1"];
    $campo2 = $row["LINHA2"];
    $campo3 = $row["LINHA3"];
    $campo4 = $row["LINHA4"];
    $caminho_imagem = $row["CAMINHO_IMAGEM"];
} else {
    echo "Nenhum resultado encontrado no banco de dados.";
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detalhado.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Detalhe do Produto</title>
</head>
<body>
    <div id="logo-container" class="container">
        <img id="logo" src="<?php 
                                
                                $logotipo = './images/' . $produto_parc . '.png';
                                echo $logotipo;    

                            ?>" alt="Logotipo" width="100px" draggable="false" onclick="trocarLogo()">
    </div>

    <div id="photo-container" class="container">
        <img src="./fotos/<?php echo $produto_id;?>.jpg" alt="Foto" width="300px" draggable="false">
    </div>

    <div id="detail-container" class="container">
        <p><i>Descrição da peça:</i></p>
        <ul>
            <li><?php echo $campo1; ?></li>
            <li><?php echo $campo2; ?></li>
            <li><?php echo $campo3; ?></li>
            <li><?php echo $campo4; ?></li>
        </ul>
        <h4><i>Agradecemos a preferência</i></h4>
    </div>


<script>
       /* function trocarLogo() {
            var codigo = prompt("Digite o nome do Revendedor:");

            if (codigo === "fulano" || codigo === "FULANO" || codigo === "Fulano") {

                document.getElementById("logo").src = "./images/fulano.png";

            }else if (codigo === "siclano" || codigo === "SICLANO" || codigo === "Siclano"){

                document.getElementById("logo").src = "./images/siclano.png";

            }
            
            else {

                alert("Código incorreto");

            }
} */
</script>





</body>
</html>