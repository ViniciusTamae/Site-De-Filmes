<?php
    session_start();
    if (!$_SESSION['logged']) {
        header("Location: unauthorized");
        die();
    }
?>

<!doctype html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>anicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/ratings.css">
</head>

<body>

    <?php
        require_once('../components/navbar.php')
    ?>

    <!-- Em cartaz nos cinemas  -->
    <section>
        <h1 class="ml-4 fs-1 mt-3 mb-1 text-center">Em cartaz nos cinemas</h1>
        <div class="container mt-3">
            <div id="netflixCarousel1" class="carousel slide mb-5">

                <a class="carousel-control-prev d-none d-sm-block" href="#netflixCarousel1" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                </a>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex">
                            <!-- Filme 1 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 1</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 2 -->
                            <div class="film-card card">
                                <img src="front/images/ratings-images/os-mercenarios.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 2</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 3 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 3</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 4 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 4</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 5 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 5</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex">
                            <!-- Filme 6 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 6</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 7 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 7</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 8 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 8</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 9 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 9</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 10 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 10</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                        </div>
                    </div>
                    <!-- Outras listas de filmes aqui -->
                </div>
                <a class="carousel-control-next d-none d-sm-block" href="#netflixCarousel1" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Filmes  -->

    <section>
        <h1 class="ml-4 fs-1 mt-3 mb-2 text-center">Filmes</h1>
        <div class="container mt-3">
            <div id="netflixCarousel2" class="carousel slide mb-5">

                <a class="carousel-control-prev d-none d-sm-block" href="#netflixCarousel2" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                </a>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex">
                            <!-- Filme 1 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 1</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 2 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 2</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 3 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 3</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 4 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 4</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 5 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 5</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex">
                            <!-- Filme 6 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 6</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 7 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 7</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 8 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 8</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 9 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 9</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 10 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 10</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                        </div>
                    </div>
                    <!-- Outras listas de filmes aqui -->
                </div>
                <a class="carousel-control-next d-none d-sm-block" href="#netflixCarousel2" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Séries  -->

    <section>
        <h1 class="ml-4 fs-1 mt-3 mb-2 text-center">Séries</h1>
        <div class="container mt-3">
            <div id="netflixCarousel3" class="carousel slide mb-5">

                <a class="carousel-control-prev d-none d-sm-block" href="#netflixCarousel3" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                </a>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex">
                            <!-- Filme 1 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 1</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 2 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 2</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 3 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 3</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 4 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 4</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 5 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 5</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex">
                            <!-- Filme 6 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 6</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 7 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 7</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 8 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 8</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 9 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 9</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 10 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 10</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                        </div>
                    </div>
                    <!-- Outras listas de filmes aqui -->
                </div>
                <a class="carousel-control-next d-none d-sm-block" href="#netflixCarousel3" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Animes  -->

    <section>
        <h1 class="ml-4 fs-1 mt-3 mb-2 text-center">Animes</h1>
        <div class="container mt-3">
            <div id="netflixCarousel4" class="carousel slide mb-5">

                <a class="carousel-control-prev d-none d-sm-block" href="#netflixCarousel4" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                </a>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex">
                            <!-- Filme 1 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 1</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 2 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 2</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 3 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 3</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 4 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 4</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 5 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 5</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex">
                            <!-- Filme 6 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 6</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 7 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 7</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 8 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 8</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 9 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 9</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                            <!-- Filme 10 -->
                            <div class="film-card card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Filme 10</h5>
                                    <div class="film-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <button class="info-btn btn btn-primary">Saiba mais</button>
                            </div>
                        </div>
                    </div>
                    <!-- Outras listas de filmes aqui -->
                </div>
                <a class="carousel-control-next d-none d-sm-block" href="#netflixCarousel4" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <?php
        require_once('../components/footer.php')
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#netflixCarousel1').carousel({
                interval: false
            });
        });

        $(document).ready(function () {
            $('#netflixCarousel2').carousel({
                interval: false
            });
        });

        $(document).ready(function () {
            $('#netflixCarousel3').carousel({
                interval: false
            });
        });

        $(document).ready(function () {
            $('#netflixCarousel4').carousel({
                interval: false
            });
        });
    </script>


</body>

</html>