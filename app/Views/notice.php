<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Notices — Bright Future Public School</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/notice.css">
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
      </div>
    </div>
    <div class="container header-inner">
      <a href="/">Home</a>
    <a href="/about">About Us</a>
    <a href="/academics">Academic</a>
    <a href="/admission">Admission</a>
    <a href="/co-curricular">Co-Curricular Activity</a>
    <a href="/student">Student's Corner</a>
    <a href="/contact">Contact Us</a>
      </div>
    </div>
  </header>

  <main>
    <section class="hero container reveal">
      <h1>📢 School Notices</h1>
      <p class="lead">Stay updated with the latest announcements and circulars. Click the download button to view or save the notice.</p>
    </section>

    <section class="notice-board container reveal">
      <table class="notice-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Download</th>
          </tr>
        </thead>
         <tbody>
      <?php if(!empty($notices)): ?>
        <?php foreach($notices as $notice): ?>
          <tr>
            <td><?= date('d M Y', strtotime($notice['created_at'])) ?></td>
            <td><?= esc($notice['title']) ?></td>
            <td>
              <a href="<?= base_url($notice['file']) ?>" class="btn small" target="_blank">📥 Download</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3">No notices available.</td>
        </tr>
      <?php endif; ?>
    </tbody>
      </table>
    </section>
    <section class="hero container reveal" id="event">
      <h1>📢 School Events</h1>
      <p class="lead">Be a part of our school’s exciting journey. Stay tuned for event updates and download circulars for more information.</p>
    </section>
    <section class="notice-board container reveal" id="event">
      <table class="notice-table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Download</th>
          </tr>
        </thead>
        <tbody>
      <?php if(!empty($events)): ?>
        <?php foreach($events as $event): ?>
          <tr>
            <td><?= date('d M Y', strtotime($event['created_at'])) ?></td>
            <td><?= esc($event['title']) ?></td>
            <td>
              <a href="<?= base_url($event['file']) ?>" class="btn small" target="_blank">📥 Download</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3">No notices available.</td>
        </tr>
      <?php endif; ?>
    </tbody>
      </table>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <p>© <span id="year"></span> Bright Future Public School — All Rights Reserved</p>
    </div>
  </footer>

  <script>
    // current year
    document.getElementById('year').textContent = new Date().getFullYear();

    // theme toggle
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

    // scroll reveal
    const observer = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if(e.isIntersecting) e.target.classList.add('in-view');
      });
    }, {threshold: 0.12});
    document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));
  </script>
</body>
</html>

