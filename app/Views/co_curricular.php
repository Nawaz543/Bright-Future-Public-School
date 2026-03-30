<!-- File: index.html -->
<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Co-Curricular Activities — Bright Future Public School</title>
  <link rel="stylesheet" href="css/co_curricular.css">
</head>
<body>
  <header class="site-header">
    <div class="container header-inner">
      <a class="brand" href="/">
        <img src="images/logo.webp" alt="Bright Future Public School Logo" class="logo">
        <span class="brand-text">Bright Future Public School</span>
      </a>

      <div class="actions">
        <button id="theme-toggle" class="btn-icon" aria-label="Toggle dark mode">🌙</button>
        <a class="btn primary" href="#admission">Enroll Now</a>
      </div>
    </div>
    <div class="container header-inner nav-row">
      <a href="#gallery">Gallery & Media</a>
      <a href="/about">About Us</a>
      <a href="/academics">Academic</a>
      <a href="/notice">Notice & Events</a>
      <a href="/admission">Admission</a>
      <a href="/student">Student's Corner</a>
      <a href="#contact">Contact Us</a>
    </div>
  </header>

  <main class="container page" id="top">
    <section class="hero card">
      <div class="hero-text">
        <h1>🌟 Co-Curricular Activities</h1>
        <p class="lead">Learning Beyond the Classroom — at Bright Future Public School we nurture creativity, teamwork, discipline and values so every child grows confident and well-rounded.</p>
      </div>
      <div class="hero-media" id="hero-media">
        <!-- If you don't have an image for the hero, remove the <img> element or leave the src empty. JS will hide this area automatically. -->
        <img src="images/school4.webp" alt="Gallery image 1" style="max-width:auto; max-height:auto;" loading="lazy"/>
      </div>
    </section>

    <section class="activities">
      <article class="activity card" id="games">
        <div class="activity-media">
          <img src="" alt="Children playing sports" loading="lazy"/>
        </div>
        <div class="activity-body">
          <h2>🎲 Games &amp; Sports</h2>
          <p>One dedicated period every week to encourage fitness, teamwork, and discipline. Activities include outdoor games, indoor challenges and age-appropriate exercises.</p>
        </div>
      </article>

      <article class="activity card" id="artcraft">
        <div class="activity-media">
          <img src="mediaPage/craft.webp" alt="Craft work display" loading="lazy"/>
        </div>
        <div class="activity-body">
          <h2>🎨 Art &amp; Craft</h2>
          <p>Creative expression through craft—part of every exam to test imagination along with academics. From drawing to model-making, we let students’ creativity shine.</p>
        </div>
      </article>

      <article class="activity card" id="gkquiz">
        <div class="activity-media">
          <!-- leave src empty or remove <img> if you do not have an image; it will be hidden automatically -->
          <img src="" alt="Students in GK quiz" loading="lazy"/>
        </div>
        <div class="activity-body">
          <h2>🧠 Daily GK Quiz</h2>
          <p>A short General Knowledge session every day to sharpen minds and keep students updated. Builds awareness, curiosity, and confidence in public speaking.</p>
        </div>
      </article>

      <article class="activity card" id="deenyat">
        <div class="activity-media">
          <img src="" alt="Deenyat class" loading="lazy"/>
        </div>
        <div class="activity-body">
          <h2>🌿 Deenyat (Moral &amp; Value Education)</h2>
          <p>One period every week dedicated to character-building, ethics, and spiritual learning. Aims to develop honesty, respect, and strong values in students.</p>
        </div>
      </article>

      <article class="activity card" id="performing">
        <div class="activity-media">
          <img src="" alt="Stage performance" loading="lazy"/>
        </div>
        <div class="activity-body">
          <h2>🎭 Performing Arts (Drama, Music &amp; Dance)</h2>
          <p>Special occasions like Independence Day, Teacher’s Day and Annual Functions become a stage for talent. Students perform plays, songs and dances celebrating culture and creativity.</p>
        </div>
      </article>
    </section>

    <section class="vision card">
      <h2>✨ Our Vision in Action</h2>
      <blockquote>"To create a future where every child, regardless of background, receives equal opportunity to learn and grow through affordable, value-based, and modern education."</blockquote>
      <p>Through co-curricular activities, we make sure every student not only learns but lives education—balancing academics with creativity, values, and confidence.</p>
    </section>

   <section class="media card" id="gallery">
  <h2>📷 Gallery & Media</h2>
  <p>Explore photos and videos showcasing life beyond books.</p>

  <div class="media-grid" id="media-grid">

    <?php
    // Separate arrays by type
    $images = array_filter($media, fn($item) => $item['type'] === 'image');
    $videos = array_filter($media, fn($item) => $item['type'] === 'video');
    $youtube = array_filter($media, fn($item) => $item['type'] === 'youTube');
    $instagram = array_filter($media, fn($item) => $item['type'] === 'instagram');

    // Render images
    foreach($images as $item): ?>
      <div class="media-item">
        <img src="<?= esc($item['path']) ?>" alt="Gallery image" loading="lazy" />
      </div>
    <?php endforeach; ?>

    <!-- Render videos -->
    <?php foreach($videos as $item): ?>
      <div class="media-item">
        <video preload="none" controls>
          <source src="<?= esc($item['path']) ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    <?php endforeach; ?>

    <!-- Render YouTube iframes -->
    <?php foreach($youtube as $item): ?>
      <div class="media-item embed">
        <?= $item['path'] ?>
      </div>
    <?php endforeach; ?>

  </div>
  
