<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Portfolio Details</title>
  
  <?php
    $canonical = "https://ahmnanzil.me/portfolio-details.php";
    if (isset($_GET['name'])) {
      $canonical .= "?name=" . urlencode($_GET['name']);
    }
  ?>
  <link rel="canonical" href="<?= $canonical ?>" />

  <!-- Favicons -->
  <link href="assets/img/web-developer-icon-10.jpg" rel="icon">
  <link href="assets/img/software_developer.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      --light-bg: #f8fafc;
      --card-shadow: 0 20px 40px rgba(0,0,0,0.1);
      --hover-shadow: 0 30px 60px rgba(0,0,0,0.15);
      --text-primary: #2d3748;
      --text-secondary: #718096;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--primary-gradient);
      min-height: 100vh;
    }

    /* Breadcrumbs */
    #breadcrumbs {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      padding: 30px 0;
    }

    #breadcrumbs h2 {
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 700;
      font-size: 2.5rem;
      margin: 0;
    }

    #breadcrumbs ol li a {
      color: var(--text-secondary);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    #breadcrumbs ol li a:hover {
      background: var(--accent-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Main Content */
    #main {
      background: var(--light-bg);
      min-height: calc(100vh - 200px);
      position: relative;
      overflow: hidden;
    }

    #main::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        radial-gradient(circle at 20% 20%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(245, 87, 108, 0.1) 0%, transparent 50%);
      pointer-events: none;
    }

    .portfolio-details {
      padding: 80px 0;
      position: relative;
      z-index: 1;
    }

    /* Image Slider */
    .portfolio-details-slider {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: var(--card-shadow);
      background: white;
      position: relative;
      transition: all 0.3s ease;
      margin-bottom: 30px;
    }

    .portfolio-details-slider:hover {
      box-shadow: var(--hover-shadow);
      transform: translateY(-5px);
    }

    .portfolio-details-slider::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: var(--primary-gradient);
      z-index: 10;
    }

    .portfolio-details-slider img {
      width: 100%;
      height: 500px;
      object-fit: cover;
    }

    .swiper-pagination-bullet {
      width: 12px;
      height: 12px;
      background: rgba(255, 255, 255, 0.5);
      opacity: 1;
      transition: all 0.3s ease;
    }

    .swiper-pagination-bullet-active {
      background: var(--primary-gradient);
      transform: scale(1.2);
    }

    /* Navigation Buttons */
    .swiper-button-next, .swiper-button-prev {
      color: #667eea !important;
      background: rgba(255, 255, 255, 0.9);
      width: 50px !important;
      height: 50px !important;
      border-radius: 50%;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }

    .swiper-button-next:hover, .swiper-button-prev:hover {
      background: rgba(255, 255, 255, 1);
      transform: scale(1.1);
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .swiper-button-next::after, .swiper-button-prev::after {
      font-size: 18px !important;
      font-weight: bold;
    }

    /* Enhanced Project Information Design */
    .portfolio-info {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 30px;
      padding: 50px;
      box-shadow: var(--card-shadow);
      border: 1px solid rgba(255, 255, 255, 0.3);
      position: relative;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      animation: fadeInUp 0.6s ease-out forwards;
      opacity: 0;
      transform: translateY(30px);
      height: fit-content;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .portfolio-info:hover {
      box-shadow: var(--hover-shadow);
      transform: translateY(-10px) scale(1.02);
    }

    .portfolio-info::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 6px;
      background: var(--secondary-gradient);
      border-radius: 30px 30px 0 0;
    }

    .portfolio-info h3 {
      color: var(--text-primary);
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 35px;
      text-align: center;
      position: relative;
      padding-bottom: 20px;
      background: var(--primary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: textShimmer 2s ease-in-out infinite alternate;
    }

    .portfolio-info h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: var(--primary-gradient);
      border-radius: 2px;
      animation: expandLine 0.8s ease-out 0.6s both;
    }

    /* Circular Info Cards */
    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 25px;
      margin-top: 20px;
    }

    .info-card {
      background: linear-gradient(145deg, rgba(255,255,255,0.9), rgba(240,245,255,0.7));
      border-radius: 25px;
      padding: 25px;
      text-align: center;
      position: relative;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      border: 2px solid transparent;
      cursor: pointer;
      animation: slideInScale 0.6s ease-out forwards;
      opacity: 0;
      transform: scale(0.8) translateY(20px);
    }

    .info-card:nth-child(1) { animation-delay: 0.1s; }
    .info-card:nth-child(2) { animation-delay: 0.2s; }
    .info-card:nth-child(3) { animation-delay: 0.3s; }
    .info-card:nth-child(4) { animation-delay: 0.4s; }

    .info-card:hover {
      transform: translateY(-8px) scale(1.05);
      border: 2px solid rgba(102, 126, 234, 0.3);
      box-shadow: 0 15px 35px rgba(102, 126, 234, 0.2);
    }

    .info-card::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: conic-gradient(transparent, rgba(102, 126, 234, 0.1), transparent 30%);
      animation: rotate 4s linear infinite;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .info-card:hover::before {
      opacity: 1;
    }

    .info-icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--primary-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
      font-size: 24px;
      color: white;
      position: relative;
      z-index: 2;
      transition: all 0.3s ease;
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    .info-card:hover .info-icon {
      transform: scale(1.1) rotate(360deg);
      box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
    }

    .info-label {
      font-weight: 600;
      color: #667eea;
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 8px;
      position: relative;
      z-index: 2;
    }

    .info-value {
      color: var(--text-primary);
      font-weight: 500;
      font-size: 1rem;
      line-height: 1.4;
      position: relative;
      z-index: 2;
    }

    .info-value a {
      color: #764ba2;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      position: relative;
    }

    .info-value a:hover {
      color: #667eea;
    }

    .info-value a::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--primary-gradient);
      transition: width 0.3s ease;
    }

    .info-value a:hover::after {
      width: 100%;
    }

    /* Enhanced Project Description */
    .portfolio-description {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 30px;
      padding: 50px;
      box-shadow: var(--card-shadow);
      border: 1px solid rgba(255, 255, 255, 0.3);
      position: relative;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      animation: slideInFromBottom 0.8s ease-out forwards;
      opacity: 0;
      transform: translateY(50px);
      margin-top: 40px;
    }

    .portfolio-description:hover {
      box-shadow: var(--hover-shadow);
      transform: translateY(-8px);
    }

    .portfolio-description::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 6px;
      background: var(--accent-gradient);
      border-radius: 30px 30px 0 0;
    }

    .portfolio-description h2 {
      color: var(--text-primary);
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 30px;
      text-align: center;
      position: relative;
      padding-bottom: 20px;
      background: var(--accent-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: textShimmer 2s ease-in-out infinite alternate;
    }

    .portfolio-description h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 4px;
      background: var(--accent-gradient);
      border-radius: 2px;
      animation: expandLine 0.8s ease-out 0.8s both;
    }

    /* Animated Text Effect */
    .portfolio-description p {
      color: var(--text-secondary);
      line-height: 1.8;
      font-size: 1.1rem;
      margin: 0;
      text-align: justify;
      animation: typeWriter 1.5s ease-out 1s both;
      opacity: 0;
      position: relative;
    }

    .portfolio-description .description-animation {
      position: relative;
      overflow: hidden;
    }

    .portfolio-description .description-animation::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.8) 50%, transparent 100%);
      animation: shimmer 2s ease-in-out 1.2s;
      z-index: 1;
    }

    /* Responsive Container for Vertical Alignment */
    .portfolio-info-container {
      display: flex;
      align-items: center;
      min-height: 530px;
    }

    @media (max-width: 991px) {
      .portfolio-info-container {
        min-height: auto;
        margin-top: 0;
      }
      
      .info-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }
      
      .portfolio-info, .portfolio-description {
        padding: 30px;
      }
    }

    /* Floating Elements */
    .floating-element {
      position: absolute;
      pointer-events: none;
      z-index: 0;
    }

    .floating-circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: rgba(102, 126, 234, 0.1);
      animation: float 6s ease-in-out infinite;
    }

    .floating-square {
      width: 60px;
      height: 60px;
      background: rgba(245, 87, 108, 0.1);
      transform: rotate(45deg);
      animation: float 8s ease-in-out infinite reverse;
    }

    /* Animations */
    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(180deg); }
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInFromBottom {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInScale {
      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    @keyframes textShimmer {
      0% { filter: hue-rotate(0deg); }
      100% { filter: hue-rotate(15deg); }
    }

    @keyframes expandLine {
      from {
        width: 0;
      }
      to {
        width: 80px;
      }
    }

    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    @keyframes typeWriter {
      to {
        opacity: 1;
      }
    }

    @keyframes shimmer {
      0% { transform: translateX(-100%); }
      100% { transform: translateX(100%); }
    }

    /* Error State */
    .project-not-found {
      text-align: center;
      padding: 100px 20px;
      background: white;
      border-radius: 20px;
      box-shadow: var(--card-shadow);
      margin: 50px auto;
      max-width: 600px;
    }

    .project-not-found h3 {
      color: var(--text-primary);
      font-size: 2rem;
      margin-bottom: 20px;
      background: var(--secondary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Responsive */
    @media (max-width: 768px) {
      #breadcrumbs h2 { font-size: 2rem; }
      .portfolio-details { padding: 40px 0; }
      .portfolio-info, .portfolio-description { padding: 25px; }
      .portfolio-details-slider img { height: 300px; }
      .info-card { padding: 20px; }
      .info-icon { width: 50px; height: 50px; font-size: 20px; }
    }
  </style>
</head>

<body>
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- Header -->
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="assets/img/profile.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Ahm Nanzil</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://x.com/ahm_nanzil" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/ahm_nanzil77?igsh=MWxta3pxano1N3RrbQ==" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="https://www.linkedin.com/in/ahmnanzil" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.html#hero" class="nav-link"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="index.html#about" class="nav-link"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="index.html#resume" class="nav-link"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="index.html#portfolio" class="nav-link"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="index.html#services" class="nav-link"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="index.html#contact" class="nav-link"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="main">
    <!-- Breadcrumbs -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfolio Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
          </ol>
        </div>
      </div>
    </section>

    <!-- Floating Elements -->
    <div class="floating-element floating-circle" style="top: 10%; left: 5%;"></div>
    <div class="floating-element floating-square" style="top: 60%; right: 10%;"></div>
    <div class="floating-element floating-circle" style="bottom: 20%; left: 20%; width: 60px; height: 60px;"></div>

    <!-- Portfolio Details -->
    <section id="portfolio-details" class="portfolio-details">
      <?php
      $jsonData = file_get_contents('projects.json');
      $projects = json_decode($jsonData, true);
      $name = $_GET['name'] ?? '';
      $project = null;
      
      foreach ($projects as $p) {
          if ($p['name'] === $name) {
              $project = $p;
              break;
          }
      }

      if (!$project) {
          echo '<div class="container"><div class="project-not-found">';
          echo '<h3>Project not found!</h3>';
          echo '<p>The project you are looking for does not exist or has been moved.</p>';
          echo '</div></div>';
          exit;
      }
      ?>

      <div class="container">
          <div class="row gy-4">
              <div class="col-lg-8">
                  <div class="portfolio-details-slider swiper">
                      <div class="swiper-wrapper align-items-center">
                          <?php
                          foreach ($project['images'] as $image) {
                              echo '<div class="swiper-slide"><img src="' . $image . '" alt="Project Image"></div>';
                          }
                          ?>
                      </div>
                      <div class="swiper-pagination"></div>
                      <div class="swiper-button-next"></div>
                      <div class="swiper-button-prev"></div>
                  </div>
              </div>

              <div class="col-lg-4">
                  <div class="portfolio-info-container">
                      <div class="portfolio-info">
                          <h3>Project Information</h3>
                          <div class="info-grid">
                              <div class="info-card">
                                  <div class="info-icon">
                                      <i class="bx bx-category"></i>
                                  </div>
                                  <div class="info-label">Category</div>
                                  <div class="info-value"><?= $project['category'] ?></div>
                              </div>
                              <div class="info-card">
                                  <div class="info-icon">
                                      <i class="bx bx-user"></i>
                                  </div>
                                  <div class="info-label">Client</div>
                                  <div class="info-value"><?= $project['client'] ?></div>
                              </div>
                              <div class="info-card">
                                  <div class="info-icon">
                                      <i class="bx bx-link-external"></i>
                                  </div>
                                  <div class="info-label">Project URL</div>
                                  <div class="info-value">
                                      <a href="<?= $project['url'] ?>" target="_blank">Visit Site</a>
                                  </div>
                              </div>
                              <div class="info-card">
                                  <div class="info-icon">
                                      <i class="bx bx-calendar"></i>
                                  </div>
                                  <div class="info-label">Completed</div>
                                  <div class="info-value"><?= $project['time'] ?></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-12">
                  <div class="portfolio-description">
                      <h2>Project Overview</h2>
                      <div class="description-animation">
                          <p><?= $project['description'] ?></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer id="footer">
      <div class="container">
        <div class="copyright">Thank <strong><span>You</span></strong></div>
        <div class="credits">For Visiting <a href="http://ahmnanzil.great-site.net">My Portfolio</a></div>
      </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Scripts -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

  <script>
    // Initialize Swiper
    document.addEventListener('DOMContentLoaded', function() {
      const swiper = new Swiper('.portfolio-details-slider', {
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        effect: 'slide',
        speed: 600,
        breakpoints: {
          320: {
            slidesPerView: 1,
            spaceBetween: 0
          },
          768: {
            slidesPerView: 1,
            spaceBetween: 0
          },
          1024: {
            slidesPerView: 1,
            spaceBetween: 0
          }
        }
      });
    });
  </script>
</body>
</html>