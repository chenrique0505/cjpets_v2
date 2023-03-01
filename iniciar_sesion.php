<?php
require_once 'dbconnect.php'; //conectar con la bbdd
session_start();
//verificar si se ha creado la variable de sesion
if (isset($_SESSION['nomuser'])) {
    header('location: index.php');
}
//verificar si se ha presionado el boton iniciar sesion
if (isset($_POST["btn_inicio_sesion"])) {

    $correo = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    //echo $nom;
    $query = "SELECT * FROM inicio_sesion WHERE correo ='" . $correo . "' and contraseña ='" . $contraseña . "'";
    //print $query;
    if ($resultado = mysqli_query($link, $query)) {//conectar con la bbdd y traer todos los registros
        $row_ctn = mysqli_num_rows($resultado);
        //print $row_ctn;
    }

    if (!isset($_SESSION['nomuser'])) {
        if ($row_ctn == 1) {//existe el usuario
            if ($correo == 'carlos_admin@gmail.com') {//el usuario es administrador maestro
                $_SESSION['nomuser'] = $correo;                
                $_SESSION['status'] = 'Master_admin';
                $_SESSION['nombre'] = 'Carlos Henriquez';
                header("location:index.php");
            }else{//el ususario es un cliente
                $_SESSION['nomuser'] = $correo;
                $_SESSION['status'] = 'cliente';
                header("location:index.php");
            }            
        } else if ($row_ctn == 0) {
?>
    <script>
    alert('El usuario que ingreso no existe')
    </script>
<?php
        }
    }
}

include('header_footer/header.php')
?>
<section class="m-0 p-0 container_body">
    <!--Seccion de iniciar sesion-->
    <div class="row mx-0 mb-5 d-flex justify-content-center align-items-center container_iniciar_sesion">

        <div
            class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 d-flex justify-content-center align-items-center m-0 px-5   container_img_form">
            <img src="img/contacto/cabecera_form.png" alt="">
        </div>
        <div class="col-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 m-0  text-center">
            <form action="" method="post" class="row px-3 mx-3 mb-5  container_form_iniciar_sesion">

                <div class="col-12 ">
                    <p class="fs-1 mb-0 mt-3">Iniciar sesion</p>
                    <hr>
                </div>

                <div class="col-12 "><input class="form-control mb-3" type="email" name="email" id="email"
                        placeholder="Usuario">
                </div>
                <div class="col-12 "><input class="form-control mb-3" type="password" name="contraseña" id="contraseña"
                        placeholder="Contraseña">
                </div>

                <div class="col-12 "><button type="submit" name="btn_inicio_sesion" id="btn_inicio_sesion"
                        class="btn btn-outline-primary  w-100  mb-3">Iniciar sesion</button></div>
                <hr>
                <div class="col-12 ">
                    <p class="pb-0 p1">¿No tienes cuenta? <a href="registrar_usuario_nuevo.php">Registrarse</a></p>
                    <p class="pb-0 p2"><a href="">¿Olvidaste tu contraseña?</a></p>
                </div>
            </form>

        </div>
    </div>
</section>


<?php
include('header_footer/footer.php');
?>