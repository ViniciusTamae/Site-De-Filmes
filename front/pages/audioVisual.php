<?php
session_start();

require_once("../../database/Connect.php");
include_once "../../api/models/AudioVisual.php";
include_once "../../api/models/Comment.php";

$audioVisual = new AudioVisual();
$comment = new Comment();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = $audioVisual->getById($id);

$comments = $comment->getByAudioVisualId($id);
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartaz Bootstrap com Comentários</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <?php
    require_once('../components/navbar.php');
    ?>

    <div class="container border">
        <div class="row">
            <div class="col-md-6">
                <!-- Imagem do cartaz -->
                <img src="<?php echo '/assets/imgs/covers/' . $result['cover']; ?>" alt="Cartaz" class="img-fluid">
            </div>
            <div class="col-md-6">
                <!-- Título -->
                <h1>
                    <?php echo $result['name']; ?>
                </h1>
                <!-- Descrição -->
                <p class="lh-base">
                    <?php echo $result['description']; ?>
                </p>

            </div>

            <!-- Formulario -->

            <?php
            if ($_SESSION['logged']) {
                echo '
                    <div class="container mt-5">
                        <h1>Deixe seu comentário:</h1>
                        <form action="/api/operations/commentOperation" method="post">
                            
                            <input type="hidden" name="audio_visual_id" value="' . $id . '">
                            <input type="hidden" name="user_id" value="' . $_SESSION['user_id'] . '">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Título:</label>
                                <input type="text" class="form-control" id="nome" placeholder="Seu Título" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentário:</label>
                                <textarea class="form-control" id="comentario" rows="4"
                                    placeholder="Escreva seu comentário aqui" name="comment"
                                ></textarea>
                            </div>

                            <label for="valor">Defina uma nota:</label>
                            <select class="form-control" id="valor" name="rating">';

                $incremento = 0.5;
                for ($i = 0; $i <= 5; $i += $incremento) {
                    echo "<option value='$i'>$i</option>";
                }

                echo '
                            </select>
                            <button type="submit" name="createComment" class="btn btn-primary mt-3">Enviar</button>
                        </form>
                    </div>';

            }
            ?>

        </div>

        <div class="container mt-5">
            <h1>Comentários</h1>
            <?php
            foreach ($comments as $data) {

                $name = $data['name'];
                $title = $data['title'];
                $comment = $data['comment'];
                $img = $data['image'];
                $rating = $data['rating'];
                $userId = $data['user_id'];

                $fullStars = floor($rating);
                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                $emptyStars = 5 - $fullStars - $halfStar;

                echo "
                        <div class='card mb-3'>
                            <div class='card-body'>
                                <div class='hearder d-flex justify-content-between'>
                                    <div class='namePicture' style='display: flex; align-items: center;'>
                                        <img src='$img' alt='' class='mr-2' style='width:40px; height:40px; border-radius:18px;'>
                                        <h5>
                                            <a href='profile?id=$userId'>$name</a>
                                        </h5>
                                    </div>
                                    <div class='starts'>
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
                                </div>
                                <div class='body'>
                                    <h5 class='mt-3'>
                                        $title
                                    </h5>
                                    <p class='card-text'>$comment</p>
                                </div>
                            </div>
                        </div>
                    ";
            }

            require_once('../components/footer.php');
            ?>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>
</body>

</html>