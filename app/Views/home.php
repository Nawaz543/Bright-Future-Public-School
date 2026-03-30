<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bright Future Public School</title>
  <link rel="stylesheet" href="<?= base_url('css/home.css')?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="light">

  <!-- ===== Top Navbar ===== -->
  <div class="top-nav">
    <div class="left">
      <span><i class="fa fa-envelope"></i> info@gmail.com</span>
      <span><i class="fa fa-phone"></i> +91 7352787879</span>
    </div>
    <div class="center">
      <button id="theme-toggle" aria-label="Toggle theme">
        <i class="fa-solid fa-moon" title="Theme Toggle"></i>
      </button>
      <a href="/loginSignup" id="login" class="login-btn">
        <i class="fa-solid fa-user" title="Login"></i>
      </a>

    </div>
    <div class="right">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="https://www.instagram.com/bright.future_school1" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
  </div>

  <!-- ===== Mid Navbar ===== -->
  <div class="mid-nav">
    <div class="logo-box">
      <img src="<?= base_url('images/logo.webp')?>" alt="Logo" class="logo">
    </div>
    <div class="school-title-center">
      <h2>Bright Future Public School</h2>
      <p>Alagdiha, Pabra Road, Pelawal, Hazaribagh, Jharkhand</p>
      <p>A Co-Educational, English Medium School</p>
    </div>
  </div>

  <!-- ===== Main Navbar ===== -->
  <nav class="main-nav">
    <a href="/">Home</a>
    <a href="/about">About Us</a>
    <a href="/academics">Academic</a>
    <a href="/notice">Notice & Events</a>
    <a href="/admission">Admission</a>
    <a href="/co-curricular">Co-Curricular</a>
    <div class="dropdown">
      <a href="#">EduConnect ▾</a>
      <div class="dropdown-content">
        <a href="/student">Student's Corner</a>
        <a href="/teacher" onclick="showMessage(event)">Teacher's Corner</a>
      </div>
    </div>
    <a href="/contact">Contact Us</a>
  </nav>

  <!-- ===== Hero Carousel ===== -->
  <div class="carousel">
    <div class="carousel-text">
      <h1>Welcome to Bright Future Public School</h1>
      <a href="/admission#apply" class="btn-enroll">Enroll Now</a>
    </div>
    <div class="slides">
      <div class="slide active" style="background-image:url('<?= base_url('images/school2.webp')?>')"></div>
      <div class="slide" style="background-image:url('<?= base_url('images/school4.webp')?>')"></div>
      <div class="slide" style="background-image:url('<?= base_url('images/school5.webp')?>')"></div>
      <div class="slide" style="background-image:url('<?= base_url('images/school4.webp')?>')"></div>
      <div class="slide" style="background-image:url('<?= base_url('images/school5.webp')?>')"></div>
    </div>
    <button class="arrow left">&#10094;</button>
    <button class="arrow right">&#10095;</button>
  </div>

  <!-- ===== Wave Divider ===== -->
  <div class=title_property  style="background-image:url('<?= base_url("images/background.gif") ?>')">
   <div class='wave' >
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1674d3ff" fill-opacity="0.8" d="M0,224L24,224C48,224,96,224,144,229.3C192,235,240,245,288,256C336,267,384,277,432,261.3C480,245,528,203,576,165.3C624,128,672,96,720,106.7C768,117,816,171,864,176C912,181,960,139,1008,144C1056,149,1104,203,1152,229.3C1200,256,1248,256,1296,250.7C1344,245,1392,235,1416,229.3L1440,224L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0066cc" fill-opacity="0.8" d="M0,128L24,117.3C48,107,96,85,144,80C192,75,240,85,288,128C336,171,384,245,432,256C480,267,528,213,576,186.7C624,160,672,160,720,160C768,160,816,160,864,133.3C912,107,960,53,1008,69.3C1056,85,1104,171,1152,218.7C1200,267,1248,277,1296,261.3C1344,245,1392,203,1416,181.3L1440,160L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#044a91" fill-opacity="0.7" d="M0,288L24,288C48,288,96,288,144,272C192,256,240,224,288,218.7C336,213,384,235,432,218.7C480,203,528,149,576,149.3C624,149,672,203,720,208C768,213,816,171,864,176C912,181,960,235,1008,261.3C1056,288,1104,288,1152,266.7C1200,245,1248,203,1296,181.3C1344,160,1392,160,1416,160L1440,160L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>
  </div>

  <!-- ===== School Motto & Properties ===== -->
   
  <section class="school-title " >
    <h1>Bright Future Public School</h1>
    <div class="divider"><span>★ ★ ★</span></div>
    <p>Educating Today, Brightening Tomorrow’s Future</p>
  </section>

  <section class="properties " >
    <div class="card">
      <i class="fa fa-book"></i>
      <h2>Quality Education</h2>
      <p>Providing high-quality education with modern teaching methods and a nurturing environment.</p>
    </div>
    <div class="card">
      <i class="fa fa-handshake"></i>
      <h2>Affordable Education</h2>
      <p>Quality learning at low fees ensuring every child has access to education without burden.</p>
    </div>
    <div class="card">
      <i class="fa fa-chalkboard-teacher"></i>
      <h2>Individual Attention</h2>
      <p>Small class sizes so every child receives personal care and equal opportunities to excel.</p>
    </div>
  </section>
 </div>
  <!-- ===== About Section ===== -->
  <section class="about" id="about">
    <div class="about-left">
      <h1>About Us</h1>
      <p>Bright Future Public School, located at Alagdiha, Pabra Road, Pelawal, Hazaribagh, Jharkhand, is a private institution dedicated to shaping young minds from Nursery to Class VIII...</p>
      <p>We combine modern teaching with strong values, making education affordable & meaningful. <a href="/about">Read more...</a></p>
    </div>
    <div class="about-right">
      <img src='<?= base_url('images/school6.webp')?>' loading="lazy" alt="About School">
    </div>
  </section>

  <!-- ===== Important Section ===== -->
  <section class="important">
    <div class="card">
  <h3>Notice Board</h3>
  <p>Latest announcements and updates for students.</p>

  <ul class="notice-list">
    <?php if (!empty($notices)): ?>
        <?php foreach ($notices as $notice): ?>
            <li>
                
                <a href="<?= base_url($notice['file']) ?>" target="_blank"><?= esc($notice['title']) ?> </a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No notices available</li>
    <?php endif; ?>
  </ul>

  <button onclick="window.location.href='/notice'">View All</button>
