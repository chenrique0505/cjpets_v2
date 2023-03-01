<?php
require_once '../dbconnect.php';
session_start();
if (!isset($_SESSION['nomuser'])) {
    header('location:iniciar_sesion.php');
}
$codigo = $_GET['id'];
$query = "SELECT * FROM proveedor WHERE codprove = '" . $codigo . "' ";
$result = mysqli_query($link, $query);
include '../header_footer/header_basico.php';
?>

<section class=" container_body_modificar_producto">


    <!--Seccion formulario modificar producto-->
    <div class="row d-flex justify-content-center align-items-center mx-0 px-3 pb-5 container_form_modificar_producto">

        <?php
        while ($rowpro = mysqli_fetch_array($result)) {
        ?>

        <form class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7  container_form_modificar_prod"
            action="proveedor_guardado.php" method="post">
            <div class=" text-center text-dark fs-4 fw-bold pt-3 ">Modificar datos del Proveedor</div>
            <hr>

            <!--codprove-->
            <div class="d-flex justify-content-between">
                <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                <div class="text-center bg-secondary text-white">Codigo</div>
                    <input readonly value="<?php echo $rowpro['codprove'] ?>" type="number" class="form-control"
                        name="codprove" id="codprove" aria-describedby="emailHelpId" placeholder="">
                </div>
                <!--nomprove-->
                <div class="mb-2 shadow-lg  mt-3 w-50">
                <div class="text-center bg-secondary text-white">Nombre proveedor</div>
                    <input value="<?php echo $rowpro['nomprove'] ?>" type="text" class="form-control" name="nomprove"
                        id="nomprove" aria-describedby="emailHelpId" placeholder="Nombre Proveedor">
                </div>
            </div>
            <!--nomempprove-->
            <div class="mb-2 shadow-lg  mt-3 ">
            <div class="text-center bg-secondary text-white">Nombre empresa proveedor</div>
                <input value="<?php echo $rowpro['nomempprove'] ?>" type="text" class="form-control" name="nomempprove" id="nomempprove" placeholder="Nombre empresa proveedor">
            </div>

            <!--Municipio readonly-->
            <div class="d-flex mt-4 ">
                <div class="mb-3 shadow-lg w-25 ">
                    <div class="text-center bg-secondary text-white">Municipio</div>
                    <input readonly class="form-control" type="text" value="<?php echo $rowpro['municipio'] ?>" name=""
                        id="">
                </div>

                <!--Municipio-->

                <div class="mb-3 shadow-lg w-25 ms-1">
                    <div class="text-center bg-secondary text-white">Seleccione Muni</div>
                    <select class="w-100 " name="combo_municipio" id="combo_municipio">
                        <option value="naguanagua">
                            Naguanagua
                        </option>
                        <option value="valencia">
                            Valencia
                        </option>
                        <option value="san diego">
                            San Diego
                        </option>
                    </select>
                </div>

                <!--Ciudad readonly-->
                <div class="mb-3 shadow-lg w-25 ms-3">
                    <div class="text-center bg-secondary text-white">Ciudad</div>
                    <input readonly class="form-control" type="text" value="<?php echo $rowpro['ciudad']?>" name=""
                        id="">
                </div>
                <!--Ciudad-->
                <div class="mb-3 shadow-lg w-25 ms-1">
                    <div class="text-center bg-secondary text-white">Seleccione Ciudad</div>
                    <select class="w-100 " name="combo_ciudad" id="combo_ciudad">
                        <option value="Valencia">
                            Valencia
                        </option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <!--codpostal-->
                <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                <div class="text-center bg-secondary text-white">Cod. Postal</div>
                    <input value="<?php echo $rowpro['codpostal']?>" type="number" class="form-control" name="codpostal"
                        id="codpostal" aria-describedby="emailHelpId" placeholder="Cod. Postal">
                </div>
                <!--codarea-->
                <div class="mb-2 shadow-lg  mt-3 w-50 ">
                <div class="text-center bg-secondary text-white">Cod. Area</div>
                    <input value="<?php echo $rowpro['codarea'] ?>" type="number" class="form-control" name="codarea"
                        id="codarea" aria-describedby="emailHelpId" placeholder="Cod. Area">
                </div>
            </div>
            <div class="d-flex justify-content-between ">
                <!--numprove-->
                <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                <div class="text-center bg-secondary text-white">Numero</div>
                    <input value="<?php echo $rowpro['numprove'] ?>" type="number" class="form-control" name="numprove"
                        id="numprove" aria-describedby="emailHelpId" placeholder="Numero">
                </div>
                <!--cargoprove-->
                <div class="mb-2 shadow-lg  mt-3 w-50 ">
                <div class="text-center bg-secondary text-white">Cargo</div>
                    <input value="<?php echo $rowpro['cargoprove'] ?>" type="text" class="form-control"
                        name="cargoprove" id="cargoprove" aria-describedby="emailHelpId" placeholder="Cargo">
                </div>
            </div>

            <button name="btn_modificar_proveedor" id="btn_modificar_proveedor" type="submit"
                value="btn_modificar_proveedor" class="btn btn-outline-light btn-secondary  w-100 my-2">MODIFICAR
                PROVEEDOR
            </button>
        </form>

        <?php
        }
        ?>

    </div>
</section>

<?php
include '../header_footer/footer.php';
?>