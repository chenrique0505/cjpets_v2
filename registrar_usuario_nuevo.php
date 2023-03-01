<?php
require_once('dbconnect.php');
session_start();
// if (!isset($_SESSION['nomuser'])) 
// {
//     header('location:bienvenida.php');
// }
if (isset($_POST['btn_registro_cliente'])) {
    $cedcli = $_POST['cedcli'];
    $prinomcli = $_POST['prinomcli'];
    $priapecli = $_POST['priapecli'];
    $nomcli = $prinomcli . " " . $priapecli;
    $direccion = $_POST['dircli'];
    $estado = $_POST['combo_estado'];
    $municipio = $_POST['combo_municipio'];
    $sector = $_POST['combo_sector'];
    $telcli = $_POST['telcli'];
    $puntorefcli = $_POST['puntorefcli'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $_SESSION['cedcli'] = $cedcli;

    $query = "SELECT * FROM cliente INNER JOIN inicio_sesion using(cedcli) WHERE correo= '" . $email . "'";    
    $query2 = "SELECT * FROM inicio_sesion INNER JOIN cliente using(cedcli) WHERE correo= '" . $email . "'";
    if ($resultado = mysqli_query($link, $query2)) {
        $row_cnt = mysqli_num_rows($resultado);
        if ($row_cnt == 0) {
            
            $_SESSION['nombre'] = $nomcli;
            $_SESSION['cargo'] = 'cliente';
            $_SESSION['codemp'] = null;
        } 
    }

    if ($resultado = mysqli_query($link, $query)) {
        $row_cnt = mysqli_num_rows($resultado);
    }
    if ($row_cnt == 1) {
?>
        <script>
            alert('El correo electronico ya existe, ingrese otro correo', window.location = 'registrar_usuario_nuevo.php')
        </script>
    <?php

    } else if ($row_cnt == 0) {
        $query = "INSERT into cliente(cedcli,prinomcli,priapecli,direccion,estado,municipio,sector,telcli,puntorefcli) values('" . $cedcli . "','" . $prinomcli . "','" . $priapecli . "','" . $direccion . "','" . $estado . "','" . $municipio . "','" . $sector . "','" . $telcli . "','" . $puntorefcli . "')";
        
        if(mysqli_query($link, $query)){
            $query3 = "INSERT into inicio_sesion(correo ,contraseña,nombre,cargo) 
            values('" . $email . "','" . $contraseña . "','" . $_SESSION['nombre'] . "','" . $_SESSION['cargo'] . "')";
            mysqli_query($link, $query3);
        }
        ?>
        <script>
            alert('Usuario registrado con exito', window.location = 'iniciar_sesion.php')
        </script>
    <?php
    }
    ?>
    
    

<?php
}

include('header_footer/header.php')
?>
<section class="m-0 p-0 container_body_registrar_usuario_nuevo">
    <!--Seccion de iniciar sesion-->
    <div class="row mx-0  d-flex justify-content-center align-items-center container_iniciar_sesion">

        <div
            class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 d-flex justify-content-center align-items-center m-0 px-5   container_img_form">
            <img src="img/contacto/cabecera_form.png" alt="">
        </div>
        <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 m-0  text-center">
            <form action="" method="post" class="row px-3 mx-3 mb-5  container_form_iniciar_sesion">

                <div class="col-12 ">
                    <p class="fs-1 mb-0 mt-3">Registrarse </p>
                    <hr>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                    <input class="form-control shadow-lg my-3" type="text" name="prinomcli" id="prinomcli"
                        placeholder="Primer Nombre">
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                    <input class="form-control shadow-lg my-3" type="text" name="priapecli" id="priapecli"
                        placeholder="Primer Apellido">
                </div>
                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <input class="form-control shadow-lg my-3" type="number" name="cedcli" id="cedcli"
                        placeholder="Rut">
                </div>
                <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <input class="form-control shadow-lg my-3" type="tel" name="telcli" id="telcli"
                        placeholder="Telefono">
                </div>
                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <input class="form-control shadow-lg my-3" type="email" name="email" id="email"
                        placeholder="Ingrese un correo">
                </div>
                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <input class="form-control shadow-lg my-3" type="password" name="contraseña" id="contraseña"
                        placeholder="Ingrese su contraseña">
                </div>
                <div class="col-5 col-sm-3 col-md-3 col-lg-3 col-xl-3 my-2 d-flex justify-content-center">
                    <select class="btn border btn-outline-primary" name="combo_estado" id="combo_estado">
                        <option value="carabobo">
                            Carabobo
                        </option>
                    </select>
                </div>
                <div class="col-5 col-sm-4 col-md-4 col-lg-4 col-xl-4 my-2 mx-2 d-flex justify-content-center">
                    <select class="btn border btn-outline-primary" name="combo_municipio" id="combo_municipio">
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
                
                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 my-2 d-flex justify-content-center">
                    <select class="btn border btn-outline-primary container_condicion_registro" name="combo_sector" id="combo_sector">
                        <option value="las_quintas_1">
                            Las Quintas 1
                        </option>
                        <option value="las_quintas_2">
                            Las Quintas 2
                        </option>
                        <option value="las_quintas_3">
                            Las Quintas 3
                        </option>
                    </select>
                </div>
                <div class="my-3">
                    <textarea class="w-100 h-100 textarea-resize form-control" name="dircli" id="dircli" rows="4" placeholder="Ingrese su direccion"></textarea>
                </div>

                <div class="my-3">
                <textarea class="w-100 h-100 textarea-resize form-control" name="puntorefcli" id="puntorefcli" rows="4" placeholder="Ingrese un punto de referencia"></textarea>
                    
                </div>

                <div class="col-12 ">
                    <button class="btn btn-outline-primary w-100 mb-3" type="submit" name="btn_registro_cliente"
                        id="btn_registro_cliente">
                        Registrarse
                    </button>
                </div>
                <hr>
                <div class="text-center container_condicion_registro m-0">
                    Al registrarse, aceptas nuestras Condiciones de uso y Politica de privacidadbr
                    <hr>
                </div>
                <div class="text-center mb-3 container_condicion_registro">
                    ¿Ya tienes cuenta? <a class="text-decoration-none " href="iniciar_sesion.php">
                        Iniciar sesion</a>
                </div>
            </form>

        </div>
    </div>
</section>


<?php
include('header_footer/footer.php');
?>