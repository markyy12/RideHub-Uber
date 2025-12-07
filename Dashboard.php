<?php
session_start();
if (!isset($_SESSION["user_id"])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="CSS/Dashboard.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light ms-sticky-top">
      <div class="container">
        <h2 class="brand">RideHub</h2>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav px-3 ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Dashboard.php"
                >Dashboard</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Booking.php">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About.php">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Vehicle.php">Vehicles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="btnn">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="hero-section">
      <div class="container-lg">
        <div class="welcome-card">
          <div class="row align-items-center">
            <div class="col-md-8">
              <div class="user-avatar-large">U</div>
              <h1>Welcome, <span><?= $_SESSION['username'] ?>!</span></h1>
              <p class="mb-0">
                Ready for your next journey? Book a ride or view your ride
                history below.
              </p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
              <a href="Booking.html" class="btn btn-light btn-lg">
                <i class="bi bi-plus-circle me-2"></i>Book New Ride
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container-lg">
      <div class="row mb-4 p-4">
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-icon rides">
              <i class="bi bi-car-front"></i>
            </div>
            <div class="stat-value">0</div>
            <div class="stat-name">Total Rides</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-icon saved">
              <i class="bi bi-bookmark-heart"></i>
            </div>
            <div class="stat-value">0</div>
            <div class="stat-name">Saved Locations</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="stat-card">
            <div class="stat-icon wallet">
              <i class="bi bi-wallet2"></i>
            </div>
            <div class="stat-value">0</div>
            <div class="stat-name">Wallet Balance</div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-lg">
      <div class="row p-4">
        <div class="col-lg-8">
          <div class="book-card">
            <h3><i class="bi bi-lightning-charge"></i>Quick Book</h3>
            <a href="Booking.html" class="book-option">
              <div class="icon">
                <i class="bi bi-signpost"></i>
              </div>
              <div>
                <strong>One-way Trip</strong>
                <p class="muted">Book a single journey</p>
              </div>
            </a>
            <a href="Booking.html" class="book-option">
              <div class="icon">
                <i class="bi bi-signpost-2"></i>
              </div>
              <div>
                <strong>Round Trip</strong>
                <p class="muted">Book a round journey</p>
              </div>
            </a>
            <a href="Booking.html" class="book-option">
              <div class="icon">
                <i class="bi bi-box-seam"></i>
              </div>
              <div>
                <strong>Package Delivery</strong>
                <p class="muted">Send your package across town</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="saved-section">
            <div class="saved-header">
              <h4><i class="bi bi-bookmark me-2"></i>Saved Places</h4>
            </div>
            <a href="Booking.html" class="book-option">
              <div class="icon">
                <i class="bi bi-house"></i>
              </div>
              <div>
                <strong>Home</strong>
                <p class="mb-0 text-muted"></p>
              </div>
            </a>
            <a href="Booking.html" class="book-option">
              <div class="icon">
                <i class="bi bi-briefcase"></i>
              </div>
              <div>
                <strong>Work</strong>
                <p class="mb-0 text-muted"></p>
              </div>
            </a>
            <a href="Booking.html" class="book-option">
              <div class="icon">
                <i class="bi bi-plus-circle"></i>
              </div>
              <div>
                <strong>Add New Location</strong>
                <p class="mb-0 text-muted">Save frequently visited places</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!--RECENTLY VISIED-->
    <div class="container lg">
      <div class="row p-4">
        <div class="col">
          <div class="book-card">
            <h3><i class="bi bi-clock-history me-2"></i>Recent Rides</h3>
            <a href="Booking.html" class="recent-option">
                <i class="bi bi-x-circle"></i>
              <div>
                <strong>You are yet to book a ride with us</strong>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12.col-md-6">
            <h2>RideHub</h2>
            <p class="text-justify">
              RideHub revolutionizes the way people navigate their daily
              commutes and spontaneous adventures by seamlessly integrating
              cutting-edge web Development technologies to deliver a
              user-friendly platforms that not only matches riders with reliable
              drivers in real time but also prioritizes safety through advanced
              geolocation features, eco-friendly ride options, and personalized
              pricing algorithms, all while fostering a community-driven
              ecosystem where efficiency meets excitement to transform every
              journey into an effortless and enjoyable experience.
            </p>
          </div>
          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="About.html">About</a></li>
              <li><a href="Booking.html">Booking</a></li>
              <li><a href="Services.html">Our Services</a></li>
              <li><a href="Vehicle.html">Our Vehicles</a></li>
            </ul>
          </div>
          <div class="col-xs-6 col-md-3">
            <h6>Address</h6>
            <address>
              <em>Behind Police Force Barrack, Offa, Kwara State.</em>
            </address>
          </div>
        </div>
        <hr />
      </div>
      <div class="container" id="copy">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">
              Copyright &copy; 2025 Developed By Markyy & Jamo-Lion
            </p>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li>
                <a
                  href="https://www.instagram.com/markyy_ij?igsh=M3RieWtkZnZ6anlh"
                  class="instagram"
                  ><i class="bi bi-instagram"></i
                ></a>
              </li>
              <li>
                <a
                  href="https://x.com/AIA_ijaiya?t=RV9rd1gFYhQf8jTwtTb9fQ&s=09"
                  class="twitter"
                  ><i class="bi bi-twitter-x"></i
                ></a>
              </li>
              <li>
                <a href="https://wa.me/+2348068736505" class="whatsapp"
                  ><i class="bi bi-whatsapp"></i
                ></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
