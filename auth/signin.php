<?php include ('../backend/loginUser.php'); ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Zando-Commerce</title>
    <script src="https://kit.fontawesome.com/e147eaff6b.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="py-4 bg-body-tertiary">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <a href="../index.php"><img src="../assets/img/logo1.png" class="img-fluid" alt="Sample image"></a>
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <h1 class="lead fw-normal mb-0 me-3">Connexion avec</h1>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-floating mx-1" style="background-color: #F07423;color: white">
                                <i class="fa-brands fa-facebook"></i>
                            </button>

                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-floating mx-1" style="background-color: #F07423;color: white">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-floating mx-1" style="background-color: #F07423;color: white">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0"></p>
                        </div>
                        <?php if (isset($msgErrors)) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <?= $msgErrors ?> <a href="logout.php">Voulez-vous vous
                                déconnecter ?</a>
                        </div>
                        <?php } elseif (isset($msgError)) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <?= $msgError ?>
                        </div>
                        <?php } ?>
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Entrez votre adresse mail" />
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" name="mdp" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Entrez votre mot de passe" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Se souvenir de moi
                                </label>
                            </div>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2 mb-4">
                            <button type="submit" name="login" class="btn btn-primary btn-sm"
                                style="padding-left: 1.5rem; padding-right: 1.5rem;background-color: #F07423; boder:none;">Connexion</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">vous n'avez pas de compte ? <a href="signup.php"
                                    class="link-danger">S'inscrire</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5"
            style="background-color: #F07423;color: white">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>