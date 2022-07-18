<!DOCTYPE html>
<html lang="en">
<?php
require "../config/conexion.php";
$query = "select*from users";
$query2 = "select*from data_products";

$resultado = mysqli_query($conexion, $query);

include 'head.php';

?>


<body>
<style>
        .productImg {
            height: 145px;
            width: fit-content;
            align-self: center;




        }

        .prodDesc {
            max-height: 70px;
            display: block;
            overflow: hidden;
        }
    </style>
    <!-- Navigation-->
    <?php
    include 'nav.php';

    ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">




                <h1 class="display-4 fw-bolder">
                    Welcome Back!
                </h1>





                <p class="lead fw-normal text-white-50 mb-0">Are you ready to shop?</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


                <?php

                $resultado2 = mysqli_query($conexion, $query2);
                foreach ($resultado2 as $row) {

                    echo '
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="productImg">
                            <img class="card-img-top productImg" src=" ' . $row['Link'] . ' " alt="..." />
                            </div>
                            
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">' . $row['Name'] . '</h5>
                                    <!-- Product price-->
                                    $' . $row['Price'] . '
                                </div>
                                <div class= "prodDesc">
                                ' . $row['Description'] . '
                                
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                            ';
                }





                ?>



            </div>
        </div>
    </section>
    <!-- Footer-->
    <?php
    include 'footer.php';

    include 'js.php';

    ?>
</body>

</html>