<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DryDock - Login</title>

 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet"
      href="<?= base_url('app/Modules/Auth/Views/css/login.css') ?>">
 

</head>

<body class="d-flex flex-column min-vh-100">
<main class="flex-grow-1">
 
<div class="login-container">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card border-0 overflow-hidden">

                    <div class="row g-0">

                        <!-- Left Illustration -->
                        <div class="col-lg-6 illustration d-flex align-items-center justify-content-center p-5">

                            <img
                                src="/assets/images/drydock-logo.png"
                                class="img-fluid logo-auth"
                                alt="DryDock Logo">

                        </div>

                        <!-- Login Form -->
                        <div class="col-lg-6 p-5">

                            <div class="text-center mb-4">
                                <h2 class="fw-bold">
                                    Sign In
                                </h2>

                                <p class="text-muted mb-0">
                                    Welcome to DryDock
                                </p>
                            </div>

                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('auth/attemptLogin') ?>" method="post">
                               <?= csrf_field() ?>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Email Address
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control form-control-lg"
                                        placeholder="Enter your email"
                                        value="<?= old('email') ?>"
                                        required>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control form-control-lg"
                                        placeholder="Enter your password"
                                        required>

                                </div>

                                <div class="form-check mb-4">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="remember">

                                    <label
                                        class="form-check-label"
                                        for="remember">

                                        Remember me

                                    </label>

                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg w-100">

                                    Login

                                </button>
                                
                                <div class="text-center mt-3">
                                    <a href="<?= base_url('auth/forgot-password') ?>">
                                        Forgot Password?
                                    </a>
                                </div>

                                <div class="text-center mt-4">

                                    <p class="mb-0">

                                        Don't have an account?

                                        <a href="<?= base_url('auth/register') ?>"
                                           class="fw-bold text-danger text-decoration-none">

                                            Register

                                        </a>

                                    </p>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
</main>

<footer class="bg-primary text-white py-3">

    <div class="container">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">

            <div>
                Copyright © 2026 DryDock.
                All rights reserved.
            </div>

            <div class="mt-2 mt-md-0">

                <a href="#" class="text-white mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="#" class="text-white mx-2">
                    <i class="fab fa-twitter"></i>
                </a>

                <a href="#" class="text-white mx-2">
                    <i class="fab fa-linkedin-in"></i>
                </a>

                <a href="#" class="text-white mx-2">
                    <i class="fab fa-instagram"></i>
                </a>

            </div>

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
