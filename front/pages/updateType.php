<?php

    require_once("../../database/Connect.php");
    include_once "../../api/models/AudioVisual.php";

    $audioVisual = new AudioVisual();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $result = $audioVisual->getById($id);
?>



<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar de <?php echo $result['name'] ?></title>
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

    <div class="container mt-5">
        <h2>Gestão do Administrador</h2>

        <form action='../../api/operations/audioVisualOperation.php' method='post' enctype='multipart/form-data'>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="tab-pane fade show active" id="create">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imageUpload">Imagem</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name='image' id="imageUpload" accept="image/*">
                                <button class="btn btn-outline-secondary" type="button" id="clearImage"
                                    style="display: none;" onclick="removeImage()"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img id="imagePreview" alt="Pré-visualização da imagem"
                            style="display: none; width: 100%; max-width: 400px; height: auto;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="ratingSelect">Tipo</label>
                    <select class="form-control" id="ratingSelect" name="typeId">
                        <option value="">Selecione um tipo</option>
                        <option value="1" <?php if($result['type_id'] == 1) { echo "selected"; } ?> >Filme</option>
                        <option value="2" <?php if($result['type_id'] == 2) { echo "selected"; } ?> >Anime</option>
                        <option value="3" <?php if($result['type_id'] == 3) { echo "selected"; } ?> >Série</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" value="<?php echo $result['name'] ?>" class="form-control" id="name" placeholder="Nome da mídia" name="name">
                </div>

                <div class="form-group">
                    <label for="description">Sobre</label>
                    <textarea name="description" class="form-control" id="description" rows="3"><?php echo $result['description'] ?></textarea>
                </div>

                <div class="form-group">
                    <?php
                    $genre = json_decode($result['genre'], true);

                    $genreString = implode(', ', array_column($genre['generos'], 'genero'));
                    ?>
                    
                    <label for="tags">Tags</label>
                    <input name="genre" type="text" class="form-control" id="tags" placeholder="Tags separadas por vírgula" value="<?php echo $genreString; ?>">
                </div>

                <div class="form-group">
                    <label for="duration">Duração</label>
                    <input value="<?php echo $result['duration'] ?>" name="duration" type="number" class="form-control" id="duration"
                        placeholder="Duração em minutos">
                </div>

                <div class="form-group">
                    <label for="ratingSelect">Estrelas</label>
                    <select class="form-control" id="ratingSelect" name="rating">
                        <option value="">Selecione uma avaliação</option>

                        <?php
                        $ratings = [1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5];

                        foreach ($ratings as $rating) {
                            $selected = ($result['rating'] == $rating) ? "selected" : "";
                            echo "<option value='$rating' $selected>$rating Estrela" . (($rating != 1) ? "s" : "") . "</option>";
                        }
                        ?>

                    </select>

                </div>

                <button name="edit" type="submit" class="btn btn-primary">Atualizar</button>
        </form>


        <?php
        require_once('../components/footer.php');
        ?>

        <script>
            document.getElementById("imageUpload").addEventListener("change", function (event) {
                var file = event.target.files[0];

                if (file && file.type.startsWith('image/')) {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(file);

                    oFReader.onload = function (oFREvent) {
                        var preview = document.getElementById("imagePreview");
                        preview.src = oFREvent.target.result;
                        preview.style.display = "block";

                        document.getElementById('clearImage').style.display = 'block';
                    };
                } else {
                    alert('Por favor, selecione um arquivo de imagem válido.');
                    event.target.value = "";
                    document.getElementById('clearImage').style.display = 'none'; // Esconde o botão
                }
            });

            function removeImage() {
                var preview = document.getElementById("imagePreview");
                preview.src = "";
                preview.style.display = "none";

                var fileInput = document.getElementById("imageUpload");
                fileInput.value = "";

                var clearButton = document.getElementById('clearImage');
                clearButton.style.display = 'none';
            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>

</body>

</html>