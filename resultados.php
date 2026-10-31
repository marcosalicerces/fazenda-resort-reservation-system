<?php
require_once('conexao.php');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$pessoas = (int)$_POST['pessoas'];
$hoje = date('Y-m-d');

if ($checkin < $hoje || $checkout <= $checkin) {
    echo "<script>alert('Datas inválidas!'); window.location='index.php';</script>";
    exit;
}

$quartos_disponiveis = [];

$sql_quartos = "SELECT * FROM quartos WHERE capacidade >= $pessoas";
$query_quartos = mysqli_query($conn, $sql_quartos);

while ($q = mysqli_fetch_assoc($query_quartos)) {
    $id = $q['id_quarto'];

    $sql_conflito = "SELECT COUNT(*) as total FROM reservas 
                     WHERE id_quarto = $id AND ('$checkin' < check_out AND '$checkout' > check_in)";
    $query_conflito = mysqli_query($conn, $sql_conflito);
    $res = mysqli_fetch_assoc($query_conflito);

    if ($res['total'] == 0) {
        $quartos_disponiveis[] = $q;
    }
}

$total_noites = (new DateTime($checkin))->diff(new DateTime($checkout))->days;
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/backpack4.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Resultados da Pesquisa</title>
</head>

<body class="results-body">
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

    <div class="container mt-5 mb-5 results-page">

        <div class="search-summary mb-4">
            <div class="row text-center">
                <div class="col-md-3">
                    <span class="summary-label">Check-in</span>
                    <p class="summary-value"><?= date('d/m/Y', strtotime($checkin)) ?></p>
                </div>
                <div class="col-md-3">
                    <span class="summary-label">Check-out</span>
                    <p class="summary-value"><?= date('d/m/Y', strtotime($checkout)) ?></p>
                </div>
                <div class="col-md-3">
                    <span class="summary-label">Hóspedes</span>
                    <p class="summary-value"><?= $pessoas ?></p>
                </div>
                <div class="col-md-3">
                    <span class="summary-label">Noites</span>
                    <p class="summary-value"><?= $total_noites ?></p>
                </div>
            </div>
        </div>

        <h2 class="mb-4">Quartos disponíveis</h2>

        <?php if (empty($quartos_disponiveis)): ?>
            <div class="no-results text-center">
                <p>Não encontrámos quartos disponíveis para as datas e número de hóspedes escolhidos.</p>
                <a href="index.php" class="btn btn-primary">Voltar e tentar outra pesquisa</a>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($quartos_disponiveis as $q): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card room-card h-100 shadow">
                            <img src="img/<?= $q['imagem'] ?>" class="card-img-top" alt="Foto do quarto">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= $q['tipo'] ?></h5>
                                <p class="card-text"><i class="bi bi-people"></i> Capacidade: <?= $q['capacidade'] ?> hóspedes</p>
                                <p class="price-tag"><?= $q['preco_noite'] ?>€ <span>/ noite</span></p>
                                <a href="reserva.php?id_quarto=<?= $q['id_quarto'] ?>&checkin=<?= $checkin ?>&checkout=<?= $checkout ?>&pessoas=<?= $pessoas ?>"
                                   class="btn btn-primary w-100 mt-auto">Reservar Agora</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
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