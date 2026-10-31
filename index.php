<?php
require_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="img/backpack4.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <div class="hero">
    <header>
        <div class="container text-center mt-4">
            <h1 class="display-5 fw-bold">Fazenda Resort</h1>
        </div>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#acomodacao">Acomodações</a>
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

   <section class="container mt-5">
    <form action="resultados.php" method="POST" class="row g-3 justify-content-center">
        <div class="col-md-3">
            <label class="form-label">Check-in</label>
            <input type="date" name="checkin" class="form-control" id="checkin" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Check-out</label>
            <input type="date" name="checkout" class="form-control" id="checkout" required>
        </div>
        <div class="col-md-2">
            <label class="form-label">Hóspedes</label>
            <input type="number" name="pessoas" class="form-control" min="1" max="10" required>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Pesquisar</button>
        </div>
    </form>
</section>
    </section>
    </div>

<section class="container py-5">
    <h2 class="text-center mb-4" id="acomodacao">Nossas Acomodações</h2>
    <div class="row">
        <?php
        $query_quartos = mysqli_query($conn, "SELECT * FROM quartos");
        while($q = mysqli_fetch_assoc($query_quartos)) {
            // Supondo que as fotos estão na pasta 'img/'
            $foto = "img/" . $q['imagem']; 
            
            echo "
            <div class='col-md-4 mb-4'>
                <div class='card shadow h-100'>
                    <img src='{$foto}' class='card-img-top' alt='{$q['tipo']}' style='height: 200px; object-fit: cover;'>
                    <div class='card-body text-center'>
                        <h5 class='card-title'>{$q['tipo']}</h5>
                        <p class='card-text'>Capacidade: {$q['capacidade']} pessoas</p>
                        <p class='fw-bold text-primary'>{$q['preco_noite']}€ / noite</p>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</section>

    <section class="container-fluid py-5 text-center text-white" id="places">
    <div class="row">
        <div class="col-12">
            <h2 class="display-6">Lugares únicos para</h2>
            <h1 class="display-4 fw-bold">experiências memoráveis</h1>
        </div>
    </div>
</section>

<section class="attractions-section py-5">
    <div class="container-fluid px-4 position-relative">

        <button class="carousel-arrow arrow-left" id="prevBtn" aria-label="Anterior">
            <i class="bi bi-chevron-left"></i>
        </button>

        <div class="carousel-viewport">
            <div class="carousel-track" id="carouselTrack">

                <div class="attraction-card">
                    <img src="img/b-1.jpeg" alt="Caves do Vinho do Porto">
                    <div class="attraction-overlay">
                        <h5>Caves do vinho do Porto</h5>
                        <p>Na outra margem do rio, frente à Ribeira, as principais marcas de vinho do Porto guardam os seus tesouros. Impõe-se uma verdadeira visita sensorial: ver,tocar,cheirar,provar e levar uma garrafa.</p>
                    </div>
                </div>

                <div class="attraction-card">
                    <img src="img/b-2.jpeg" alt="Sé do Porto">
                    <div class="attraction-overlay">
                        <h5>Sé do Porto</h5>
                        <p>Edifício de estrutura romano-gótica dos séc. XII e XIII, com transformações sofridas no périodo barroco. Destaca-se a rosácea da fachada, as abóbodas e arcos e as antigas pias batismais.</p>
                    </div>
                </div>

                <div class="attraction-card">
                    <img src="img/b-3.jpeg" alt="Casa da Música">
                    <div class="attraction-overlay">
                        <h5>Casa da Música</h5>
                        <p>A impressionante agenda de concertos, filmes e espetáculos concorre diretamente com a espetacularidade do edifício, um projeto do arquiteto holandês Rem Koolhaas.</p>
                    </div>
                </div>

                <div class="attraction-card">
                    <img src="img/b-4.jpeg" alt="Torre dos Clérigos">
                    <div class="attraction-overlay">
                        <h5>Torre dos Clérigos</h5>
                        <p>Classificado como Monumento Nacional, a Torre é um dos ex-libris da cidade. Concluída em 1763, segundo projeto do arquiteto italiano Nicolau Nasoni, engloba uma igreja e um museu.</p>
                    </div>
                </div>

                 <div class="attraction-card">
                    <img src="img/b-5.jpeg" alt="Francesinha">
                    <div class="attraction-overlay">
                        <h5>Francesinha</h5>
                        <p>É considerada uma das 10 melhores sanduiches do mundo e um petisco imperdível para quem visita o Norte do país. Leva linguiça, salsicha fesca, bife e fiambre, é coberta com queijo derretido e um molho à base de tomate, cerveja e piri-piri.</p>
                    </div>
                </div>

                 <div class="attraction-card">
                    <img src="img/b-6.jpeg" alt="Rio Douro">
                    <div class="attraction-overlay">
                        <h5>Rio Douro</h5>
                        <p>É o segundo maior rio da Península Ibérica e proporciona uma paisagem deslumbrante. Acompahe as suas curvas sinuosas numa viagem de barco ou de comboio e aproveite para visitar uma quinta vinícola pelo caminho.</p>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-arrow arrow-right" id="nextBtn" aria-label="Seguinte">
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>
</section>

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
                    <li><a href="termos&politicas.php" class="text-white text-decoration-none">Termos e Políticas</a></li>
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