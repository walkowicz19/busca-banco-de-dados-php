<?php
// Configurações de conexão
$host = "localhost";
$port = "5432";
$dbname = "produtos";
$user = "postgres";
$password = "123456";

// String de conexão para PostgreSQL
$connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

$dbconn = pg_connect($connection_string);

if (!$dbconn) {
    die("Erro ao conectar ao banco de dados.");
}
?>