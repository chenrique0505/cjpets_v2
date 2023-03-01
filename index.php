<?php
include("dbconnect.php");
session_start();
//if (!isset($_SESSION['nomuser'])) {
//    header('location: iniciar_sesion.php');
//}


$query = "SELECT * FROM producto";
$result = mysqli_query($link, $query);
$i = 0;


$noticia = "SELECT * FROM producto ORDER BY codprod DESC";
//echo $noticia;
$noticias = $mysqli->query($noticia);
$limite = 100;
function recortar_texto($texto, $limite)
{
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if ($tamano <= $limite) {
        return $texto;
    } else {
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= '...';
    }
    return $resultado;
}
$not = $noticias->fetch_assoc();

include ('header_footer/header.php');
?>

<section class="m-0 p-0 ">
    <div class="row m-0 p-0">
        <div class="col-12 container_inicio px-0 mx-0 ">
            <!--Seccion del banner carrusel-->
            <div class="row mx-0 px-0 ">
                <div id="carouselExampleIndicators" class="carousel slide col-12  px-0 container_carrousel "
                    data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img height="" width="" src="img/banner/img_banner_7.png"
                                class="d-block w-100 container_img_carrusel" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img height="" width="" src="img/banner/img_banner_5.png"
                                class="d-block w-100 container_img_carrusel" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img height="" width="" src="img/banner/img_banner_12.png"
                                class="d-block w-100 container_img_carrusel" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!--Secion de categorias-->
            <div class="row mx-0 mt-5 px-0 d-flex">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6  px-5 pb-4 ">
                    <div class="card bg-white fs-3 fw-bold text-center container_categorias">
                        <div class="card-body ">
                            <a href="productos_alimentos.php">
                                <img class="container_img_categorias" width="100%" src="img/categoria/img_cat_1.png" alt="">
                                <p>Alimentos</p>    
                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 px-5 pb-5">
                    <div class="card bg-white fs-3 fw-bold text-center container_categorias">
                        <div class="card-body ">
                            <img class="container_img_categorias" width="100%" height="" src="img/categoria/img_cat_4.jpg"
                                alt="">
                        </div>
                        <p>Juguetes</p>
                    </div>
                </div>

            </div>
            <!--Seccion de carrusel de productos-->
            <div class="row px-0 mx-0 mb-5  px-3 px-sm-5 px-md-5 px-lg-5 px-xl-5 ">
                <div id="myCarousel1" class="container_carrusel_producto carousel slide col-12 px-5 border"
                    data-bs-ride="carousel">
                    <div class="row p-0 m-0">
                        <div class="col-12 m-0 p-0">
                            <a class="ps-2 fw-bold fs-3 d-flex align-item-center my-3 nav_anclas" href="productos_alimentos.php?id=<?php echo $not['codprod'] ?>">Productos
                            </a>
                        </div>

                        <div class="col-12 noticias slider shadow-lg m-0 p-0">
                            <div id="owl-demo" class=" row m-0 p-0">
                                <?php
                            while ($not = $noticias->fetch_assoc()) {
                                $codprod = $not['codprod'];
                                $nomprod = $not['nomprod'];
                                $precio_prod = $not['preunitprod'];
                                $stock = $not['unistockprod'];
                                $unid_prod = $not['unipedprod'];
                                $codcat  = $not['codcat'];
                                $codprove  = $not['codprove'];
                                $imagen_prod = $not['imgprod'];
                            ?>

                                <div class="col-12 m-0 pe-4">
                                    <form action="" method="post" class="item row border shadow-lg p-0 m-0 bg-white ">
                                        <div class="col-12 text-center m-0 p-0 border shadow-lg ">
                                            <a href="productos_alimentos.php?id=<?php echo $not['codprod'] ?>">
                                                <img class="" height="250px"
                                                    src="img/alimentos/<?php echo $not['imgprod']; ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="col-12 text-center m-0 p-0   mt-3">
                                            <?php echo recortar_texto($nomprod, 25); ?><br>
                                            <a class="  " href="productos_alimentos.php?id=<?php echo $not['codprod']; ?>">Ver más
                                                >>
                                            </a>
                                        </div>

                                        <div class="col-12 m-0 p-0  text-center">
                                            <div class="fw-bold fs-4">
                                                <?php echo $not['preunitprod'] . "$"; ?>
                                            </div>
                                        </div>

                                        <div class="col-12 m-0 p-0  text-center">
                                            <button name="btn_comprar" id="btn_comprar" value="btn_comprar"
                                                class=" btn btn-outline-dark fw-bold  border bg-success w-75 mb-3">Comprar</button>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                            ?>
                            </div>

                            <script src="js/owl.carousel.js"></script>
                            <!-- Control de Responsive Design !-->
                            <script>
                            $(document).ready(function() {
                                $("#owl-demo").owlCarousel({
                                    autoPlay: 3000,
                                    items: 4,
                                    itemsDesktop: [1199, 3],
                                    itemsDesktopSmall: [979, 2],
                                    itemsTablet: [768, 2],
                                    itemsTabletSmall: [568, 1],
                                    itemsMobile: [2, 3],
                                });
                            });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Wave-->
    <div id="container_nosotros" class="row m-0 p-0">
        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg"
            class="transition duration-300 ease-in-out delay-150 p-0 m-0 ">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="5%" stop-color="#cee1e5"></stop>
                    <stop offset="95%" stop-color="#28434a"></stop>
                </linearGradient>
            </defs>
            <path
                d="M 0,400 C 0,400 0,200 0,200 C 84.83846153846156,173.45128205128205 169.67692307692312,146.9025641025641 245,142 C 320.3230769230769,137.0974358974359 386.13076923076926,153.84102564102562 475,161 C 563.8692307692307,168.15897435897438 675.8,165.73333333333332 751,163 C 826.2,160.26666666666668 864.6692307692308,157.22564102564104 939,173 C 1013.3307692307692,188.77435897435896 1123.5230769230768,223.36410256410258 1213,231 C 1302.4769230769232,238.63589743589742 1371.2384615384617,219.3179487179487 1440,200 C 1440,200 1440,400 1440,400 Z"
                stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"
                class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)">
            </path>
        </svg>
    </div>
    <!--Seccion de Nosotros-->
    <div class="row p-0 m-0 mb-5 bg-white  container_nosotros">

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
            <div class="row">

                <div class="col-12 mb-4">
                    <p class="fs-1 text-center mb-0">¿Quiénes Somos?</p>
                </div>
                <div class="col-12">
                    <p class="fs-6 px-3 px-sm-2 px-md-2 px-lg-2 px-xl-2">“Consiente a tu mascota con tan solo un click”
                        Carlos pets es una plataforma de mercado online que te permitirá de manera fácil, rápida y
                        segura realizar tus compras sin ningún inconveniente para consentir a tu mascota, siendo
                        atendido por un equipo de profesionales, capacitados para prestar el mejor servicio, a pesar de
                        la distancia; trabajando en carlos's pets dando y dejando un sello de confianza en nuestros
                        clientes, siendo los más rápidos en realizar entregas en el área de mercado. carlos's pets
                        Latino abarca gran parte del estado Carabobo, realizando envíos de lunes a domingo en un horario
                        comprendido de 8:00am y las 8:00pm, con entregas puntuales y en buen estado. Enviamos tu encargo
                        a donde lo desees y, para un mayor compromiso, somos nosotros mismos quienes nos encargamos de
                        realizar las entregas de sus pedidos a la mano de quien lo necesita.

                    </p>
                </div>
                <div class="col-12 p-4">
                    <img width="100%" height="auto" src="img/nosotros/img_nosotros_1.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
            <div class="row">
                <div class="col-12 mb-4">
                    <p class="fs-1 text-center mb-0">Misíon</p>
                </div>
                <div class="col-12">
                    <p class="fs-6 px-3 px-sm-2 px-md-2 px-lg-2 px-xl-2">“Somos una plataforma de servicio para prroveer
                        productos para las mascotas; maximizando las compras de manera fácil y segura; donde podrás
                        enviar los productos necesarios en los hogares de la familia venezolana para sus mascotas,
                        realizando la compra desde cualquier parte del país o incluso estando fuera.
                    </p>
                </div>
                <div class="col-12 p-4">
                    <img width="100%" height="auto" src="img/nosotros/img_nosotros_4.jpg" alt="">
                </div>
                <div class="col-12 my-4">
                    <p class="fs-1 text-center mb-0">Visíon</p>
                </div>
                <div class="col-12">
                    <p class="fs-6 px-3 px-sm-2 px-md-2 px-lg-2 px-xl-2">“Somos una plataforma de servicio para prroveer
                        productos para las mascotas; maximizando las compras de manera fácil y segura; donde podrás
                        enviar los productos necesarios en los hogares de la familia venezolana para sus mascotas,
                        realizando la compra desde cualquier parte del país o incluso estando fuera.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--Seccion de Contacto-->
    <div id="container_contacto" class="row my-5 p-0 mx-0 d-flex justify-content-center align-items-center container_contacto">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6   text-center">
            <form action="" class="row px-3 mx-3  container_form">
                <div class="col-12 container_img_form"><img src="img/contacto/cabecera_form.png" alt=""></div>
                <div class="col-12 ">
                    <p class="fs-1 mb-0 ">Contacto</p>
                </div>
                <div class="col-12 "><input class="form-control mb-3" type="text" name="" id="" placeholder="Nombre">
                </div>
                <div class="col-12 "><input class="form-control mb-3" type="email" name="" id="" placeholder="E-mail">
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center mb-3 ">
                    <textarea class="form-control bi-textarea-resize overflow-scroll" name="message" id="mensaje"
                        placeholder="Mensaje"></textarea>
                </div>
                <div class="col-12 "><button class="btn btn-outline-primary w-25  mb-3">ENVIAR</button></div>
            </form>

        </div>
    </div>
</section>
<?php
include('header_footer/footer.php');
?>