<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About — Bright Future Public School</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/about.css">
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
    <div class="container header-inner">
      <a href="/">Home</a>
    <a href="/academics">Academic</a>
    <a href="/notice">Notice & Events</a>
    <a href="/admission">Admission</a>
    <a href="/co-curricular">Co-Curricular Activity</a>
    <a href="/student">Student's Corner</a>
    <a href="/contact">Contact Us</a>
    </div>
  </header>

  <main>
    <section class="hero">
      <div class="container hero-grid">
        <div class="hero-text reveal">
          <h1>🌟 About Bright Future Public School</h1>
          <p class="lead">Bright Future Public School, located at Alagdiha, Pabra Road, Pelawal, Hazaribagh, Jharkhand — a private institution nurturing young minds from Nursery to Class X. We believe quality education should be accessible to every child.</p>
          <p><a class="btn ghost" href="#vision">Our Vision & Mission</a></p>
        </div>

        <div class="hero-card reveal">
          <div class="card-inner">
            <h3>Quick Facts</h3>
            <ul class="facts">
              <li><strong>Location:</strong> Alagdiha, Pabra Road, Pelawal, Hazaribagh</li>
              <li><strong>Classes:</strong> Nursery — Class VIII</li>
              <li><strong>Management:</strong> Private</li>
              <li><strong>Founded:</strong> 2022</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="vision" class="section container reveal">
      <div class="grid-2 gap">
        <div>
          <h2>Vision</h2>
          <p>To create a future where every child, regardless of background, receives equal opportunity to learn and grow through affordable, value-based, and modern education.</p>

          <h2>Mission</h2>
          <ul class="mission-list">
            <li>Provide high-quality education at a reasonable fee.</li>
            <li>Focus on individual attention and personal care for every student.</li>
            <li>Integrate modern teaching with traditional values.</li>
            <li>Nurture creativity, confidence, and leadership through activities.</li>
            <li>Prepare students for life — not just exams.</li>
          </ul>
        </div>

        <aside class="why-choose">
          <h3>Why Choose Us?</h3>
          <ul>
            <li>Affordable Education without compromise on quality.</li>
            <li>Experienced & Caring Teachers.</li>
            <li>Modern Teaching Practices including activity-based learning.</li>
            <li>Safe, Supportive Environment.</li>
            <li>Holistic Development (academics, values, sports, culture).</li>
          </ul>
        </aside>
      </div>
    </section>

    <section class="section container reveal">
      <h2>Principal’s Desk</h2>
      <blockquote class="principal">
        <p>“Education is not just about books, it is about shaping character and building confidence for life.”</p>
        <p>At Bright Future Public School, we firmly believe that every child deserves the right to quality education. Our mission is to provide this opportunity at a low and reasonable fee, ensuring that no child is left behind.</p>
        <footer>— Md Shafik Ansari, Bright Future Public School</footer>
      </blockquote>
    </section>

    <section class="section container cards reveal">
      <article class="card">
        <h3>Co-curricular & Activities</h3>
        <p>Education at Bright Future goes beyond textbooks. Students are encouraged to participate in sports, cultural programs, competitions, and creative activities to build teamwork, leadership, and life skills.</p>
      </article>

      <article class="card">
        <h3>Our Commitment</h3>
        <p>Bright Future Public School stands for affordability, accessibility, and excellence — committed to shaping learners into future-ready citizens.</p>
      </article>

      <article class="card">
        <h3>Principal’s Message</h3>
        <p>Dear Parents, we invite you to walk hand in hand with us. Together, let us nurture curiosity, build strong foundations, and create bright futures for our children.</p>
      </article>
    </section>

    <section id="admission" class="cta container reveal">
      <h2>Ready to Join?</h2>
      <p>Admissions are open for Nursery to Class VIII. Contact us or visit the school to learn about fees, timings and admission process.</p>
      <div class="cta-actions">
        <a class="btn primary" href="tel:+91-7352787879" title="+91 7352787879">Call School</a>
        <a class="btn ghost" href="mailto:info@brightfuture.edu.in">Email Us</a>
        <a class="btn primary" href="/admission#apply">Enroll Online</a>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <p>© <span id="year"></span> Bright Future Public School — Alagdiha, Pabra Road, Pelawal, Hazaribagh, Jharkhand</p>
      <p class="small">Low fee • Modern teaching • Individual attention</p>
    </div>
  </footer>

  <script>
    // set current year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Theme toggle (persists in localStorage and respects OS preference)
    const root = document.documentElement;
    const toggle = document.getElementById('theme-toggle');
    const stored = localStorage.getItem('theme');
    const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

    function applyTheme(theme){
      root.setAttribute('data-theme', theme);
      toggle.textContent = theme === 'dark' ? '☀️' : '🌙';
    }

    applyTheme(stored || (prefersDark ? 'dark' : 'light'));

    toggle.addEventListener('click', ()=>{
      const next = (root.getAttribute('data-theme') === 'dark') ? 'light' : 'dark';
      applyTheme(next);
      localStorage.setItem('theme', next);
    });

    // Simple scroll reveal using IntersectionObserver
    const observer = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if(e.isIntersecting) e.target.classList.add('in-view');
      });
    }, {threshold: 0.12});

    document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));
  </script>
</body>
</html>

