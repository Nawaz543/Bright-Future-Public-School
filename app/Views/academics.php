<!-- ========== view/academics.html ========== -->
<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Academics — Bright Future Public School</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/academics.css">
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
        <a class="btn primary" href="#calendar">📘 Academic Calendar</a>
      </div>
    </div>
        <div class="container header-inner">
      <a href="/">Home</a>
    <a href="/about">About Us</a>
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
          <h1>🌟 Academics – Bright Future Public School</h1>
          <p class="lead">At Bright Future Public School, we believe that academics form the strong foundation for every child’s success in life. Our approach goes beyond textbooks—we encourage curiosity, creativity, and critical thinking while ensuring each child receives individual care and guidance.</p>
        </div>
      </div>
    </section>

    <section class="section container reveal">
      <h2>Our Curriculum</h2>
      <p>The school follows a curriculum aligned with recognized educational standards, designed to meet the developmental needs of children from Nursery to Class VIII. Our curriculum blends core academic subjects with co-scholastic areas to ensure all-round growth.</p>
      <div class="grid-2 gap">
        <div>
          <h3>Core Subjects</h3>
          <ul>
            <li>English</li>
            <li>Hindi</li>
            <li>Mathematics</li>
            <li>Science</li>
            <li>Social Studies</li>
            <li>Computer Science</li>
            <li>Urdu and more</li>
          </ul>
        </div>
        <div>
          <h3>Co-scholastic Areas</h3>
          <ul>
            <li>Art & Craft</li>
            <li>Value Education</li>
            <li>Deenyat</li>
            <li>Civic Sense</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="section container reveal">
      <h2>Teaching Methodology</h2>
      <ul class="method-list">
        <li>Playway method in early years to build joy of learning.</li>
        <li>Activity-based learning with games, stories, visuals, and experiments.</li>
        <li>Individual attention in small classes.</li>
        <li>Monthly tests for progress tracking.</li>
        <li>Daily GK sessions to build awareness and confidence.</li>
      </ul>
    </section>

    <section class="section container cards reveal">
      <article class="card">
        <h3>Early Years (Nursery – UKG)</h3>
        <p>Focus on communication and social skills, early literacy and numeracy, motor skill development, creativity, and confidence-building through play and art.</p>
      </article>

      <article class="card">
        <h3>Primary Section (Class I – V)</h3>
        <p>Strengthening reading, writing, and arithmetic; introduction to science, computers, and creative subjects; curiosity and independent thinking encouraged alongside moral values.</p>
      </article>

      <article class="card">
        <h3>Middle Section (Class VI – VIII)</h3>
        <p>Deeper understanding of core subjects through projects, discussions, and experiments. Development of critical thinking, problem-solving, leadership, and teamwork.</p>
      </article>
    </section>

    <section class="section container reveal">
      <h2>Assessment & Progress</h2>
      <p>Our evaluation system ensures that learning is continuous and stress-free. Class tests, projects, and oral work assess progress. Monthly tests track consistent improvement. Parent-Teacher Meetings provide regular feedback and guidance.</p>
      <blockquote>Assessment is not just about marks—it is about developing confidence, responsibility, and the will to improve.</blockquote>
    </section>

    <section class="section container reveal">
      <h2>Beyond Academics</h2>
      <p>At Bright Future, learning extends beyond the classroom. Students are encouraged to take part in:</p>
      <ul>
        <li>Sports and physical education</li>
        <li>Cultural programs and competitions</li>
      </ul>
      <p>This ensures holistic development—making children not only good students but also responsible, confident, and compassionate individuals.</p>
    </section>

    <section id="calendar" class="cta container reveal">
      <h2>📘 Academic Calendar</h2>
      <p>Parents can download the Academic Calendar (PDF) to stay updated with session schedules, exams, holidays, and events.</p>
      <a class="btn primary" href="<?= base_url($academicCalendar['file']) ?>" download>Download Calendar</a>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <p>© <span id="year"></span> Bright Future Public School</p>
      <p class="small">Nurturing Bright Futures with Care and Excellence</p>
    </div>
  </footer>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
    const root = document.documentElement;
    const toggle = document.getElementById('theme-toggle');
    const stored = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

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

    const observer = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('in-view'); });
    }, {threshold: 0.12});
    document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));
  </script>
</body>
</html>


