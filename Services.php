<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RideHub - Services</title>
    <link rel="stylesheet" href="CSS/Services.css" />
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
              <a class="nav-link" href="Dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Booking.php">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About.php">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"
                >Services</a
              >
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

    <section class="services">
      <div class="container-fluid">
        <div class="uber-dots">
          <div class="uber-dot"></div>
          <div class="uber-dot"></div>
          <div class="uber-dot"></div>
          <div class="uber-dot"></div>
        </div>

        <div class="path-line"></div>
        <div class="path-line"></div>

        <div class="uber-car-icon">
          <i class="bi bi-geo-alt-fill"></i>
        </div>
        <h1 class="text-center fw-bold">Services</h1>
        <div class="flex">
          <a href="http://127.0.0.1:5501/Index.html">Home</a>
          <span>></span>
          <a href="" id="flex">Services</a>
        </div>
      </div>
    </section>

    <section class="service">
      <h3>Our Services</h3>
      <div class="container-lg">
        <div class="row gap-3 p-4">
          <div class="col border p-3">
            <img
              src="./Image/oneway.webp"
              alt=""
              width="300px"
              loading="lazy"
            />
            <h4>One Way Taxi</h4>
            <p>
              Get to your destination promptly and comfortably with our One Way
              service. Whether it's a quick trip or a longer journey, enjoy a
              smooth and reliable ride with our professional drivers.
            </p>
          </div>
          <div class="col border p-3">
            <img src="./Image/roundtrip.webp" alt="" loading="lazy" />
            <h4>Round Trip Taxi</h4>
            <p>
              Our Round Trip service ensures a hassle-free return journey. Ideal
              for business meetings, day trips, or events, travel comfortably
              both ways with our reliable taxi service.
            </p>
          </div>
          <div class="col border p-3">
            <img src="./Image/local.webp" alt="" loading="lazy" />
            <h4>Local Package</h4>
            <p>
              Our Local Package is perfect for errands, sightseeing, or local
              events. Get reliable transportation within a specific area,
              offering a convenient and cost-effective travel solution.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="package">
      <h3>Our Packages</h3>
      <div class="container-lg">
        <div class="row gap-3 p-4">
          <div class="col border p-4">
            <img src="./Image/ONEIH.webp" alt="" width="275px" loading="lazy" />
            <h4>One Innovation Hub</h4>
            <p>Starting at <del>N</del>1000</p>
            <a href="" class="button">Book Now</a>
          </div>
          <div class="col border p-4">
            <img
              src="./Image/Fedpoffa PS.jpeg"
              alt=""
              width="275px"
              loading="lazy"
            />
            <h4>FEDPOFFA PS</h4>
            <p>Starting at <del>N</del>1200</p>
            <a href="" class="button">Book Now</a>
          </div>
          <div class="col border p-4">
            <img
              src="./Image/FEDPOFFA.jpg"
              alt=""
              width="275px"
              loading="lazy"
            />
            <h4>FEDPOFFA Main Campus</h4>
            <p>Starting at <del>N</del>1000</p>
            <a href="" class="button">Book Now</a>
          </div>
        </div>

        <div class="row gap-3 p-4">
          <div class="col border p-4">
            <img src="./Image/Owu.jpeg" alt="" width="275px" loading="lazy" />
            <h4>Offa - Owu Waterfall</h4>
            <p>Starting at <del>N</del>4500</p>
            <a href="" class="button">Book Now</a>
          </div>
          <div class="col border p-4">
            <img src="./Image/Esie.jpg" alt="" width="275px" loading="lazy" />
            <h4>Offa - Esie Museum</h4>
            <p>Starting at <del>N</del>3000</p>
            <a href="" class="button">Book Now</a>
          </div>
          <div class="col border p-4">
            <img
              src="./Image//Ikogosi.jpg"
              alt=""
              width="300px"
              loading="lazy"
            />
            <h4>Offa - Ikogusi Warm & Cold</h4>
            <p>Starting at <del>N</del>5500</p>
            <a href="" class="button">Book Now</a>
          </div>
        </div>

        <div class="row gap-3 p-4">
          <div class="col border p-4">
            <img src="./Image/KWASU.jpeg" alt="" width="275px" loading="lazy" />
            <h4>Offa - KWASU</h4>
            <p>Starting at <del>N</del>2000</p>
            <a href="" class="button">Book Now</a>
          </div>
          <div class="col border p-4">
            <img src="./Image/ilorin.jpg" alt="" width="275px" loading="lazy" />
            <h4>Offa - Ilorin</h4>
            <p>Starting at <del>N</del>2500</p>
            <a href="" class="button">Book Now</a>
          </div>
          <div class="col border p-4">
            <img src="./Image/Minna.jpg" alt="" width="275px" loading="lazy" />
            <h4>Offa - Minna</h4>
            <p>Starting at <del>N</del>15000</p>
            <a href="" class="button">Book Now</a>
          </div>
        </div>
      </div>
    </section>

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
              <li><a href="About.php">About</a></li>
              <li><a href="Booking.php">Booking</a></li>
              <li><a href="#">Our Services</a></li>
              <li><a href="Vehicle.php">Our Vehicles</a></li>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
