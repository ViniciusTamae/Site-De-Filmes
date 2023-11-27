<?php
session_start();

$word = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);

require_once('../../api/models/AudioVisual.php');

$audioVisual = new AudioVisual();

$results = $audioVisual->selectLike($word);

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
    <link rel="stylesheet" href="../styles/first-page-carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <?php
    require_once('../components/navbar.php');
    ?>

    <div class="contaienr">

        <h2 class="mt-4 mb-4 text-center">Resultados de pesquisa para:
            <?php echo $word ?>
        </h2>

        <div class="row">
            <?php
            foreach ($results as $result) {

                $id = $result['id'];
                $name = $result['name'];
                $genre = json_decode($result['genre'], true);
                $cover = $result['cover'];
                $duration = formatarHora($result['duration']);

                $fullStars = floor($result['rating']);
                $halfStar = ($result['rating'] - $fullStars) >= 0.5 ? 1 : 0;
                $emptyStars = 5 - $fullStars - $halfStar;

                echo "
                        <article class='col-lg-3 col-md-4 col-sm-6 card-horizontal mb-4'>
                            <div class='d-flex justify-content-between align-items-center mb-1'>
                                <div class='film-title fw-bold' title='asd'>
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
                                    <img src='/$cover' alt='123' class='w-100'>
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
                                            <button type='submit' name='redirect' class='btn btn-primary'>
                                                Saiba Mais
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </a>
                        </article>
                        ";
            }

            ?>
        </div>
    </div>

    <?php
    require_once('../components/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>

</body>