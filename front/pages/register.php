<!doctype html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles-register-page.css">
</head>

<body>

    <?php
        require_once('../components/navbar.php')
    ?>

    <div class="container mt-4">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 text-white fw-bold mb-5 mx-1 mx-md-4 mt-4">Registre-se</p>

                                <form class="mx-1 mx-md-4" action="/api/operations/userOperation.php" method="post">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="me-3 mt-4">
                                            <i class="fas fa-user fa-lg fa-fw" style="line-height: 1.5;"></i>
                                        </div>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label text-white" for="userName">Seu nome de usuário</label>
                                            <input type="text" id="userName" name="userName" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="align-icon" style="margin-top: 2.1em;">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        </div>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label text-white" for="emailInput">Seu e-mail</label>
                                            <input type="email" id="emailInput" class="form-control" name="email" required/>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="icon-container" style="margin-top: 2.1em;">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        </div>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label text-white" for="passwordInput">Sua senha</label>
                                            <input type="password" id="passwordInput" class="form-control" name="password" required/>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="form-check" style="margin-left: 2.7em !important;">
                                            <input class="form-check-input" type="checkbox" id="showPassword"
                                                onclick="togglePasswordVisibility()">
                                            <label class="form-check-label text-white" for="showPassword">
                                                Exibir senha
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="icon-container" style="margin-top: 2.1em;">
                                            <i class="fas fa-paperclip fa-lg me-3 fa-fw"></i>
                                        </div>
                                        <div class="form-outline flex-fill mb-0">
                                            <textarea class="form-control" id="comentario" rows="4"
                                                placeholder="Escreva sua biografia aqui" name="bio" required
                                            ></textarea>
                                        </div>
                                    </div>

                                    <div class="d-flex ml-2 mx-4 mb-3 mb-lg-4" style="margin-left: 2.5em !important;">
                                        <button 
                                            class="btn btn-outline-primary btn-lg"
                                            id="registerBtn"
                                            name="register"
                                            type="submit"
                                        >
                                            Registrar
                                        </button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                    class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    <div class="custom-alert">
        <div 
             class="alert alert-dismissible fade" 
             id="alertMsg" 
             role="alert"
             style="width: 22em !important;"
            >
                <span id="alertText"></span>
        </div>
    </div>

    <?php
        require_once('../components/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

<script>
    function togglePasswordVisibility() {
        const passwordFields = [document.getElementById('passwordInput'), document.getElementById('confirmPasswordInput')];
        passwordFields.forEach(field => {
            field.type = field.type === 'password' ? 'text' : 'password';
        });
    }
    function notify(msg, color) {
        $('#alertText').text(msg);
        $('#alertMsg').removeClass('alert-success alert-danger alert-warning').addClass(`alert-${color}`);
        $('#alertMsg').addClass('show');

        setTimeout(function() {
            $('#alertMsg').removeClass('show');
        }, 3000);
    }

</script>

<style>
    .custom-alert {
        display: flex;
        justify-content: flex-end;
        margin-right: 8.3em;
    }
</style>

</html>