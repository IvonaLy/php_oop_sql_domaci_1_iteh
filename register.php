<?php

    include 'loginregister.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>
<body>
            <!-- Section: Design Block -->
        <section class="text-center text-lg-start">
        <style>
            .cascading-right {
            margin-right: -50px;
            }

            @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
            }
            .mask-custom {
            backdrop-filter: blur(5px);
            background-color: rgba(178, 60, 253, 0.2);
            }
        </style>

        <!-- Jumbotron -->
        <div class="container py-4">
            <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right" style="
                    background: hsla(0, 0%, 100%, 0.55);
                    backdrop-filter: blur(30px);
                    ">
                <div class="card-body p-5 shadow-5 text-center">
                    <h2 class="fw-bold mb-5">Sign up now</h2>
                    <form method="post"> 
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text"   class="form-control" id="ime" name="ime"/>
                            <label class="form-label" for="form3Example1">First name</label>
                        </div>
                        </div>
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text"   class="form-control" id="prezime" name="prezime" />
                            <label class="form-label" for="form3Example2">Last name</label>
                        </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email"   class="form-control" id="emailR" name="emailR" />
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password"   class="form-control" id="passR" name="passR"/>
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>
 

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4" id="register" name="register">
                        Sign up
                    </button>

                 
                    </form>
                </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
                alt="" />
            </div>
            </div>
        </div>
        <!-- Jumbotron -->
        </section>
        <!-- Section: Design Block -->


        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>
</html>