<?php
require_once '../dbconnect.php';
session_start();
if (!isset($_SESSION['nomuser'])) 
{
    header('location:../iniciar_session.php');
}
$codigo = $_GET['id'];
$query = "SELECT * FROM producto WHERE codprod = '" . $codigo . "' ";
$result = mysqli_query($link, $query);
include('../header_footer/header_basico.php')
?>
<section class=" container_body_modificar_producto">


    <!--Seccion formulario modificar producto-->
    <div class="row d-flex justify-content-center align-items-center mx-0 px-3 pb-5 container_form_modificar_producto">

        <?php
        while ($rowpro = mysqli_fetch_array($result)) {
        ?>

        <form class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7  container_form_modificar_prod"
            action="../crud_productos/producto_guardado.php" method="post">
            <div class=" text-center text-dark fs-4 fw-bold pt-3 ">MODIFICAR PRODUCTO</div>
            <hr>
            <!--codigo y precio-->

            <div class="d-flex justify-content-between">

                <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                    <div class="text-center bg-secondary text-white">Codigo</div>
                    <input readonly  value="<?php echo $rowpro['codprod']; ?>" type="number" class="form-control" name="codprod"
                        id="codprod" placeholder="Codigo">
                </div>

                <div class="mb-2 shadow-lg  mt-3 w-50">
                    <div class="text-center bg-secondary text-white">Precion</div>
                    <input value="<?php echo $rowpro['preunitprod']; ?>" type="number" class="form-control" name="preunitprod" id="preunitprod" placeholder="Precio">
                </div>
            </div>


            <!--Nombre del producto-->
            <div class="mb-2 shadow-lg mt-3">
                <div class="text-center fondo1_gradiente text-white">Nombre</div>
                <input value="<?php echo $rowpro['nomprod']; ?>" type="text" class="form-control" name="nomprod" id="nomprod" placeholder="Nombre del producto">
            </div>

            <!--Stock y Unidad por producto-->
            <div class="d-flex justify-content-between">
                <div class="mb-3 shadow-lg  mt-3 w-50 me-3">
                    <div class="text-center fondo1_gradiente text-white">Cant. de unidades en el stock</div>
                    <input value="<?php echo $rowpro['unistockprod']; ?>" type="number" class="form-control" name="unistockprod" id="unistockprod" placeholder="STOCK">
                </div>

                <div class="mb-3 shadow-lg  mt-3 w-50 ">
                    <div class="text-center fondo1_gradiente text-white ">Cant. por pedido</div>
                    <input value="<?php echo $rowpro['unipedprod']; ?>" type="number" class="form-control" name="unipedprod" id="unipedprod"
                        placeholder="Unid.por pedido">
                </div>
            </div>
            <!--combo categoria-->
            <div class="d-flex row">
                <div class="mb-3 shadow-lg col-3  form_cat_prov_text">
                    <div class="text-center bg-secondary text-white">Cod. Categoria</div>
                    <input readonly value="<?php echo $rowpro['codcat']; ?>" type="number" class="form-control" name="codcat" id="codcat" placeholder="Cod. cat.">
                </div>

                <div class="mb-3 shadow-lg   col-3 form_cat_prov_text">

                    <div class="text-center bg-secondary text-white ">Seleccione cat.</div>
                    <select class="form-control " name="combo_categoria" id="combo_categoria">
                        <option value="0">
                            0-Alimentos
                        </option>
                        <option value="1">
                            1-Juguetes
                        </option>
                    </select>
                </div>

                <!--combo proveedor-->
                <div class="mb-3 shadow-lg   col-3 form_cat_prov_text">
                    <div class="text-center bg-secondary text-white">Cod. Proveedor</div>
                    <input readonly value="<?php echo $rowpro['codprove']; ?>" type="number" class="form-control"
                        name="codprov" id="codprov" placeholder="cod. proveedor">
                </div>
                
                <div class="mb-3 shadow-lg  col-3 form_cat_prov_text">
                    <div class="text-center bg-secondary text-white">Seleccione prov.</div>
                    <select class="form-control " name="combo_proveedor" id="combo_proveedor">
                        <option value="1">
                            0-nestle
                        </option>
                        <option value="2">
                            1-Mini Mascotas
                        </option>
                    </select>
                </div>
            </div>
            <!--nombre de la imagen del producto-->
            <div class="mb-3 shadow-lg  mt-1 ">
            <div class="text-center fondo1_gradiente text-white">Nombre de la imagen del producto</div>
                <input value="<?php echo $rowpro['imgprod']; ?>" type="text" class="form-control " name="imgprod" id="imgprod"
                     placeholder="Nombre de la imagen del producto" >
            </div>
            <!--descripcion del producto-->
            <div class="mb-3 mt-1 ">
                <div class="mb-3  mt-3">
                    <textarea class="w-100" value="" name="textarea_desc_producto" id="textarea_desc_producto" rows="6"
                        placeholder="Descripcion del producto"><?php echo $rowpro['descprod']; ?></textarea>
                        

                </div>
            </div>

            <button name="btn_modificar_producto" id="btn_modificar_producto" type="submit" value="btn_modificar_producto"
                class="btn btn-outline-light btn-secondary  w-100 ">MODIFICAR
                PRODUCTO
            </button>
        </form>

        <?php
        }
        ?>

    </div>
</section>


<?php
include('../header_footer/footer.php');
?>