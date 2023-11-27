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
    <style>
        .film-rating .fa-star {
            color: orange;
            cursor: pointer;
        }

        .film-rating .fa-star.checked {
            color: orange;
        }

        .film-rating .fa-star:not(.checked) {
            color: white;
        }
    </style>
</head>

<body>

    <?php
    require_once('../components/navbar.php');
    ?>

    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Mídia</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
        <style>
            .film-rating .fa-star {
                color: transparent;
                /* Inicia transparente */
                cursor: pointer;
                -webkit-text-stroke: 1px grey;
                /* Borda cinza */
            }

            .film-rating .fa-star.checked {
                color: white;
                /* Fica branca quando clicada */
                -webkit-text-stroke: 0;
                /* Remove a borda quando clicada */
            }
        </style>
    </head>

    <body>
        <div class="form-group">
            <label>Avaliação</label>
            <div class="film-rating">
                <i class="fas fa-star" onclick="setRating(this, 1)"></i>
                <i class="fas fa-star" onclick="setRating(this, 2)"></i>
                <i class="fas fa-star" onclick="setRating(this, 3)"></i>
                <i class="fas fa-star" onclick="setRating(this, 4)"></i>
                <i class="fas fa-star" onclick="setRating(this, 5)"></i>
            </div>
            <input type="hidden" id="rating" name="rating" value="0">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        </div>




        <?php
        require_once('../components/footer.php');
        ?>

        <script>
            function setRating(star, rating) {
                var stars = document.querySelectorAll('.film-rating .fa-star');
                document.getElementById('rating').value = rating;
                stars.forEach(function (star, index) {
                    if (index < rating) {
                        star.classList.add('checked');
                    } else {
                        star.classList.remove('checked');
                    }
                });
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