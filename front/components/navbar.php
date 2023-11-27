<?php
if ($_SESSION['logged']) {

    $userId = $_SESSION['user_id'];
    $admin = $_SESSION['admin'];

    $_SESSION['btn'] = "
        <a href='/front/pages/profile?id=$userId' style='color:white;'> <i class='fas fa-user fa-lg fa-fw' style='line-height: 1.5;'></i></a>

        <a><button class='nav-item btn btn-link' type='submit' name='logout'
        style='margin-left:-14px text-; color: white; text-decoration: none;'>Exit
        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='19' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>
        <path fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/>
        <path fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/>
        </svg> </button></a>";

} else {
    $_SESSION['btn'] = "<a href='/front/pages/login' class='nav-item'>
        <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-right' viewBox='0 0 16 16'>
            <path fill-rule='evenodd' d='M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z'/>
            <path fill-rule='evenodd' d='M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
        </svg> Login</a>";

}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="/">anicine</a>
            <ul class="navbar-nav d-none d-lg-flex align-items-center">
                <li class="nav-item">
                    <span class="mx-2">•</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <span class="mx-2">•</span>
                </li>

                <?php 
                    if ($admin == 1) {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='/front/pages/editTypes'>Listagem</a>
                        </li>
                        ";
                    }
                ?>

                <li class="nav-item">
                    <span class="mx-2">•</span>
                </li>

                <?php 
                    if ($admin == 1) {
                        echo '
                            <li class="nav-item">
                                <a class="nav-link" href="/front/pages/createTypes">Criar</a>
                            </li>
                        ';
                    }
                ?>

            </ul>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
            <!-- Desktop Version -->
            <div class="d-none d-lg-flex align-items-center justify-content-between flex-grow-1">
                <form class="d-flex mx-auto" role="search" style="width: 50%;"
                    action="/api/operations/audioVisualOperation" method='post'>
                    <input class="form-control me-2" type="search" placeholder="Faça sua busca aqui..."
                        aria-label="Search" style="width: 100%;" name="search">
                    <button class="btn btn-outline-success" name="searchLike" type="submit">Buscar</button>
                </form>
            </div>

            <div class="d-none d-lg-flex align-items-center">
                <form action="/api/operations/userOperation.php" method="post">
                    <?php
                    if (isset($_SESSION['btn'])) {
                        echo $_SESSION['btn'];
                    }
                    ?>
                </form>
            </div>

            <!-- Mobile Version -->
            <div class="d-lg-none">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="mx-2 align-middle">•</span>
                        <a class="nav-link d-inline" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <span class="mx-2 align-middle">•</span>
                        <a class="nav-link d-inline" href="/front/pages/editTypes">Listagem</a>
                    </li>
                    <li class="nav-item">
                        <span class="mx-2 align-middle">•</span>
                        <a class="nav-link d-inline" href="/front/pages/createTypes">Criar</a>
                    </li>
                    <li class="nav-item mt-2">
                        <form class="d-flex" role="search" action="/api/operations/audioVisualOperation" method='post'>
                            <input class="form-control me-2" type="search" placeholder="Faça sua busca aqui..."
                                aria-label="Search" name="search">
                            <button class="btn btn-outline-success" name="searchLike" type="submit">Buscar</button>
                        </form>
                    </li>
                    <li class="nav-item d-flex justify-content-center mt-2">
                        <?php
                        if (isset($_SESSION['btn'])) {
                            echo $_SESSION['btn'];
                            unset($_SESSION['btn']);
                        }
                        ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>