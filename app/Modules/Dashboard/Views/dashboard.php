<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DryDock</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
<?= file_get_contents(ROOTPATH . 'app/Modules/Dashboard/Views/css/dashboard.css'); ?>
</style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            🚢 DryDock
        </a>

        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#sale">
                        Sale
                    </a>
                </li>

                <a href="<?= base_url('purchase') ?>"
                class="btn btn-primary btn-lg">
                    Purchase
                </a>

                <li class="nav-item">
                    <a class="nav-link" href="#services">
                        Services
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        Contact
                    </a>
                </li>

            </ul>

            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">
                Logout
            </a>

        </div>

    </div>
</nav>

<!-- HERO -->
<section class="hero">

    <div class="hero-overlay"></div>

    <div class="container hero-content">

        <div class="row">

            <div class="col-lg-6">

                <div class="menu-box">

                    <div class="menu-icon">
                        ☰
                    </div>

                    <div class="menu-text">
                        MENU
                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <h1 class="hot-news">
                    HOT NEWS
                </h1>

                <h2 class="hero-title">
                    DryDock Global
                    Maritime Marketplace
                </h2>

            </div>

        </div>

        <div class="hero-buttons">

            <a href="#sale"
               class="btn btn-primary btn-lg">
                To Sell Ships
            </a>

            <a href="#purchase"
               class="btn btn-primary btn-lg">
                To Purchase Ships
            </a>

        </div>

        <div class="search-bar">

            <input type="text"
                   placeholder="Search vessel...">

            <button>
                Search
            </button>

        </div>

    </div>

</section>

<!-- SHIP FOR SALE -->
<section id="sale" class="sale-section">

    <div class="container">

        <h2>
            SHIP <span>for sale</span>
        </h2>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="ship-card">
                    <div class="ship-image"></div>
                    <h5>5045T Bulk Carrier</h5>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ship-card">
                    <div class="ship-image"></div>
                    <h5>2824 TEU Container</h5>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ship-card">
                    <div class="ship-image"></div>
                    <h5>4980T Deck Barge</h5>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- PURCHASE -->
<section id="purchase" class="purchase-section">

    <div class="container">

        <h2>
            SHIP <span>for purchase</span>
        </h2>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="purchase-card">

                    <h3>Container Ship</h3>

                    <p>
                        100 TEU Container Ship
                    </p>

                    <ul>
                        <li>Built Year: 1990-2026</li>
                        <li>Class: CCS</li>
                        <li>Area: A1+A2+A3</li>
                    </ul>

                    <button>
                        View Details
                    </button>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="purchase-card">

                    <h3>Bulk Carrier</h3>

                    <p>
                        13500T Bulk Carrier
                    </p>

                    <button>
                        View Details
                    </button>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="purchase-card">

                    <h3>Deck Barge</h3>

                    <p>
                        2000T Deck Barge
                    </p>

                    <button>
                        View Details
                    </button>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- SERVICES -->
<section id="services" class="services-section">

    <div class="container">

        <h2>
            SERVICES
        </h2>

        <div class="row g-4">

            <div class="col-lg">
                <div class="service-box">
                    Financing
                </div>
            </div>

            <div class="col-lg">
                <div class="service-box">
                    Valuation
                </div>
            </div>

            <div class="col-lg">
                <div class="service-box">
                    Inspection
                </div>
            </div>

            <div class="col-lg">
                <div class="service-box">
                    Delivery
                </div>
            </div>

            <div class="col-lg">
                <div class="service-box">
                    Import Export
                </div>
            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer id="contact">

    <div class="container">

        <div class="row">

            <div class="col-lg-4">
                <h4>About</h4>
                <p>DryDock Marketplace</p>
            </div>

            <div class="col-lg-4">
                <h4>Marketplace</h4>
                <p>Ships For Sale</p>
                <p>Ships Wanted</p>
            </div>

            <div class="col-lg-4">
                <h4>Contact</h4>
                <p>info@drydock.com</p>
            </div>

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>