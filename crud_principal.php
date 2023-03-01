<?php
require_once 'dbconnect.php'; //conectar con la bbdd
session_start();
if (!isset($_SESSION['nomuser'])) {
    header('location: iniciar_sesion.php');
}
//se obtiene el cod maxi de la tabla producto para ser incrementado en uno y se pueda
//crear un registro nuevo para un nuevo produco (este incremento se hace de forma automatica) 
$query2 = "SELECT max(codprod) as codprod FROM producto order by codprod";
$result2 = mysqli_query($link, $query2);
while ($row_prod = mysqli_fetch_array($result2)) {
    $num = $row_prod['codprod'];
    $codigo = $num + 1;
}

//$query4 = "SELECT * FROM proveedor";
//$result4 = mysqli_query($link, $query4);

if (isset($_POST['btn_search'])) { //traer los registros de la tabla producto que coincida con la palbabra que se almacena en valueToSearch.............si value to search esta vacio trae todos los registros
    $valueToSearch = $_POST['ValueToSearch'];
    $query = "SELECT * FROM producto WHERE codprod like'" . $valueToSearch . "%'";
    $result = mysqli_query($link, $query);
} else {
    $query = "SELECT * FROM producto";
    $result = mysqli_query($link, $query);
}

if (isset($_POST['btn_consulta_prod_por_cat'])) {
    require_once 'dbconnect.php';

    //$cat=$_POST['codcat];
    $codcat = $_POST['combo_categoria'];
    $etiqueta = array();
    $data = array();
    $query_2 = "SELECT nomprod,unistockprod	from producto where codcat='" . $codcat . "' AND unistockprod >=30; ";
    $result_query_2 = mysqli_query($link, $query_2);
    while ($row_query_2 = mysqli_fetch_array($result_query_2)) {
        array_push($etiqueta, $row_query_2['nomprod']);
        array_push($data, $row_query_2['unistockprod']);
    }
}
include('header_footer/header.php')
?>
<section class=" container_body_crup_principal">
    <!--Seccion titulo CRUDS-->
    <div class="row mx-0  d-flex justify-content-center align-items-center container_crud_principal  ">
        <div class="col-12 position-absolute container_nav_crud">
            <div class="row d-flex justify-content-around align-items-center">
                <div class="col-12 text-center pb-4"><span
                        class="container_titulo_crud p-3  fw-bold text-success border rounded-circle text-white">CRUDS</span>
                </div>
                <div class="col-4 ">
                <a class="text-decoration-none " href="crud_principal.php"><p class="mb-0 form-control btn btn-outline-success btn-secondary text-center text-light">Productos</p></a>
                </div>
                <div class="col-4 ">
                <a class="text-decoration-none " href="crud_proveedor.php"><p class="mb-0 form-control btn btn-outline-success btn-secondary text-center text-light">Proveedor</p></a>
                </div>
                <div class="col-4 ">
                <a class="text-decoration-none " href="crud_principal.php"><p class="mb-0 form-control btn btn-outline-success btn-secondary text-center text-light ">Categoria</p></a>
                </div>
            </div>
        </div>
    </div>

    <!--Seccion tabla del CRUD y formulario agregar producto-->
    <div class="row d-flex justify-content-between  mx-0 px-0 pb-5">
        <!--TABLA-->
        <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 container_tabla_crud_prod  ">

            <div class=" row  mx-0 px-0 ">

                <table
                    class="col-12 table table-responsive table-ligth table-hover table-bordered table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl shadow-lg ">
                    <thead class=" ">
                        <h1 class="text-center mb-0 text-dark titulo_tabla ">CRUD PRODUCTOS</h1><br>
                        <tr>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Codigo</th>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Nombre</th>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Precio por
                                unidad</th>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Unidades en
                                almacen</th>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Actualizar
                            </th>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Eliminar
                            </th>
                        </tr>
                    </thead>
                    <tbody class=" ">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td class="text-center align-middle text_tabla_body "><?php echo $row['codprod']; ?></td>
                            <td class="text-center align-middle text_tabla_body "><?php echo $row['nomprod']; ?></td>
                            <td class="text-center align-middle text_tabla_body "><?php echo $row['preunitprod']; ?>
                            </td>
                            <td class="text-center align-middle text_tabla_body "><?php echo $row['unistockprod']; ?>
                            </td>
                            <td class="text-center align-middle  ">
                                <a href="crud_productos/producto_modificado.php?id=<?php echo $row['codprod'] ?>">
                                    <img height="20vw" src="img/crud_icon/actualizar.png" alt="">
                                </a>
                            </td>
                            <td class="text-center align-middle   ">
                                <a href="#" onclick="del('<?php echo $row['codprod']; ?>')">
                                    <img height="20vw" src="img/crud_icon/eliminar.png" alt="">
                                </a>
                            </td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>


            </div>



        </div>
        <!--FORMULARIO DE AGREGAR-->
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 container_form_agregar_producto">
                <div class="row d-flex justify-content-center  ">
                    <!--imagen de cabecera formulario agregar-->
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 px-0 ">
                        <img class="h-100  w-100 rounded " src="img/contacto/cabecera_form.png" alt="">
                    </div>
                    <!--Form Agregar-->
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10  container_form_agregar_prod ">

                        <div class=" text-center text-dark fs-4 fw-bold pt-3 ">AGREGAR PRODUCTO</div>
                        <hr>
                        
                        <form class="col-12"  action="crud_productos/producto_agregado.php" method="post">
                                <!--codigo y precio-->
                                <div class="d-flex justify-content-between">
                                    <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                        <input readonly value="<?php echo $codigo; ?>" type="number"
                                            class="form-control" name="codprod" id="codprod" placeholder="Codigo">
                                    </div>

                                    <div class="mb-2 shadow-lg  mt-3 w-50">
                                        <input type="number" class="form-control" name="preunitprod"
                                            id="preunitprod" placeholder="Precio">
                                    </div>
                                </div>

                                <!--Nombre del producto-->
                                <div class="mb-2 shadow-lg mt-3">
                                    <input type="text" class="form-control" name="nomprod" id="nomprod"  placeholder="Nombre del producto">
                                </div>

                                <!--Stock y Unidad por producto-->
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3 shadow-lg  mt-3 w-50 me-3">
                                        <input type="number" class="form-control" name="unistockprod"
                                            id="unistockprod" placeholder="STOCK">
                                    </div>

                                    <div class="mb-3 shadow-lg  mt-3 w-50">
                                        <input value="" type="number" class="form-control" name="unipedprod"
                                            id="unipedprod" placeholder="Unid.por pedido">
                                    </div>
                                </div>
                                <!--combo categoria-->
                                <div class="d-flex">
                                    <div class="mb-3 shadow-lg w-50 me-3">
                                        <div class="text-center bg-secondary text-white">Categoria</div>
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
                                    <div class="mb-3 shadow-lg w-50">
                                        <div class="text-center bg-secondary text-white">Proveedor</div>
                                        <select class="form-control " name="combo_proveedor" id="combo_proveedor">
                                            <option value="1">
                                                nestle
                                            </option>
                                            <option value="2">
                                                Mini Mascotas
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <!--nombre de la imagen del producto-->
                                <div class="mb-3 shadow-lg  mt-1 ">
                                    <input value="" type="text" class="form-control " name="imgprod" id="imgprod" aria-describedby="emailHelpId" placeholder="Nombre de la imagen del producto">
                                </div>
                                <!--descripcion del producto-->
                                <div class="mb-3 mt-1 ">
                                    <div class="mb-3  mt-3">
                                        <textarea class="w-100" name="textarea_producto" id="textarea_producto" rows="6" placeholder="Descripcion del producto"></textarea>

                                        
                                    </div>
                                </div>

                                <button name="btn_agregar_producto" id="btn_agregar_producto" type="submit"
                                    value="btn_agregar_producto" class="btn btn-outline-light btn-secondary  w-100 ">AGREGAR
                                    PRODUCTO
                                </button>
                        </form>
                        
                    </div>
                </div>
        </div>
        <!--PDF LISTA DE PRODUCTOS-->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center align-items-center p-3">            
                <form class="row " action="pdf/pdf_datos_producto.php" method="post">
                    <button name="btn_pdf_registros_producto" id="btn_pdf_registros_producto" type="submit" value="btn_pdf_registros_producto" class="btn btn-outline-secondary btn-dark  w-100 ">Lista completa de productos
                    </button> 
                </form>            
        </div>
    </div>
</section>


<?php
include('header_footer/footer.php');
?>

<script>
    function del(id) {  
        alertify.confirm("CTMC/SYSTEM", "Desea Eliminar Producto.",
            function() {
                window.location = "crud_productos/producto_eliminado.php?codprod=" + id;
            },
            function() {
                window.location = "crud_principal.php";
            })
    }
</script>
<script src="alertifyjs/alertify.min.js"></script>


