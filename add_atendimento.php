<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DataAtendimento = $_POST['DataAtendimento'];
    $HoraAtendimento = $_POST['HoraAtendimento'];
    $codAnimal = $_POST['codAnimal'];
    $codVet = $_POST['codVet'];

    $stmt = $pdo->prepare('INSERT INTO tbatendimento (DataAtendimento, HoraAtendimento, codAnimal, codVet) VALUES (?, ?, ?, ?)');
    $stmt->execute([$DataAtendimento, $HoraAtendimento, $codAnimal, $codVet]);

    header('Location: add_atendimento.php');
    exit();
}

$animais = $pdo->query('SELECT codAnimal, nomeAnimal FROM tbanimal')->fetchAll();
$veterinarios = $pdo->query('SELECT codVet, nomeVet FROM tbveterinario')->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Atendimento</title>
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
        input[type="date"], input[type="time"], select {
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
        <h2>Adicionar Atendimento</h2>
        <form method="POST">
            <label for="DataAtendimento">Data do Atendimento:</label>
            <input type="date" name="DataAtendimento" required>

            <label for="HoraAtendimento">Hora de Atendimento:</label>
            <input type="time" name="HoraAtendimento" required>

            <label for="codAnimal">Animal:</label>
            <select name="codAnimal" required>
                <?php foreach ($animais as $animal): ?>
                    <option value="<?= htmlspecialchars($animal['codAnimal']) ?>"><?= htmlspecialchars($animal['nomeAnimal']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="codVet">Veterinário:</label>
            <select name="codVet" required>
                <?php foreach ($veterinarios as $veterinario): ?>
                    <option value="<?= htmlspecialchars($veterinario['codVet']) ?>"><?= htmlspecialchars($veterinario['nomeVet']) ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Adicionar">
        </form>
    </div>
</body>
</html>
