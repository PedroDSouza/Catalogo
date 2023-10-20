<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<style>
    body {
        font-family: 'Playfair Display', serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #EAECEE;
    }

    form {
        border: 2px solid #ccc;
        border-radius: 10px;
        padding: 30px; /* Aumentei o padding para espaçamento interno maior */
        text-align: center;
        width: 400px; /* Aumentei a largura do formulário */
        margin: 0 auto; /* Centralizei horizontalmente o formulário */
        background-color: white;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"] {
        width: 80%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #17202A;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #212F3D;
    }
</style>


<body>
    <form action="login/processar_login.php" method="POST">
        <h1>Login</h1>
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
