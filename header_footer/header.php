<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style5.css">
    <!--css de bootsrap 5-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!--css de bootsrap 5 para producto_modificado-->
    <link rel="stylesheet" href="../css/style5.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css">
    <!--js de bootsrap 5-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="alertifyjs/css/alertify.min.css">

    <!--link del carrusel de productos-->
    <link rel="stylesheet" href="css_carrusel/style.css" media="screen">
    <link rel="stylesheet" href="css_carrusel/grid.css" media="screen">
    <link href="css_carrusel/owl.carousel.css" rel="stylesheet">
    <link href="css_carrusel/owl.theme.css" rel="stylesheet">
    <script src="js/jquery-1.7.1.min.js"></script>  
    
    

    
</head>

<body class="p-0 m-0">
    <header class="row m-0 px-0 fixed-top ">
        <div class="col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2 d-flex justify-content-center justify-content-sm-start justify-content-md-start justify-content-lg-start align-items-center container_logo">
            <p class="mb-0 mt-3 mt-sm-0 mt-md-0 mt-lg-0 mt-lg-0 fs-3 fw-bold  "><a class="text-decoration-none text-dark" href="index.php">pet´s shop</a></p>

        </div>
        
        <form class="col-12 col-sm-9 col-md-4 col-lg-5 col-xl-5 d-flex justify-content-center align-items-center " action="../cjpets_v2/productos_alimentos.php" method="post">

            <input class="input-group input-group-text" type="search" name="ValueToSearch" id="ValueToSearch">
            <button class="btn-dark btn text-white btn-outline-success container_button_search my-3 fw-bold" name="btn_search" id="btn_search" value="btn_search" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg></button>

        </form>
        
        <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 d-flex justify-content-center justify-content-sm-end justify-content-md-end justify-content-lg-end align-items-center  container_nav ">
        <?php
            if (isset($_SESSION['nomuser']) && ($_SESSION['status'] == 'Master_admin')) {
            ?>
            <p class="mb-0 mx-2 fw-bold"><a class="nav_anclas" href="crud_principal.php">CRUD</a></p>
        <?php
        }
        ?>
            <p class="mb-0 mx-2 fw-bold"><a class="nav_anclas" href="index.php">Inicio</a></p>
            <p class="mb-0 mx-2 fw-bold"><a class="nav_anclas" href="index.php #container_nosotros">Nosotros</a></p>
            <p class="mb-0 mx-2 fw-bold"><a class="nav_anclas" href="index.php #container_contacto">Contacto</a></p>
        <?php
            if (!isset($_SESSION['nomuser'])) {
            ?>
            <p class="mb-0 mx-2 fw-bold"><a class="nav_anclas" href="iniciar_sesion.php">Iniciar Sesion</a></p>
        <?php
            } else {
            ?>
            <p class="mb-0 mx-3 fw-bold"><a class="nav_anclas" href="logout.php">Cerrar Sesion</a></p>
        <?php
            }
            ?>
            <!--
                <p class="mb-0 mx-2 ">
                <a href="logout.php">
                    <svg class=" container_button_carrito" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                </svg>
            </a>
            </p>
            -->
        </div>
    </header>