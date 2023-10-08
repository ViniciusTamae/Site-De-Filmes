<?php

session_start();
if (!$_SESSION['logged']) {
    header("Location: unauthorized");
    die();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

require_once('../../api/models/User.php');

$user = new User();
$user = $user->getById($id);

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
    <link rel="stylesheet" href="styles/first-page-carousel.css">
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
                    <h2><?php echo $user['name'] ?></h2>

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
                <h3>Redes Sociais</h3>
                <p><i class="fab fa-facebook"></i> Facebook</p>
                <p><i class="fab fa-instagram"></i> Instagram</p>
                <p><i class="fab fa-twitter"></i> Twitter</p>
                <h3>Bio</h3>
                <p><?php echo $user['bio'] ?></p>
            </div>

            <!-- Comentários e favoritos -->
            <div class="col-md-8">
                <h2>Comentário mais recente</h2>
                <div class="card mb-3">
                    <div class="card-body">
                        <img src="<?php echo $user['image'] ?>" style="width: 45px; height:45px;" alt="Foto de perfil" class="rounded-circle">

                        
                        <span class="m-1"><?php echo $user['name'] ?></span>
                        <span class="float-end">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                        <p class="mt-2">Adorei o filme Inception. Uma verdadeira obra-prima!</p>
                    </div>
                </div>

                <h2>Favoritos</h2>
                <div class="row text-center">
                    <!-- 1. Favorito  -->
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/400x400" alt="Filme 1"
                            class="img-thumbnail mx-auto d-block" style="height: 400px; width: 400px;">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">One Piece</p>
                            <span class="float-end">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                    </div>

                    <!-- 2. Favorito  -->

                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/400x400" alt="Filme 1"
                            class="img-thumbnail mx-auto d-block" style="height: 400px; width: 400px;">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">Breaking Bad</p>
                            <span class="float-end">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                    </div>

                    <!-- 3. Favorito  -->

                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/400x400" alt="Filme 1"
                            class="img-thumbnail mx-auto d-block" style="height: 400px; width: 400px;">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">Boku no Piku</p>
                            <span class="float-end">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
            require_once('../components/footer.php');
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous">
        </script>

</body>

</html>