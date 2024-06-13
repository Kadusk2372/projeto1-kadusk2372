<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Animal</title>
</head>
<body>
    <h1>CRUD de Animal</h1>
    <br>
    <a href="add_animal.php">Adicionar Animal</a><br><br>
    <table>
        <tr>
            <th>Código do Animal</th>
            <th>Nome do Animal</th>
            <th>Foto do Animal</th>
            <th>Código do Tipo do Animal</th>
            <th>Código do Cliente</th>
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');
        $stmt = $pdo->query('SELECT * FROM tbanimal');
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['codAnimal']}</td>";
            echo "<td>{$row['nomeAnimal']}</td>";
            echo "<td>{$row['fotoAnimal']}</td>";
            echo "<td>{$row['codTipoAnimal']}</td>";
            echo "<td>{$row['codcliente']}</td>";
            echo "</tr>";

         
        }
        ?>
    </table>
        <a href="index.php">Voltar</a>
</body>
</html>
