<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de títulos</title>
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
        <h2>Cadastro de Filmes, Séries e Animes</h2>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="imageUpload">Imagem</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="imageUpload" accept="image/*">
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
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="Nome da mídia">
            </div>

            <div class="form-group">
                <label for="description">Sobre</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" class="form-control" id="tags" placeholder="Tags separadas por vírgula">
            </div>

            <div class="form-group">
                <label for="duration">Duração</label>
                <input type="text" class="form-control" id="duration" placeholder="Duração em minutos">
            </div>

            <div class="form-group">
                <label for="ratingSelect">Estrelas</label>
                <select class="form-control" id="ratingSelect" name="rating">
                    <option value="">Selecione uma avaliação</option>
                    <option value="1">1 Estrela</option>
                    <option value="2">2 Estrelas</option>
                    <option value="3">3 Estrelas</option>
                    <option value="4">4 Estrelas</option>
                    <option value="5">5 Estrelas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

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