</div>

    <div class="card falladd">
      <h2>Fall Admission</h2>
      <p>Admissions open for the new academic session.</p>
      <button onclick="window.location.href='/admission#apply'">Enroll Now</button>
      <p>Or</p>
      <h4 style="color:#0066cc;"><i class="fa fa-phone"></i> +91 7352787879</h4>
    </div>
    <div class="card">
      <h3>Events</h3>
      <p>Upcoming cultural, sports, and academic events.</p>
      <ul class="event-list">
    <?php if (!empty($events)): ?>
        <?php foreach ($events as $event): ?>
            <li>
                
                <a href="<?= base_url($event['file']) ?>" target="_blank"><?= esc($event['title']) ?> </a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No notices available</li>
    <?php endif; ?>
  </ul>
      <button onclick="window.location.href='/notice#event'">View All</button>
    </div>
  </section>

  <!-- ===== Footer ===== -->
  <footer>
    <div class="footer-top">
      <div class="card reach">
        <h2><u>Reach Us</u></h2>
        <h4>Bright Future Public School</h4>
        <p>Alagdiha, Pabra Road, Pelawal, Hazaribagh, Jharkhand (825301)</p>
        <p>Email: brightfuture@gmail.com</p>
        <p>Phone: +91 7352787879</p>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/bright.future_school1"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
      <div class="card">
        <h3>Important Links</h3>
        <a href="/">Home</a><br>
        <a href="/about">About Us</a><br>
        <a href="/academics">Academic</a><br>
        <a href="/notice">Notice & Events</a><br>
        <a href="/admission">Admission</a><br>
        <a href="/co-curricular">Co-Curricular</a><br>
        <a href="/student">Student's Corner</a><br>
        <a href="/teacher" onclick="showMessage(event)">Teacher's Corner</a><br>
        <a href="/contact">Contact Us</a>
      </div>
      <div class="card">
        <h3>Location</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3644.2758731741537!2d85.33827099999999!3d24.021335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDAxJzE2LjgiTiA4NcKwMjAnMTcuOCJF!5e0!3m2!1sen!2sin!4v1757260865682!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen loading="lazy"></iframe>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2025 Bright Future Public School | Designed by Md Shahnawaz</p>
    </div>
  </footer>

  <script >
    // home.js - theme + carousel + mobile dropdown
