<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/backpack4.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Contactos</title>
</head>

<body class="contacts-body">
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
                            <a class="nav-link active" aria-current="page" href="contactos.php">Contactos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="termos.php">Termos e Politicas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5 mb-5 contacts-page">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="summary-card mb-4">
                    <h2 class="mb-4">Contactos</h2>
                    <p><strong>Morada:</strong> Estrada Nacional 123, Braga, Portugal</p>
                    <p><strong>Telefone:</strong> +351 222 333 444</p>
                    <p><strong>Email:</strong> geral@fazendaresort.com</p>
                    <p><strong>Horário de atendimento:</strong> Todos os dias, 9h às 20h</p>
                </div>

                <div class="summary-card">
                    <h4 class="mb-3">Envie-nos uma mensagem</h4>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mensagem</label>
                            <textarea name="mensagem" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
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