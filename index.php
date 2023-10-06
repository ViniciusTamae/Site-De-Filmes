<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="front/styles/first-page-carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>


<body>
    <?php
        require_once ('front/components/navbar.php');
    ?>

    <!-- Catálogo de destaques  -->
    <section class="highlights">
        <h2 class="visually-hidden">Destaques</h2>
        <div class="row">
            <!-- Primeiro -->
            <article class="col-md-4 highlight-card">
                <div class="card h-100">
                    <img src="front/images/first-page-images/first-item-image.jpg" class="card-img-top" alt="One Piece">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="far fa-clock me-auto"></i>
                                <span>24m</span>
                            </div>
                            <div class="d-flex flex-wrap">
                                <span class="badge bg-primary me-1">Ação</span>
                                <span class="badge bg-primary me-1">Aventura</span>
                            </div>
                        </div>
                        <h3 class="card-title">One Piece</h3>
                        <p class="card-text">"One Piece" é um anime/mangá japonês criado por Eiichiro Oda. A
                            história
                            segue Monkey D. Luffy e sua tripulação de piratas enquanto eles exploram o Grand Line em
                            busca do tesouro lendário conhecido como One Piece. Repleto de ação, aventura, comédia e
                            drama, a obra aborda temas de amizade e determinação.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </article>
            <!-- Segundo -->
            <article class="col-md-4 highlight-card">
                <div class="card h-100">
                    <img src="front/images/first-page-images/second-item-image.jpg" class="card-img-top" alt="Oppenheimer">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="far fa-clock me-auto"></i>
                                <span>3h</span>
                            </div>
                            <div class="d-flex flex-wrap">
                                <span class="badge bg-primary me-1">História</span>
                                <span class="badge bg-primary me-1">Drama</span>
                            </div>
                        </div>
                        <h3 class="card-title">Oppenheimer</h3>
                        <p class="card-text">"Oppenheimer" é um filme histórico dirigido por Christopher Nolan,
                            baseado
                            no livro "Prometeu Americano" e estrelado por Cillian Murphy. Conta a vida de J. Robert
                            Oppenheimer e seu papel no Projeto Manhattan, que desenvolveu as primeiras bombas
                            atômicas.
                            A obra aborda dilemas éticos e científicos em meio à corrida pela criação da arma
                            devastadora.
                        </p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>

                </div>
            </article>
            <!-- Terceiro -->
            <article class="col-md-4 highlight-card">
                <div class="card h-100">
                    <img src="front/images/first-page-images/third-item-image.jpg" class="card-img-top" alt="Breaking Bad">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="far fa-clock me-auto"></i>
                                <span>45m</span>
                            </div>
                            <div class="d-flex flex-wrap">
                                <span class="badge bg-primary me-1">Drama</span>
                                <span class="badge bg-primary me-1">Suspense</span>
                            </div>
                        </div>
                        <h3 class="card-title">Breaking Bad</h3>
                        <p class="card-text">"Breaking Bad" é uma série de televisão criada por Vince Gilligan. A
                            trama
                            acompanha a jornada de Walter White, um professor de química que se torna um fabricante
                            de
                            metanfetamina após ser diagnosticado com câncer. A série explora sua transformação no
                            mundo
                            do crime, abordando questões morais e as consequências de suas escolhas.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>

                </div>
            </article>
        </div>
    </section>

    <div class="container container-margin">
        <h1 class="ml-4 fs-1 mt-5 text-center">Últimos lançamentos</h1>
        <h1 class="ml-4 fs-2 mt-3 mb-2">Filmes</h1>

        <div class="row justify-content-center">
            <!-- Barbie -->
            <article class="col-lg-3 col-md-4 col-sm-6 card-horizontal mb-4">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <div class="film-title fw-bold" title="Barbie">
                        Barbie
                    </div>
                    <div class="film-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <a href="#" class="d-block h-100 position-relative">
                    <div class="image-wrapper position-relative">
                        <img src="front/images/last-movies/barbie.jpg" alt="Barbie" class="w-100">
                        <div
                            claess="position-absolute top-0 w-100 d-flex justify-content-between align-items-center p-1">
                            <span class="badge bg-light-subtle">
                                <i class="far fa-clock me-1"></i>
                                <span>1h 54m</span>
                            </span>
                            <span class="badge bg-primary me-1">Comédia</span>
                        </div>
                        <div
                            class="position-absolute top-0 w-100 h-100 overlay d-flex justify-content-center align-items-center">
                            <button class="btn btn-primary">Saiba mais</button>
                        </div>
                    </div>
                </a>
            </article>

            <!-- Homem Aranha atráves do Aranhaverso -->
            <!-- <article class="col-lg-3 col-md-4 col-sm-6 card-horizontal mb-4">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <div class="film-title fw-bold" title="Homem Aranha através do Aranhaverso">
                        Homem Aranha através do Aranhaverso
                    </div>
                    <div class="film-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <a href="#" class="d-block h-100 position-relative">
                    <div class="image-wrapper position-relative">
                        <img src="front/images/last-movies/spiderverse.jpg" alt="Homem Aranha através do Aranhaverso"
                            class="w-100">
                        <div
                            class="position-absolute top-0 w-100 d-flex justify-content-between align-items-center p-1">
                            <span class="badge bg-light-subtle">
                                <i class="far fa-clock me-1"></i>
                                <span>2h 20m</span>
                            </span>
                            <div class="d-flex">
                                <span class="badge bg-primary me-1">Ação</span>
                                <span class="badge bg-primary me-1">Comédia</span>
                            </div>
                        </div>
                        <div
                            class="position-absolute top-0 w-100 h-100 overlay d-flex justify-content-center align-items-center">
                            <button class="btn btn-primary">Saiba mais</button>
                        </div>
                    </div>
                </a>
            </article> -->

        </div>
    </div>

</body>

</html>