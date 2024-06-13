<?php
include('conn.php');

// Excluir atendimento
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $pdo->prepare('DELETE FROM tbatendimento WHERE codAtendimento = ?');
    $stmt->execute([$id]);

    header('Location: consulta.php');
    exit();
}

// Obter todos os clientes com seus animais
$clientes = $pdo->query('
    SELECT 
        c.codCliente, 
        c.nomeCliente, 
        c.telefoneCliente, 
        c.EmailCliente, 
        a.nomeAnimal, 
        a.fotoAnimal, 
        t.tipoAnimal 
    FROM tbcliente c 
    JOIN tbanimal a ON c.codCliente = a.codCliente 
    JOIN tbtipoanimal t ON a.codTipoAnimal = t.codTipoAnimal
')->fetchAll();

// Obter todos os atendimentos
$atendimentos = $pdo->query('
    SELECT 
        a.codAtendimento, 
        a.DataAtendimento, 
        a.HoraAtendimento, 
        an.nomeAnimal, 
        an.fotoAnimal, 
        ta.tipoAnimal, 
        v.nomeVet 
    FROM tbatendimento a 
    JOIN tbanimal an ON a.codAnimal = an.codAnimal 
    JOIN tbtipoanimal ta ON an.codTipoAnimal = ta.codTipoAnimal 
    JOIN tbveterinario v ON a.codVet = v.codVet
')->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 800px;
            margin: 20px auto;
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
        img {
            max-width: 100px;
            border-radius: 4px;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        a.button:hover {
            background-color: #45a049;
        }
        a.button-red {
            background-color: #f44336;
        }
        a.button-red:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Clientes e seus Animais</h2>
        <table>
            <tr>
                <th>Código do Cliente</th>
                <th>Nome do Cliente</th>
                <th>Telefone do Cliente</th>
                <th>Email do Cliente</th>
                <th>Nome do Animal</th>
                <th>Foto do Animal</th>
                <th>Tipo do Animal</th>
            </tr>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente['codCliente']) ?></td>
                    <td><?= htmlspecialchars($cliente['nomeCliente']) ?></td>
                    <td><?= htmlspecialchars($cliente['telefoneCliente']) ?></td>
                    <td><?= htmlspecialchars($cliente['EmailCliente']) ?></td>
                    <td><?= htmlspecialchars($cliente['nomeAnimal']) ?></td>
                    <td><img src="<?= htmlspecialchars($cliente['fotoAnimal']) ?>" alt="Foto do Animal"></td>
                    <td><?= htmlspecialchars($cliente['tipoAnimal']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="container">
        <h2>Atendimentos</h2>
        <a href="add_atendimento.php" class="button">Adicionar Atendimento</a>
        <table>
            <tr>
                <th>Código do Atendimento</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Nome do Animal</th>
                <th>Foto</th>
                <th>Tipo do Animal</th>
                <th>Veterinário</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($atendimentos as $atendimento): ?>
                <tr>
                    <td><?= htmlspecialchars($atendimento['codAtendimento']) ?></td>
                    <td><?= htmlspecialchars($atendimento['DataAtendimento']) ?></td>
                    <td><?= htmlspecialchars($atendimento['HoraAtendimento']) ?></td>
                    <td><?= htmlspecialchars($atendimento['nomeAnimal']) ?></td>
                    <td><img src="<?= htmlspecialchars($atendimento['fotoAnimal']) ?>" alt="Foto do Animal"></td>
                    <td><?= htmlspecialchars($atendimento['tipoAnimal']) ?></td>
                    <td><?= htmlspecialchars($atendimento['nomeVet']) ?></td>
                    <td>
                        <a href="consulta.php?delete=<?= htmlspecialchars($atendimento['codAtendimento']) ?>" class="button button-red">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
