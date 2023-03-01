<?php
include("dbconnect.php");
session_start();
//if (!isset($_SESSION['nomuser'])) {
//    header('location: iniciar_sesion.php');
//}


//Buscar los productos que coincidan con el valor introducido por el usuario en el input search
if (isset($_POST['btn_search'])) {
    $valueToSearch = $_POST['ValueToSearch'];
    $query = "SELECT * FROM producto WHERE nomprod like'%" . $valueToSearch . "%'";
    $result = mysqli_query($link, $query);
} else {
    $query = "SELECT * FROM producto";
    $result = mysqli_query($link, $query);
}

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
include('header_footer/header.php')
?>
<section class="px-5  container_body_prod_ali">
    <!--Seccion de productos completos-->
    <div class="row  container_prod_ali">

        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>


        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mx-0 my-2 p-4 cotainer_card  ">
            <div class="row m-0 p-0 card">
                <div class="card-header  col-12 m-0 p-0  bg-white ">
                <a href="productos_alimentos_descripcion.php?id=<?php echo $row['codprod']; ?>">
                    <img class="card-img-top"
                    src="img/alimentos/<?php echo $row['imgprod']; ?>" alt=""></a>    
                
                </div>

                <div name="nombre_producto" id="nombre_producto" class="card-body col-12">
                    <?php echo recortar_texto($row['nomprod'], 15); ?>
                </div>

                <div name="precio_producto" id="precio_producto" class="card-subtitle text-center col-12 fw-bold">
                    <a class="  " href="productos_alimentos_descripcion.php?id=<?php echo $row['codprod']; ?>">Ver más >></a>
                </div>

                <div name="precio_producto" id="precio_producto"
                    class="col-12 card-body text-center  fw-bold">
                    <?php echo $row['preunitprod'] . "$"; ?>
                </div>

                <div class="col-12 card-footer">
                    <button name="btn_comprar" id="btn_comprar" value="btn_comprar" type="submit" class=" btn btn-outline-success w-100 ">Comprar</button>
                </div>
            </div>
        </div>


        <?php
        }
        ?>
    </div>
</section>


<?php
include('header_footer/footer.php');
?>