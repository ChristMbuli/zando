<?php require ('../backend/verifyUser.php') ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Zando-Commerce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <meta name="theme-color" content="#712cf9">

    <link rel="stylesheet" href="login.css">
</head>

<body class="py-4 bg-body-tertiary">

    <section class="vh-80 gradient-custom">
        <div class="container py-3 h-75">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <a href="../"><img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt=""
                                    width="72" height="57"></a>
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Déconnexion</h3>
                            <form method="post">

                                <div class="row">
                                    <div class="col-md-12 mb-4">

                                        <div class="form-outline">
                                            <input type="email" name="email" class="form-control form-control-lg"
                                                required />
                                            <label class="form-label">email</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-danger btn-lg" type="submit">Déconnexion</button>
                                </div>
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