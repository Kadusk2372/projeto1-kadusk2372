<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index Veterinaria</title>
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
            text-align: center;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício Veterinaria</h1>
        <a href="consulta.php">Consulta</a><br>
        <a href="listar_atendimentos.php">Consulta (Atendimento)</a><br>
        <a href="add_atendimento.php">Adicionar Atendimento</a><br>
        <a href="add_animal.php">Adicionar Animal</a><br>
        <a href="add_cliente.php">Adicionar Cliente</a><br>
        <a href="add_TipoAnimal.php">Adicionar Tipo de Animal</a><br>
        <a href="add_veterinario.php">Adicionar Veterinário</a><br>
    </div>
</body>
</html>
