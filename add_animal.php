<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeAnimal = $_POST['nomeAnimal'];
    $fotoAnimal = $_POST['fotoAnimal'];
    $codTipoAnimal = $_POST['codTipoAnimal'];
    $codcliente = $_POST['codcliente'];

    $stmt = $pdo->prepare('INSERT INTO tbanimal (nomeAnimal, fotoAnimal, codTipoAnimal, codcliente) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nomeAnimal, $fotoAnimal, $codTipoAnimal, $codcliente]);

    header('Location: add_animal.php');
    exit();
}

$tipoAnimais = $pdo->query('SELECT codTipoAnimal, tipoAnimal FROM tbtipoanimal')->fetchAll();
$clientes = $pdo->query('SELECT codCliente, nomeCliente, telefoneCliente, EmailCliente FROM tbcliente')->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Animal</title>
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
        input[type="text"], select {
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
        <h2>Adicionar Animal</h2>
        <form method="POST">
            <label for="nomeAnimal">Nome do Animal:</label>
            <input type="text" name="nomeAnimal" required>

            <label for="codTipoAnimal">Tipo de Animal:</label>
            <select name="codTipoAnimal" required>
                <?php foreach ($tipoAnimais as $tipoAnimal): ?>
                    <option value="<?= htmlspecialchars($tipoAnimal['codTipoAnimal']) ?>"><?= htmlspecialchars($tipoAnimal['tipoAnimal']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="codcliente">Cliente:</label>
            <select name="codcliente" required>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= htmlspecialchars($cliente['codCliente']) ?>"><?= htmlspecialchars($cliente['nomeCliente']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="fotoAnimal">Foto do Animal:</label>
            <input type="text" name="fotoAnimal" required>
            
            <input type="submit" value="Adicionar">
        </form>
    </div>
</body>
</html>