</section>
<section class="media card" id="gallery">
<!-- Render Instagram iframes -->
    <?php foreach($instagram as $item): ?>
      <div >
    <?= $item['path'] ?>
  </div>
    <?php endforeach; ?>
</section>

    <section class="cta card" id="admission">
      <h3>Ready to join?</h3>
      <p>Admission open for Nursery to Class X — give your child a balanced education with strong academics and rich co-curricular life.</p>
      <a class="btn primary" href="/admission">Apply Now</a>
    </section>

  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <div>
        <strong>Bright Future Public School</strong>
        <p>Established 2022 • Affordable, value based education</p>
      </div>
      <nav aria-label="footer">
        <a href="#">Privacy</a>
        <a href="/contact">Contact</a>
      </nav>
    </div>
  </footer>

  <script>
    // Theme toggle + persist
    const html = document.documentElement;
    const btn = document.getElementById('theme-toggle');
    const THEME_KEY = 'bfps_theme';

    function setTheme(t){
      html.setAttribute('data-theme', t);
      btn.textContent = t === 'dark' ? '☀️' : '🌙';
      localStorage.setItem(THEME_KEY, t);
    }

    btn.addEventListener('click', ()=>{
      const next = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      setTheme(next);
    });

    // initialize theme
    const saved = localStorage.getItem(THEME_KEY);
    if(saved) setTheme(saved);

    // Hide media blocks if image src is empty or image not found
    function hideEmptyImages(){
      document.querySelectorAll('.activity-media img, .hero-media img, .media-grid img').forEach(img => {
        if(!img.getAttribute('src') || img.getAttribute('src').trim() === ''){
          img.closest('.activity-media, .hero-media')?.classList.add('no-image');
          img.remove();
        } else {
          // handle broken images
          img.addEventListener('error', ()=>{
            img.closest('.activity-media, .hero-media')?.classList.add('no-image');
            img.remove();
          });
        }
      });

      // hide media grid entirely if empty
      const grid = document.getElementById('media-grid');
      if(grid && grid.querySelectorAll('img').length === 0) grid.style.display = 'none';
    }

    // run on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', hideEmptyImages);

    // Small accessibility enhancement: focus outline for keyboard users only
    function handleFirstTab(e) {
      if (e.key === 'Tab') document.documentElement.classList.add('user-is-tabbing');
    }
    window.addEventListener('keydown', handleFirstTab, { once: true });
  </script>
</body>
</html>

