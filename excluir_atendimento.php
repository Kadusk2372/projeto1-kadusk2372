<?php
include('conn.php');

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM tbatendimento WHERE codAtendimento = ?');
$stmt->execute([$id]);

header('Location: add_atendimento.php');

?>
