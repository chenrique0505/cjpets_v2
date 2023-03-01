<?php
include("dbconnect.php");
session_start();
//if (!isset($_SESSION['nomuser'])) {
//    header('location: iniciar_sesion.php');
//}


$codprod = $_GET['id'];
$codcat = 0;
$query = "SELECT * from producto inner join categoria using(codcat)  where codprod='" . $codprod . "'";
$result = mysqli_query($link, $query);

include('header_footer/header.php')
?>
<section class="px-5  container_body_prod_ali_descripcion">
    <!--Seccion de productos completos-->
    <div class="row  container_prod_ali_descripcion ">
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="row card">
                <!--Seccion de foto grande-->
                <div class="col-12 card-header  p-0 p-sm-0 p-md-5 p-lg-5 p-xl-5 text-center">
                    <img class="p-5 card-img-top" src="img/alimentos/<?php echo $row['imgprod'];?>" alt="">
                </div>
                <!--Seccion de minifotos-->
                <div class="col-12 my-3 ">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-3 card">
                            <img class="card-img-top" src="img/alimentos/<?php echo $row['imgprod']; ?>" alt="">
                        </div>
                        <div class="col-3 card ">
                            <img class="card-img-top " src="img/alimentos/<?php echo $row['imgprod']; ?>" alt="">
                        </div>
                        <div class="col-3 card">
                            <img class="card-img-top" src="img/alimentos/<?php echo $row['imgprod']; ?>" alt="">
                        </div>
                    </div>



                </div>
                <!--Seccion de la descripcion de la imagen-->

            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="row px-0  px-sm-0 px-md-0 px-lg-5 px-xl-5 ">
                <div class="col-12 fw-bold fs-2 card-header ">
                    <?php echo $row['nomprod']; ?>
                </div>

                <div class="col-12 card-subtitle ">
                    <span class="fw-bold fs-3">Categoria:</span>
                    <span class="fw-light fs-4"><?php echo " " . $row['nomcat']; ?></span>
                </div>

                <div class="col-12 fw-bold fs-2 card-body">
                    <?php echo $row['preunitprod'] . "$"; ?>
                </div>

                <div class="col-12  card-body">
                    <?php echo $row['descprod'] ?>
                </div>

                <div class="col py-3 d-flex align-items-end card-footer">
                    <button name="btn_comprar" id="btn_comprar" value="btn_comprar" type="submit"
                        class=" btn btn-outline-success w-100 ">Comprar</button>
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