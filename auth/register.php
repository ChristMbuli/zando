<?php
include ('../backend/registerUser.php');
include ('../components/head.php');
?>
<section class="vh-80 gradient-custom">
    <div class="container py-3 h-75">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <a href="../"><img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt=""
                                width="72" height="57"></a>
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Inscription</h3>
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="name" class="form-control form-control-lg" />
                                        <label class="form-label">Votre nom ou nom de la
                                            boutique</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <input type="text" class="form-control form-control-lg" name="phone" />
                                        <label class="form-label">Numéro télephone</label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" class="form-control form-control-lg" name="email" required />
                                        <label class="form-label">Votre email</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <h6 class="mb-2 pb-1">Vous êtes ?:</h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="customer" type="radio" name="role"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Acheteur
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="seller" type="radio" name="role"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Vendeur
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="file" name="profil" class="form-control form-control-lg" />
                                        <label class="form-label">Image profil</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4 d-flex align-items-center">
                                <div class="form-outline datepicker w-100">
                                    <input type="password" class="form-control form-control-lg" name="mdp" />
                                    <label class="form-label">Mot de passe</label>
                                </div>

                            </div>

                            <div class="mt-4 pt-2">
                                <button name="register" class="btn btn-primary btn-lg"
                                    type="submit">Inscription</button>
                            </div>
                            <a href="login.php">Vous avez un compte ?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</body>

</html>