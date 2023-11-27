<?php
session_start();

require_once("../../database/Connect.php");
include_once "../../api/models/AudioVisual.php";

$audioVisual = new AudioVisual();

function formatarHora($valorFloat)
{
    $horas = floor($valorFloat);
    $minutos = ($valorFloat - $horas) * 100;

    if ($horas > 0 && $minutos > 0) {
        return "$horas" . "h " . round($minutos) . "m";
    } elseif ($horas > 0) {
        return "$horas" . "h";
    } elseif ($minutos > 0) {
        return round($minutos) . "m";
    } else {
        return "0m";
    }
}

function getMediaType($type)
{
    if (strtolower($type) === "filmes") {
        return "movie";
    } else if (strtolower($type) === "animes") {
        return "anime";
    } else if (strtolower($type) === "séries" || strtolower($type) === "series") {
        return "show";
    }
    return "";
}
?>

<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>anicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="front/styles/first-page-carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>


<body>
    <?php
    require_once('../../front/components/navbar.php');
    ?>

    <!-- Catálogo de destaques  -->
    <section class="highlights">
        <div class="row">
            <h2 class="visually-hidden">Todos os títulos</h2>
            <?php

            $types = ['anime', 'movie', 'show'];

            foreach ($types as $type) {

                $results = $audioVisual->readFilter(0, $type);

                if (empty($results)) {
                    continue;
                }

                $id = $results[0]['id'];
                $name = $results[0]['name'];
                $type = $results[0]['type'];
                $genre = json_decode($results[0]['genre'], true);
                $cover = $results[0]['cover'];
                $duration = formatarHora($results[0]['duration']);
                $description = $results[0]['description'];

                echo "
                        <article class='col-md-4 highlight-card'>
                            <div class='card h-100'>
                                <img src='$cover' class='card-img-top' alt='$name'>
                                <div class='card-body'>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='d-flex align-items-center'>
                                            <i class='far fa-clock me-auto'></i>
                                            <span>$duration</span>
                                        </div>
                                        <div class='d-flex flex-wrap'>";
                if (isset($genre['generos']) && !empty($genre['generos'])) {
                    foreach ($genre['generos'] as $genero) {
                        echo '<span class="badge bg-primary me-1">' . $genero['genero'] . '</span>';
                    }
                }
                echo "</div>
                                    </div>
                                    <h3 class='card-title'>$name</h3>
                                    <p class='card-text'>$description</p>
                                    <a href='/front/pages/audioVisual?id=$id' class='btn btn-primary'>Saiba mais</a>
                                </div>
                            </div>
                        </article>
                        ";
            }
            ?>

        </div>
    </section>

    <div class="container container-margin">
        <div class="row justify-content-center">
            <h1 class="ml-4 fs-1 mt-5 mb-5 text-center">Todos os títulos</h1>
            <?php

            $types = ['Filmes', 'Séries', 'Animes'];

            foreach ($types as $type) {

                $results = $audioVisual->readFilter(8, getMediaType($type));

                if (empty($results)) {
                    continue;
                }

                // echo "<h1 class='ml-4 fs-2 mt-5 mb-2'>$type</h1>";
            
                foreach ($results as $index => $key) {

                    $id = $key['id'];
                    $name = $key['name'];
                    $type = $key['type'];
                    $genre = json_decode($key['genre'], true);
                    $cover = $key['cover'];
                    $rating = $key['rating'];
                    $duration = formatarHora($key['duration']);
                    $description = $key['description'];

                    $fullStars = floor($rating);
                    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                    $emptyStars = 5 - $fullStars - $halfStar;

                    echo "
                        <article class='col-lg-3 col-md-4 col-sm-6 card-horizontal mb-4'>
                            <div class='d-flex justify-content-between align-items-center mb-1'>
                                <div class='film-title fw-bold' title='$name'>
                                    $name
                                </div>
                                <div class='film-rating'>
                        ";

                    for ($i = 0; $i < $fullStars; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }

                    if ($halfStar) {
                        echo '<i class="fas fa-star-half-alt"></i>';
                    }

                    for ($i = 0; $i < $emptyStars; $i++) {
                        echo '<i class="far fa-star"></i>';
                    }

                    echo "
                                </div>
                            </div>
                            <a href='#' class='d-block h-100 position-relative'>
                                <div class='image-wrapper position-relative'>
                                    <img src='$cover' alt='$name' class='w-100'>
                                    <div class='position-absolute top-0 w-100 d-flex justify-content-between align-items-center p-1'>
                                        <span class='badge bg-light-subtle'>
                                            <i class='far fa-clock me-1'></i>
                                            <span>$duration</span>
                                        </span>
                                        <div class='d-flex'>
                        ";

                    if (isset($genre['generos']) && !empty($genre['generos'])) {
                        foreach ($genre['generos'] as $genero) {
                            echo '<span class="badge bg-primary me-1">' . $genero['genero'] . '</span>';
                        }
                    }

                    echo "
                                        </div>
                                    </div>
                                    
                                    <form action='/api/operations/audioVisualOperation' method='POST'>
                                    <input type='hidden' name='id' value='$id'/>
                                        <div class='position-absolute top-0 w-100 h-100 overlay d-flex justify-content-center align-items-center'>
                                            <button type='submit' name='redirect' class='btn btn-primary mx-1'>
                                            Editar
                                            </button>
                                            <button type='button' class='btn btn-danger mx-1' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal' onclick='setItemId($id)'>
                                            Apagar
                                        </button>
                                        </div>
                                    </form>
                                </div>
                            </a>
                        </article>
                        ";
                }
            }
            ?>
        </div>
    </div>

    <?php
    require_once('../../front/components/footer.php');
    ?>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Classe adicionada aqui -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Ação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja apagar este item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="deleteButton">Apagar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    function setItemId(id) {
        // Armazena o ID do item no modal para ser usado quando o modal for confirmado
        document.getElementById('confirmDeleteModal').setAttribute('data-item-id', id);
    }
</script>


<script>

    document.getElementById('deleteButton').addEventListener('click', function () {
        const itemId = document.getElementById('confirmDeleteModal').getAttribute('data-item-id');

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/api/operations/audioVisualOperation';

        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'id';
        hiddenField.value = itemId;
        form.appendChild(hiddenField);

        const actionField = document.createElement('input');
        actionField.type = 'hidden';
        actionField.name = 'action';
        actionField.value = 'delete';
        form.appendChild(actionField);

        document.body.appendChild(form);
        form.submit();
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>