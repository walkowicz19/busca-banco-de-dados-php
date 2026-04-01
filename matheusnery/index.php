<?php
include('config.php');

// Captura o ID via GET ou POST (usando $_REQUEST para simplificar)
$id_buscado = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

if ($id_buscado) {
    // Consulta filtrada (Lembre-se: em sistemas reais, sanitize o input!)
    $query = "SELECT * FROM usuario WHERE id = " . (int)$id_buscado;
} else {
    // Consulta geral
    $query = "SELECT * FROM usuario";
}

$result = pg_query($dbconn, $query);

if (!$result) {
    echo "Erro na consulta.";
    exit;
}

echo "<h2>Resultados da Busca:</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Senha</th>
            <th>Status</th>
        </tr>";

while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['idusuario'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    $status_db = $row['status'];
    $status_conversao = ($status_db === 't') ? "true" : "false";
    echo "<td>" . $status_conversao . "</td>";
    echo "</tr>";
}

echo "</table>";

// Fecha a conexão
pg_close($dbconn);
?>