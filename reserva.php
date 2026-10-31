<?php
require_once('conexao.php');

// Recebo os dados da url via GET
$id = $_GET['id_quarto'];
$checkin = $_GET['checkin'];
$checkout = $_GET['checkout'];
$pessoas = $_GET['pessoas'];

$sql = "SELECT * FROM quartos WHERE id_quarto = $id";
$query = mysqli_query($conn, $sql);
$quarto = mysqli_fetch_assoc($query);

if (!$quarto) {
    echo "Quarto não encontrado.";
    exit;
}

$d1 = new DateTime($checkin);
$d2 = new DateTime($checkout);
$total_noites = $d1->diff($d2)->days;
$preco_total = ($total_noites * $quarto['preco_noite']) + 5;
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/backpack4.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Resumo da Reserva</title>
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

    <div class="container mt-5 mb-5 reservation-summary">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="summary-card mb-4">
                    <img src="img/<?= $quarto['imagem'] ?>" class="room-preview mb-4" alt="<?= $quarto['tipo'] ?>">
                    <h1 class="mb-4">Resumo da Reserva</h1>
                    <p><strong>Quarto:</strong> <?= $quarto['tipo'] ?></p>
                    <p><strong>Check-in:</strong> <?= date('d/m/Y', strtotime($checkin)) ?></p>
                    <p><strong>Check-out:</strong> <?= date('d/m/Y', strtotime($checkout)) ?></p>
                    <p><strong>Hóspedes:</strong> <?= $pessoas ?></p>
                    <p><strong>Total de Noites:</strong> <?= $total_noites ?></p>
                    <p class="price-highlight">Preço Total: <?= number_format($preco_total, 2, ',', '.') ?> €</p>
                </div>

                <div class="summary-card">
                    <h4 class="mb-3">Os seus dados</h4>
                    <form action="confirmar.php" method="POST">
                        <input type="hidden" name="id_quarto" value="<?= $id ?>">
                        <input type="hidden" name="checkin" value="<?= $checkin ?>">
                        <input type="hidden" name="checkout" value="<?= $checkout ?>">
                        <input type="hidden" name="pessoas" value="<?= $pessoas ?>">
                        <input type="hidden" name="preco_total" value="<?= $preco_total ?>">

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIF</label>
                            <input type="text" name="nif" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Confirmar Reserva</button>
                    </form>
                </div>

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