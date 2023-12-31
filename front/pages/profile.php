<?php

session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

require_once('../../api/models/User.php');
require_once('../../api/models/Comment.php');

$user = new User();
$user = $user->getById($id);

$comment = new Comment();
$favorites = $comment->getAudioVisualCommentByUserId($id);

$comment = $comment->getUserLastComment($id);

if (is_null($user)) {
    header('Location: ./notFound');
}

$isCurrentUser = $_SESSION['user_id'] === $id ? true : false;

?>
<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário</title>
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

    <div class="container mt-5">
        <div class="row">

            <!-- Informações do perfil -->
            <div class="col-md-4">
                <div class="text-center">
                    <img src="<?php echo $user['image'] ?>" alt="Foto de perfil" class="img-thumbnail mb-2"
                        style="width: 350px; height: 350px;">
                    <h2>
                        <?php echo $user['name'] ?>
                    </h2>

                    <?php
                    if ($isCurrentUser) {
                        echo "
                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                Alterar foto de perfil
                                </button>
            
                                <form action='../../api/operations/userOperation.php' method='post' enctype='multipart/form-data' class='mb-3'>
                                    <input type='hidden' name='user_id' value='$id'>

                                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Alterar Imagem</h1>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    
                                                    <label class='form-label' for='fileCustom'>Foto de Perfil</label>
                                                    <input type='file' class='form-control' id='fileCustom' name='image' accept='image/*'/>
                                                    <div id='show-image'>
            
                                                    </div>
            
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                                                    <button type='submit' class='btn btn-primary' name='editImage'>Alterar imagem</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            ";
                    }
                    ?>


                </div>
                <h3>Bio</h3>

                <p id="bio-show">
                    <?php echo $user['bio'] ?>
                </p>

                <form action='../../api/operations/userOperation.php' method='post'>
                    <input type="hidden" name="user_id" value='<?php echo $user['id'] ?>'>

                    <textarea class="form-control" id="bio-textarea" rows="4" placeholder="Escreva seu comentário aqui"
                        name="bio" style="display:none;" required><?php echo $user['bio'] ?></textarea>

                    <button type="submit" id="save-button" style="display: none;" name="editBio"
                        class="btn btn-primary mt-2">Salvar</button>
                </form>

                <?php
                if ($isCurrentUser) {
                    echo '<button id="edit-button" class="btn btn-primary" onclick="editBio()">Editar Biografia</button>';
                }
                ?>


            </div>

            <!-- Comentários e favoritos -->
            <div class="col-md-8">
                <h2>Comentário mais recente</h2>
                <div class="card mb-3">
                    <div class="card-body">
                        <img src="<?php echo $user['image'] ?>" style="width: 45px; height:45px;" alt="Foto de perfil"
                            class="rounded-circle">


                        <span class="m-1">
                            <?php echo $user['name'] ?>
                        </span>
                        <span class="float-end">
                            <?php

                            $fullStars = floor($comment['rating']);
                            $halfStar = ($comment['rating'] - $fullStars) >= 0.5 ? 1 : 0;
                            $emptyStars = 5 - $fullStars - $halfStar;

                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }

                            if ($halfStar) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            }

                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<i class="far fa-star"></i>';
                            }
                            ?>
                        </span>
                        <p class="mt-2">
                            <?php echo $comment['comment'] ?>
                        </p>
                    </div>
                </div>

                <h2>Favoritos</h2>
                <div class="row text-center">

                    <?php
                    foreach ($favorites as $favorite) {
                        $name = $favorite['name'];
                        $cover = $favorite['cover'];

                        $fullStars = floor($favorite['rating']);
                        $halfStar = ($favorite['rating'] - $fullStars) >= 0.5 ? 1 : 0;
                        $emptyStars = 5 - $fullStars - $halfStar;

                        echo "
                                <div class='col-md-4'>
                                <img src='/assets/imgs/covers/$cover' alt='Filme 1' class='img-thumbnail mx-auto d-block' style='height: 400px; width: 400px; object-fit: cover;'>
                                    <div class='d-flex justify-content-between'>
                                        <p class='mb-0'>$name</p>
                                        <span class='float-end'>";
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
                                        </span>
                                    </div>
                                </div>";
                    }
                    ?>

                </div>
            </div>
        </div>

        <?php
        require_once('../components/footer.php');
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
            </script>

        <script>
            function editBio() {
                // Oculta o parágrafo e o botão "Editar Biografia"
                document.getElementById("bio-show").style.display = "none";
                document.getElementById("edit-button").style.display = "none";

                // Exibe o campo de texto (textarea) e o botão "Salvar"
                document.getElementById("bio-textarea").style.display = "block";
                document.getElementById("save-button").style.display = "block";
            }

            function unEdit() {
                // Exibe o parágrafo e o botão "Editar Biografia"
                document.getElementById("bio-show").style.display = "block";
                document.getElementById("edit-button").style.display = "block";

                // Oculta o campo de texto (textarea) e o botão "Salvar"
                document.getElementById("bio-textarea").style.display = "none";
                document.getElementById("save-button").style.display = "none";
            }
        </script>

</body>

</html>