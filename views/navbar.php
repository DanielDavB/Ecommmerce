 
 <?php
$status = session_status();
if($status == PHP_SESSION_NONE){
  session_start();
}


//se llama la conexión y consuta para mostrar datos
require "../config/Conexion.php";
$query6 = "select * from nav";
$resultado6 = mysqli_query($conexion,$query6);
?>
    <nav class="navbar  navbar-fixed-top" style="background-color: #e7d6d4;">
    <div class="wrap">
        <header id="header" style="background-color: #ebd3d1;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="../index.php"><div class="logo">
                        <img src="<?php foreach($resultado6 as $text){ ?>
                        ../cms/stuff/sitio/<?php echo $text['icono']; ?>
                            <?php }?>" alt="Marina Bravo Diseño">
                        </div></a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li><a href="../vistas/index.php">Inicio</a></li>

                                
                                <?php if( isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ) {?>
                                    <li><a href="../vistas/checkout.php">Carrito</a></li>
                                <?php } ?>
                                    
                             <li ><a href="../vistas/catalogo.php">Catálogo</a></li>
                                <li>
                                    <a >Nosotros</a>
                                    <ul class="sub-menu">
                                    <li><a href="../vistas/contact.php">Contáctanos</a></li>
                                        <li><a href="../vistas/about-us.php">Conócenos</a></li>
                                        <li><a href="../vistas/testimonials.php">Testimonios</a></li>
                                        <li><a href="../vistas/terms.php">Tips & más</a></li>
                                        <li><a href="../vistas/terminos.php">Terminos</a></li>                                        
                                        
                                    </ul>
                                </li>

                                <li>
                                     <?php if( isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) )
                                    {
                                    ?>
                                    <a><?php echo $_SESSION["nombre"] ?></a>
                                  <ul class="sub-menu">
                                  <li><a href="detalle_user.php"><span class="glyphicon glyphicon-user"></span>Mis datos</a></li>
                                   <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Cerrar sesión</a></li>
                                   </ul>
                                     <?php }else{ ?>
                                       
                                   <a>Login</a>
                                    <ul class="sub-menu">
                                    
                                    <li><a href="loginCliente.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                                    <li><a onclick="mostrarRegForm()"><span class="glyphicon glyphicon-user"></span> Registrate</a></li>
                                    
                                  
                                    </ul>
                                     <?php } ?>

                                </li>
                                
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>
  </nav> 
