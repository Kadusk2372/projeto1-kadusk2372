<?php
include('conn.php');

// Excluir atendimento
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $pdo->prepare('DELETE FROM tbatendimento WHERE codAtendimento = ?');
    $stmt->execute([$id]);

    header('Location: listar_atendimentos.php');
    exit();
}

// Obter todos os atendimentos
$atendimentos = $pdo->query('SELECT a.codAtendimento, a.DataAtendimento, a.HoraAtendimento, an.nomeAnimal, v.nomeVet FROM tbatendimento a JOIN tbanimal an ON a.codAnimal = an.codAnimal JOIN tbveterinario v ON a.codVet = v.codVet')->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Atendimentos</title>
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
            max-width: 800px;
            text-align: center;
        }
        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        a.button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Listar Atendimentos</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Animal</th>
                <th>Veterinário</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($atendimentos as $atendimento): ?>
                <tr>
                    <td><?= htmlspecialchars($atendimento['codAtendimento']) ?></td>
                    <td><?= htmlspecialchars(date('d/m/Y', strtotime($atendimento['DataAtendimento']))) ?></td>
                    <td><?= htmlspecialchars(date('H:i', strtotime($atendimento['HoraAtendimento']))) ?></td>
                    <td><?= htmlspecialchars($atendimento['nomeAnimal']) ?></td>
                    <td><?= htmlspecialchars($atendimento['nomeVet']) ?></td>
                    <td>
                        <a href="listar_atendimentos.php?delete=<?= htmlspecialchars($atendimento['codAtendimento']) ?>" class="button">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="add_atendimento.php" class="button">Adicionar Atendimento</a>
    </div>
</body>
</html>