(function(){
  // ------------- Theme toggle (persisted) -------------
  const toggle = document.getElementById('theme-toggle');
  const icon = toggle?.querySelector('i');

  function applyTheme(theme){
    if(theme === 'dark') document.body.classList.add('dark');
    else document.body.classList.remove('dark');
    if(icon) icon.className = theme === 'dark' ? 'fa-solid fa-sun' : 'fa-solid fa-moon';
    try { localStorage.setItem('bfps-theme', theme); } catch(e){}
  }

  // set initial theme from localStorage or prefers-color-scheme
  const saved = (function(){ try { return localStorage.getItem('bfps-theme') } catch(e){ return null } })();
  if(saved) applyTheme(saved);
  else {
    const prefers = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    applyTheme(prefers);
  }

  if(toggle){
    toggle.addEventListener('click', function(){
      const nowDark = document.body.classList.toggle('dark');
      applyTheme(nowDark ? 'dark' : 'light');
    });
  }

  // ------------- Carousel (slides use .slide + .active) -------------
  document.addEventListener('DOMContentLoaded', function(){
    const slides = Array.from(document.querySelectorAll('.slide'));
    const prevBtn = document.querySelector('.arrow.left');
    const nextBtn = document.querySelector('.arrow.right');
    const carouselEl = document.querySelector('.carousel');
    if(!slides.length) return;

    let idx = 0;
    let intervalId = null;
    function show(index){
      slides.forEach((s, i) => {
        s.classList.toggle('active', i === index);
      });
      idx = index;
    }
    function nextSlide(){
      show((idx + 1) % slides.length);
    }
    function prevSlide(){
      show((idx - 1 + slides.length) % slides.length);
    }

    // arrows
    if(nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetAuto(); });
    if(prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetAuto(); });

    // auto play
    function startAuto(){ intervalId = setInterval(nextSlide, 10000); }
    function stopAuto(){ if(intervalId) { clearInterval(intervalId); intervalId = null; } }
    function resetAuto(){ stopAuto(); startAuto(); }

    startAuto();

    // pause on hover
    if(carouselEl){
      carouselEl.addEventListener('mouseenter', stopAuto);
      carouselEl.addEventListener('mouseleave', startAuto);
    }

    // ensure first slide visible
    show(0);
  });

  // ------------- mobile dropdown click toggle for EduConnect -------------
  (function(){
    const dropdown = document.querySelector('.dropdown');
    if(!dropdown) return;
    dropdown.addEventListener('click', function(e){
      // on small screens toggle open; on desktop leave hover behavior
      if(window.innerWidth <= 768){
        e.preventDefault();
        dropdown.classList.toggle('open');
      }
    });
    // if window resizes to larger, remove open class
    window.addEventListener('resize', () => { if(window.innerWidth > 768) dropdown.classList.remove('open') });
  })();

})();

// Dropdown toggle
document.addEventListener("DOMContentLoaded", () => {
  const dropdown = document.querySelector(".dropdown > a");

  dropdown.addEventListener("click", (e) => {
    e.preventDefault();
    dropdown.parentElement.classList.toggle("active");
  });

  // Optional: close dropdown if clicked outside
  document.addEventListener("click", (e) => {
    if (!dropdown.parentElement.contains(e.target)) {
      dropdown.parentElement.classList.remove("active");
    }
  });
});

 // on construction massage
    function showMessage(event) {
      event.preventDefault(); // stop link from opening
      alert("🚧 Page is under construction!");
    }

  </script>
</body>
</html>
