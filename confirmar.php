<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
$nif = mysqli_real_escape_string($conn, $_POST['nif']);

$sql_cliente = "INSERT INTO clientes (nome, email, telefone, nif) VALUES ('$nome', '$email', '$telefone', '$nif')";
mysqli_query($conn, $sql_cliente);

$id_cliente = mysqli_insert_id($conn);

$id_quarto = $_POST['id_quarto'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$pessoas = $_POST['pessoas'];
$preco_total = $_POST['preco_total'];

$sql_reserva = "INSERT INTO reservas (id_cliente, id_quarto, check_in, check_out, quantidade_pessoas, preco_total) VALUES ($id_cliente, $id_quarto, '$checkin', '$checkout', $pessoas, $preco_total)";

$sucesso = mysqli_query($conn, $sql_reserva);

if ($sucesso) {
    $sql_quarto = "SELECT tipo FROM quartos WHERE id_quarto = $id_quarto";
    $query_quarto = mysqli_query($conn, $sql_quarto);
    $quarto = mysqli_fetch_assoc($query_quarto);
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/backpack4.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Confirmação da Reserva</title>
</head>

<body>
    <header>
        <div class="container text-center mt-4">
            <h1 class="display-5 fw-bold">Fazenda Resort</h1>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#acomodacao">Acomodações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactos.php">Contactos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="termos.php">Termos e Politicas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <?php if ($sucesso): ?>
                    <div class="confirmation-card card p-4 shadow-sm border-success">
                        <div class="confirmation-icon icon-success">✓</div>
                        <h2 class="text-success text-center">Reserva Confirmada!</h2>
                        <p class="text-center">Olá <strong><?= $nome ?></strong>, a sua reserva na Fazenda Resort foi registada.</p>
                        <hr>
                        <p><strong>Detalhes:</strong></p>
                        <ul>
                            <li>Quarto: <?= $quarto['tipo'] ?></li>
                            <li>Check-in: <?= date('d/m/Y', strtotime($checkin)) ?></li>
                            <li>Check-out: <?= date('d/m/Y', strtotime($checkout)) ?></li>
                            <li>Hóspedes: <?= $pessoas ?></li>
                            <li>Total: <?= number_format($preco_total, 2, ',', '.') ?> €</li>
                        </ul>
                        <a href="index.php" class="btn btn-primary w-100 mt-3">Voltar ao Início</a>
                    </div>
                <?php else: ?>
                    <div class="confirmation-card card p-4 shadow-sm border-danger">
                        <div class="confirmation-icon icon-danger">✕</div>
                        <h2 class="text-danger text-center">Ocorreu um erro</h2>
                        <p class="text-center">Não foi possível concluir a sua reserva. Tente novamente.</p>
                        <a href="index.php" class="btn btn-secondary w-100 mt-3">Voltar ao Início</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <footer class="text-white py-4 mt-5" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Fazenda Resort</h5>
                    <p>O seu refúgio de paz e natureza.</p>
                </div>
                <div class="col-md-4">
                    <h5>Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="termos.php" class="text-white text-decoration-none">Termos e Políticas</a></li>
                        <li><a href="contactos.php" class="text-white text-decoration-none">Contactos</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>Email: geral@fazendaresort.com<br>Tel: +351 222 333 444</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2026 Fazenda Resort. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>