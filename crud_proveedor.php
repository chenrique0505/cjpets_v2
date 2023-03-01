<?php
include "dbconnect.php";
session_start();
$query2 = "SELECT max(codprove) as codprove FROM proveedor order by codprove";
$result2 = mysqli_query($link, $query2);
while ($row_prod = mysqli_fetch_array($result2)) {
    $num = $row_prod['codprove'];

    $codigo = $num + 1;
}

if (isset($_POST['btn_search'])) {
    $valueToSearch = $_POST['ValueToSearch'];
    $query = "SELECT * FROM proveedor WHERE nomprove like'%" . $valueToSearch . "%'";
    $result = mysqli_query($link, $query);
} else {
    $query = "SELECT * FROM proveedor";
    $result = mysqli_query($link, $query);
}


include 'header_footer/header.php';
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
                        <h1 class="text-center mb-0 text-dark titulo_tabla ">CRUD PROVEEDORES</h1><br>
                        <tr>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Codigo</th>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Nombre</th>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Empresa</th>
                            <th class="text-center align-middle cabecera_tabla text-white" scope="col">Municipio</th>
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
                            <td class="text-center align-middle text_tabla_body "><?php echo $row['codprove']; ?></td>
                            <td class="text-center align-middle text_tabla_body "><?php echo $row['nomprove']; ?></td>
                            <td class="text-center align-middle text_tabla_body "><?php echo $row['nomempprove']; ?>
                            </td>
                            <td class="text-center align-middle text_tabla_body "><?php echo $row['municipio']; ?>
                            </td>
                            <td class="text-center align-middle  ">
                                <a href="cruds_proveedores/proveedor_modificado.php?id=<?php echo $row['codprove'] ?>">
                                    <img height="20vw" src="img/crud_icon/actualizar.png" alt="">
                                </a>
                            </td>
                            <td class="text-center align-middle   ">
                                <a href="#" onclick="del('<?php echo $row['codprove']; ?>')">
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

                    <div class=" text-center text-dark fs-4 fw-bold pt-3 ">AGREGAR Proveedor</div>
                    <hr>

                    <form class="col-12" action="cruds_proveedores/proveedor_agregado.php" method="post">
                        <!--codigo proveedor-->
                        <div class="d-flex justify-content-between">
                            <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                <input readonly value="<?php echo $codigo; ?>" type="number" class="form-control"
                                    name="codprove" id="codprove" placeholder="Codigo">
                            </div>
                        </div>

                        <!--Nombre empresa proveedor-->
                        <div class="mb-2 shadow-lg mt-3">
                            <input type="text" class="form-control" name="nomempprove" id="nomempprove"
                                placeholder="Nombre Empresa Proveedor">
                        </div>


                        <div class="d-flex">
                            <!--Municipio-->
                            <div class="mb-3 shadow-lg w-50 me-3">
                                <div class="text-center bg-secondary text-white">Municipio</div>
                                <select class="form-control " name="combo_municipio" id="combo_municipio">
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
                            <!--Ciudad-->
                            <div class="mb-3 shadow-lg w-50 ">
                                <div class="text-center bg-secondary text-white">Ciudad</div>
                                <select class="form-control " name="combo_ciudad" id="combo_ciudad">
                                    <option value="Valencia">
                                        Valencia
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <!--cod postal-->
                            <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                <input type="number" class="form-control" name="codpostal" id="codpostal"
                                    placeholder="Cod. Postal">
                            </div>
                            <!--cod de area-->
                            <div class="mb-2 shadow-lg  mt-3 w-50 ">
                                <input type="number" class="form-control" name="codarea" id="codarea"
                                    placeholder="Cod. Area">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between ">
                            <!--numero del proveedor-->
                            <div class="mb-2 shadow-lg  mt-3 w-50 me-3">
                                <input value="" type="number" class="form-control" name="numprove" id="numprove"
                                    placeholder="Numero">
                            </div>
                            <!--cargo del proveedor-->
                            <div class="mb-2 shadow-lg  mt-3 w-50 ">
                                <input value="" type="text" class="form-control" name="cargoprove" id="cargoprove"
                                    placeholder="Cargo">
                            </div>
                        </div>
                        <!--Nombre del proveedor-->
                        <div class="mb-4 shadow-lg  mt-3 ">
                            <input value="" type="text" class="form-control" name="nomprove" id="nomprove" placeholder="Nombre Proveedor">
                        </div>
                        
                        <button name="btn_agregar_proveedor" id="btn_agregar_proveedor" type="submit"
                            value="btn_agregar_proveedor" class="btn btn-outline-light btn-secondary  w-100 ">AGREGAR
                            PRODUCTO
                        </button>
                    </form>

                </div>
            </div>            
        </div>
        <!--PDF LISTA DE PRODUCTOS-->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center align-items-center p-3">            
                <form class="row " action="pdf/pdf_datos_todos_proveedores.php" method="post">
                    <button name="btn_pdf_registros_producto" id="btn_pdf_registros_producto" type="submit" value="btn_pdf_registros_producto" class="btn btn-outline-secondary btn-dark  w-100 ">Lista completa de Proveedores
                    </button> 
                </form>            
        </div>
    </div>
</section>


<?php
include('header_footer/footer.php')

?>

<script>
function del(id) {
    alertify.confirm("CTMC/SYSTEM", "Desea Eliminar Proveedor?",
        function() {
            window.location = "cruds_proveedores/proveedor_eliminado.php?codprove=" + id;
        },
        function() {
            window.location = "crud_proveedor.php";
        })
}
</script>
<script src="alertifyjs/alertify.min.js"></script>