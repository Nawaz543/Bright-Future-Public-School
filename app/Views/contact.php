<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us | Bright Future Public School</title>
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  <!-- Header/Navbar -->
  <header class="site-header">
    <div class="container header-inner">
      <a class="brand" href="/">
        <img src="images/logo.webp" alt="Bright Future Public School Logo" class="logo">
        <span class="brand-text">Bright Future Public School</span>
      </a>
      <div class="actions">
        <button id="theme-toggle" class="btn-icon" aria-label="Toggle dark mode">🌙</button>
      </div>
    </div>
    <div class="container header-inner nav-links">
      <a href="#form">Contact Form</a>
      <a href="/about">About Us</a>
      <a href="/academics">Academic</a>
      <a href="/notice">Notice & Events</a>
      <a href="/admission">Admission</a>
      <a href="/co-curricular">Co-Curricular Activity</a>
      <a href="/student">Student's Corner</a>
    </div>
  </header>

  <!-- Contact Page Content -->
  <main class="container contact-page">
    <h1>Contact Us</h1>
    <p class="intro">We’re here to answer your questions. Reach out to us through the details below.</p>

    <div class="contact-grid">
      <!-- Left: School Info -->
      <div class="contact-info">
        <h2>Bright Future Public School</h2>
        <p><strong>Address:</strong> Alagdiha, Pabra Road, Pelawal, Hazaribagh, Jharkhand</p>
        <p><strong>Phone:</strong> Office: +91 7352 787 879 </p>
        <p><strong>Email:</strong> info@school.com</p>
        <p><strong>Office Hours:</strong> Mon – Sat, 9:00 AM – 3:00 PM</p>
      </div>

      <!-- Right: Map -->
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3644.2758731741537!2d85.33827099999999!3d24.021335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDAxJzE2LjgiTiA4NcKwMjAnMTcuOCJF!5e0!3m2!1sen!2sin!4v1757260865682!5m2!1sen!2sin"
          width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>

    <!-- Quick Contact Form -->
    <section class="contact-form">
      <h2>Quick Contact Form</h2>
      <?php if(session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
      <form id="form" action="<?= site_url('/contact/store') ?>" method="post" enctype="multipart/form-data">
        <label>Name* <input type="text" name="name" required></label>
        <label>Email* <input type="email" name="email" required></label>
        <label>Phone <input type="tel" name="phone"></label>
        <label>Message* <textarea name="message" required></textarea></label>
        <button type="submit" class="btn primary">Send Message</button>
      </form>
    </section>

    <!-- Social Media -->
<!-- Social Media -->
<section class="social">
  <h2>Connect With Us</h2>
  <div class="social-icons">
    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/bright.future_school1?igsh=MTNyaHg3MG0xNWg1dw==" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
    <a href="https://wa.me/917352787879" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
  </div>
</section>


    <!-- Emergency Notes -->
    <section class="notes">
      <p><strong>Note:</strong> For admission-related queries, kindly call between 9 AM – 2 PM only.</p>
      <p>In case of urgent issues, please contact the school office directly.</p>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <p>We look forward to welcoming you to Bright Future Public School.</p>
  </footer>

  <!-- JS -->
  <script>
    // Dark Mode Toggle
    const toggleBtn = document.getElementById("theme-toggle");
    toggleBtn.addEventListener("click", () => {
      const html = document.documentElement;
      const theme = html.getAttribute("data-theme");
      html.setAttribute("data-theme", theme === "light" ? "dark" : "light");
    });
  </script>
</body>
</html>
