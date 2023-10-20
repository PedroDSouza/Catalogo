<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: index.php");
    exit;
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "masterkey";
$dbname = "catalogo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT CODPROD, LINHA1, LINHA2, LINHA3, LINHA4 FROM DETALHEPRODUTO";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/jewel-logo.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Consulta de Peças</title>
    <style>
        
        body {
            font-family: 'Playfair Display', serif;
            background-color: white;
            margin: 0;
            padding-top: 2%;
            padding-left: 5%;
            padding-right: 5%;
        }

        header {
            background-color: white;
            color: black;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }



        .title-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        h4 {
            margin: 0; 
        }

        .button {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #555;
        }

  @media screen and (max-width: 768px) {
        

            .table-container {
                max-width: 100%;
                overflow-x: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 5px;
                text-align: left;
                border: none;

            th {
                background-color: #333;
                color: white;
            }

            tr:hover {
                background-color: #f5f5f5;
            }
        }
    }
    </style>
</head>
<body>
    <header>
        <img src="images/jewels.png" alt="Logotipo" draggable="false" width="150px">
    </header>


<div class="container center-container" style="padding-top: 6%">
    <div class="container">
        <div class="title-container">
            <h4>Peças Cadastradas</h4>
            <a href="inserir.php" class="button">Inserir + Peças</a>
        </div>
        <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Linha 1</th>
                    <th>Linha 2</th>
                    <th>Linha 3</th>
                    <th>Linha 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["CODPROD"] . "</td>";
                        echo "<td>" . $row["LINHA1"] . "</td>";
                        echo "<td>" . $row["LINHA2"] . "</td>";
                        echo "<td>" . $row["LINHA3"] . "</td>";
                        echo "<td>" . $row["LINHA4"] . "</td>";
                        echo "<td><a href='alterar.php?codigo=" . $row["CODPROD"] . "'><img src='./images/edit.png' alt='Editar' width='20px'></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum resultado encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
        <a href="login/logout.php">Sair</a>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>
