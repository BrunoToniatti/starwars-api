<?php
$host = 'localhost';
$dbName = 'starwars';
$username = 'root';
$password = '';

// Conexão com o banco de dados
$conn = mysqli_connect($host, $username, $password, $dbName);

if (!$conn) {
    die('Erro de conexão: ' . mysqli_connect_error());
}

// Função para gravar logs no banco
function saveLog($conn, $detalheRequisicao)
{
    $sql = "INSERT INTO logs (detalhe_requisicao, criado) VALUES (?, NOW())";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $detalheRequisicao);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        error_log('Erro ao preparar a consulta: ' . mysqli_error($conn));
    }
}
?>
