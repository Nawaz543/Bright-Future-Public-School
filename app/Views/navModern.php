<header class="site-header">
  <div class="container header-inner">
    <a class="brand" href="/">
      <img src="images/logo.webp" alt="Bright Future Public School Logo" class="logo">
      <span class="brand-text">Bright Future Public School</span>
    </a>

    <div class="actions">
      <button id="theme-toggle" class="btn-icon" aria-label="Toggle dark mode">🌙</button>
      <a class="btn primary" href="/admission">Enroll Now</a>
    </div>
  </div>

  <nav class="container header-inner nav-links">
    <!-- ✅ Dropdown -->
    <div class="dropdown">
      <a href="#">EduConnect ▾</a>
      <div class="dropdown-menu">
        <a href="/student">Student's Corner</a>
        <a href="/teacher">Teacher's Corner</a>
        <a href="/parent">Parent's Corner</a>
      </div>
     </div>
    <a href="/academics">Academic</a>
    <a href="/notice">Notice & News</a>
    <a href="/co-curricular">Co-Curricular Activity</a>
    <a href="/contact">Contact Us</a>
    <a href="/contact">Contact Us</a>
  </nav>
</header>

<script>
  // Theme toggle (dark/light)
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
</script>
