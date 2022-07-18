<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sether</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="../public/css/stylelogin.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="cont">
        <div class="demo">
            <div class="login">
                <div >
                    <!-- <img src="../public/img/logo.png" style="margin-top: 45%;" height="80%" width="80%" alt=""> -->
                </div>
                <form action="../config/auth.php" method="POST" class="container" id="form">
                    <div class="login__form">
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" name="nombre"  class="login__input name" placeholder="nombre" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                            </svg>
                            <input name="contraseña" type="password" class="login__input pass" placeholder="contraseña" />
                        </div>
                        <button id="login" type="submit" class="login__submit" >Sign in</button>
                        <p class="login__signup">Continue without account &nbsp;<a href="index.php">Here</a></p>
                    </div>
            
            
            
            
                </form>


                
            </div>

        </div>
    </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="../public/js/scripts.js"></script>

</body>

</html>