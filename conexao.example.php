
<?php

// Example database configuration.
// Copy this file to conexao.php and update
// the values for your local environment.

$utilizador = 'root';
$password = 'YOUR_LOCAL_PASSWORD';
$basedados = 'fazenda_resort';

$conn = mysqli_connect(
    'localhost',
    $utilizador,
    $password,
    $basedados
);

if (!$conn) {
    die("Falha na conexão com a base de dados.");
}
