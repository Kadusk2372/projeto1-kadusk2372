<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeCliente = $_POST['nomeCliente'];
    $telefoneCliente = $_POST['telefoneCliente'];
    $emailCliente = $_POST['emailCliente'];
    $nomeAnimal = $_POST['nomeAnimal'];
    $fotoAnimal = $_POST['fotoAnimal'];
    $tipoAnimal = $_POST['tipoAnimal'];

    // Inserir cliente
    $stmt = $pdo->prepare('INSERT INTO tbcliente (nomeCliente, telefoneCliente, EmailCliente) VALUES (?, ?, ?)');
    $stmt->execute([$nomeCliente, $telefoneCliente, $emailCliente]);

    // Obter o id do cliente inserido
    $codCliente = $pdo->lastInsertId();

    // Inserir animal
    $stmt = $pdo->prepare('INSERT INTO tbanimal (nomeAnimal, fotoAnimal, codCliente, codTipoAnimal) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nomeAnimal, $fotoAnimal, $codCliente, $tipoAnimal]);

    header('Location: consulta.php');
    exit();
}

// Obter tipos de animais
$tiposAnimal = $pdo->query('SELECT codTipoAnimal, tipoAnimal FROM tbtipoanimal')->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }
        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }
        input[type="text"], input[type="file"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Adicionar Cliente e Animal</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="nomeCliente">Nome do Cliente:</label>
            <input type="text" name="nomeCliente" required>

            <label for="telefoneCliente">Telefone do Cliente:</label>
            <input type="text" name="telefoneCliente" required>

            <label for="emailCliente">Email do Cliente:</label>
            <input type="text" name="emailCliente" required>

            <label for="nomeAnimal">Nome do Animal:</label>
            <input type="text" name="nomeAnimal" required>

            <label for="fotoAnimal">Foto do Animal:</label>
            <input type="file" name="fotoAnimal" required>

            <label for="tipoAnimal">Tipo do Animal:</label>
            <select name="tipoAnimal" required>
                <?php foreach ($tiposAnimal as $tipo): ?>
                    <option value="<?= htmlspecialchars($tipo['codTipoAnimal']) ?>"><?= htmlspecialchars($tipo['tipoAnimal']) ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Adicionar">
        </form>
    </div>
</body>
</html>
