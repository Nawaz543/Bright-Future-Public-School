<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Page – Bright Future Public School</title>

  <!-- keep your header.css (the exact CSS you provided earlier) -->
  <link rel="stylesheet" href="<?= base_url('css/navModern.css')?>">

  <!-- page styles -->
  <link rel="stylesheet" href="<?= base_url('css/student.css')?>">
</head>
<body>

  <!-- ========= HEADER (UNCHANGED) ========= -->
  <header class="site-header">
    <div class="container header-inner">
      <a class="brand" href="/">
        <img src="<?= base_url('images/logo.webp')?>" alt="Bright Future Public School Logo" class="logo">
        <span class="brand-text">Bright Future Public School</span>
      </a>

      <div class="actions">
        <button id="theme-toggle" class="btn-icon" aria-label="Toggle dark mode">🌙</button>
        <a class="btn primary" href="/student#online-classes">Online Class</a>
        <a class="btn primary" href="<?= base_url('/student/logout') ?>" id="log-btn"> Logout </a>
      </div>
    </div>

    <nav class="container header-inner nav-links">
       <!-- ✅ Dropdown -->
    <div class="dropdown">
      <a href="#">EduConnect ▾</a>
      <div class="dropdown-menu">
        <a href="/student">Student's Corner</a>
        <a href="/teacher" onclick="showMessage(event)">Teacher's Corner</a>
      </div>
     </div>
    <a href="/academics">Academic</a>
    <a href="/notice">Notice & Events</a>
    <a href="/co-curricular">Co-Curricular Activity</a>
    <a href="/student#results">Toppers</a>
    <a href="/student#study-material">PYQs & Notes</a>
    <a href="/contact">Contact Us</a>
    </nav>
  </header>

  <!-- ========= MAIN ========= -->
  <main class="page container">
    <!-- Intro -->
    <section class="intro card--glass">
      <h1>🧑‍🎓 Student Page – Bright Future Public School</h1>
      <p>Welcome to the Student’s Corner — your one-stop destination for learning resources, online classes, schedules, and results.</p>
    </section>

    <!-- Quick Links -->
    <section id="quick-links" class="section">
      <div class="section-header">
        <h2>🎯 Quick Links</h2>
      </div>
      <div class="quicklinks">
        <?php if (!empty($datas) && in_array('Quick Link', $sections)): ?>
        <?php foreach ($datas as $row): ?>
          <?php if ($row['section'] === 'Quick Link'): ?>
            <a class="link-card" href="<?= esc($row['path']) ?>" target="_blank" rel="noopener"><?= esc($row['title']) ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No Links Avilable</p>
      <?php endif; ?>
     </div>
    </section>

    <!-- Routine / Timetable -->
    <section id="routine" class="section">
      <div class="section-header">
        <h2>📅 Routine / Timetable</h2>
      </div>

      <!-- DAILY CLASS ROUTINE table -->
      <div class="card">
        <h3>Daily Class Routine</h3>
        <div class="table-container">
          <table id="routine-table" class="data-table">
            <thead>
              <tr>
                <th>Class</th>
                <th>Upload On</th>
                <th>Link</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($datas) && in_array('Daily Routine', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['section'] === 'Daily Routine'): ?>
                    <tr>
                        <td><?= esc($row['class']) ?></td><td><?= esc($row['created_at']) ?></td>
                        <td><a href="<?= base_url($row['file']) ?>" target="_blank">Download</a></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No Routine Avilable</p>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- EXTRA TIMETABLE: Special Classes -->
      <div class="card">
        <h3>Special Classes / Extra Sessions</h3>
        <div class="table-container">
          <table id="special-table" class="data-table">
            <thead>
              <tr>
                <th>Class</th>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>By</th>
              </tr>
            </thead>
            <tbody id="special-body">
              <?php if (!empty($datas) && in_array('Special Class', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['section'] === 'Special Class'): ?>
                    <tr>
                        <td><?= esc($row['class']) ?></td><td><?= esc($row['title']) ?></td><td><?= esc($row['start']) ?></td><td><?= esc($row['end']) ?></td>
                        <td><?= esc($row['author']) ?></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No Special Class </p>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- ACTIVITY SCHEDULE -->
      <div class="card">
        <h3>Notice & Activity Schedule (Sports, Co-curricular)</h3>
        <a class="btn primary" href="/notice">Notice</a>
        <a class="btn primary" href="/notice#event">Event</a>
      </div>
    </section>

    <!-- Study Material -->
    <section id="study-material" class="section">
      <div class="section-header">
        <h2>📘 Study Material</h2>
      </div>

      <div class="grid-2">
        <!-- Class-wise Notes & PDFs -->
        <div class="card">
          <div class="card-head">
            <h3>Class-wise Notes & PDFs</h3>
            <div class="controls">
              <select id="notes-class-filter">
                <option value="all">All classes</option>
                <option value="Nursery">Nursery</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>

              <label class="file-upload">
                <input id="note-upload" type="file" accept=".pdf,.doc,.docx" />
                <span class="btn small">Upload Note</span>
              </label>
            </div>
          </div>

          <div class="table-container">
            <table id="notes-table" class="data-table">
              <thead>
                <tr><th>Class</th><th>Subject</th><th>Title</th><th>Uploaded By</th><th>Uploaded On</th><th>Link</th></tr>
              </thead>
              <tbody>
                <?php if (!empty($datas) && in_array('Class Notes', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['status'] === 'approved'): ?>
                    <tr>
                        <td><?= esc($row['class']) ?></td><td><?= esc($row['subject']) ?></td>
                        <td><?= esc($row['title']) ?></td><td><?= esc($row['author']) ?></td><td><?= esc($row['created_at']) ?></td>
                        <td><a href="<?= base_url($row['file']) ?>" target="_blank">Download</a></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No Class Notes Avilable</p>
              <?php endif; ?>
             </tbody>
            </table>
          </div>
          <div class="card-footer small muted">Tip: Use filters to narrow down by class</div>
        </div>

        <!-- PYQ Table -->
        <div class="card">
          <div class="card-head">
            <h3>Previous Year Question Papers (PYQ)</h3>
            <div class="controls">
              <select id="pyq-class-filter">
                <option value="all">All classes</option>
                <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                <option value="4">4</option><option value="5">5</option><option value="6">6</option>
                <option value="7">7</option><option value="8">8</option>
              </select>
            </div>
          </div>

          <div class="table-container">
            <table id="pyq-table" class="data-table">
              <thead>
                <tr><th>Class</th><th>Subject</th><th>Year</th><th>Exam Name</th><th>Link</th></tr>
              </thead>
              <tbody>
                <?php if (!empty($datas) && in_array('Pyqs', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['section'] === 'Pyqs'): ?>
                    <tr>
                        <td><?= esc($row['class']) ?></td><td><?= esc($row['subject']) ?></td>
                        <td><?= esc($row['on_year']) ?></td><td><?= esc($row['exam_name']) ?></td>
                        <td><a href="<?= base_url($row['file']) ?>" target="_blank">Download</a></td>
                    </tr>
                 <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No Class Notes Avilable</p>
              <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div class="card-footer small muted">Tip: Use filters to narrow down by class</div>
        </div>
      </div>

      <!-- Extra Learning Resources -->
      <div class="card">
        <h3>Extra Learning Resources (Videos, E-books, Activities)</h3>
        <?php if (!empty($datas) && in_array('Extra Link', $sections)): ?>
        <?php foreach ($datas as $row): ?>
          <?php if ($row['section'] === 'Extra Link'): ?>
            <ul class="resources-list">
              <li><a class="link-card" href="<?= esc($row['path']) ?>" target="_blank" rel="noopener"><?= esc($row['title']) ?></a></li>
            </ul>
            <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No Links Avilable</p>
      <?php endif; ?>
      </div>
    </section>

    <!-- Online Classes -->
    <section id="online-classes" class="section">
      <div class="section-header">
        <h2>💻 Online Classes</h2>
      </div>

      <div class="card">
        <h3>Today's Live Class Links</h3>
        <div class="table-container">
          <table id="live-table" class="data-table">
            <thead><tr><th>Class</th><th>Subject</th><th>Start</th><th>End</th><th>By</th><th>Platform</th></tr></thead>
            <tbody>
              <?php if (!empty($datas) && in_array('Online Class', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['section'] === 'Online Class'): ?>
                    <tr>
                        <td><?= esc($row['class']) ?></td><td><?= esc($row['subject']) ?></td>
                        <td><?= esc($row['start']) ?></td><td><?= esc($row['end']) ?></td><td><?= esc($row['author']) ?></td>
                        <td><a class="link-card" href="<?= esc($row['path']) ?>" target="_blank" rel="noopener"><?= esc($row['title']) ?></a></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No Class Notes Avilable</p>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card">
        <h3>Digital Assignments Submission</h3>
        <form id="assignment-form" class="form-grid">
          <label>Student Name<input type="text" id="asg-name" required></label>
          <label>Class
            <select id="asg-class" required>
              <option value="">Select</option>
              <option>1</option><option>2</option><option>3</option><option>4</option>
              <option>5</option><option>6</option><option>7</option><option>8</option>
            </select>
          </label>
          <label>Subject<input type="text" id="asg-subject" required></label>
          <label>File <input type="file" id="asg-file" accept=".pdf,.doc,.docx" required></label>
          <div class="form-actions">
            <button type="submit" class="btn primary">Submit Assignment</button>
          </div>
        </form>
        <div id="asg-feedback" class="small muted"></div>
      </div>

      <div class="card">
        <h3>Guidelines for Online Etiquette</h3>
        <ol class="muted">
          <li>Join the class 5 minutes before start time; keep your name visible.</li>
          <li>Keep microphone muted unless asked to speak. Use the raise-hand option when you want to ask something.</li>
          <li>Be dressed appropriately and sit in a quiet, well-lit place.</li>
          <li>Submit assignments before the due date and name files properly (Class_Name_Subject_Date).</li>
          <li>Be respectful to teachers and classmates; no abusive language or disruptive behavior.</li>
        </ol>
      </div>
    </section>

    <!-- Exam Schedule -->
    <section id="exams" class="section">
      <div class="section-header">
        <h2>📝 Exam Schedule</h2>
      </div>

      <div class="card grid-2">
        <?php if (!empty($datas) && in_array('Exam Schedule', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['section'] === 'Exam Schedule'): ?>
                    <div>
                      <h3>Upcoming Exam Dates</h3>
                      <p class="muted"> Exam : <?= esc($row['exam_name'])?> from <strong><?= esc($row['start'])?> - <?= esc($row['end'])?></strong></p>
                    </div>

                    <div class="exam_schedule">
                      <h3><a href="<?= base_url($row['file']) ?>" class="btn" download>
                        <span>Download Exam Time Table</span></a></h3>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <div>
                  <h3>Upcoming Exam Dates</h3>
                  <p>Coming Soon</p>
                </div>
              <?php endif; ?>
      </div>

      <div class="card">
        <h3>Exam Guidelines & Instructions</h3>
        <ol class="muted">
          <li>Reach the exam hall 30 minutes before time. Carry admit card and stationery only.</li>
          <li>Electronic gadgets are strictly prohibited.</li>
          <li>Read instructions carefully and write roll number on every page.</li>
          <li>Follow invigilator directions. Any malpractice will be dealt with as per school policy.</li>
        </ol>
      </div>
    </section>

    <!-- Results -->
    <section id="results" class="section">
      <div class="section-header">
        <h2>📊 Results</h2>
      </div>

      <div class="topper-card ">
        <h3>School Toppers — Previous Final Year</h3>
        <div class="topper-row" id="school-toppers">
          <!-- JS will render topper cards -->
        </div>
      </div>

      <div class="topper-card">
        <h3>Recent Exam Toppers (Class-wise)</h3>
        <div class="topper-grid" id="class-toppers">
          <!-- JS will render class toppers -->
        </div>
      </div>
    </section>

  </main>

  <!-- ========= SCRIPTS ========= -->
  <script>
    // Theme toggle (same as header)
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

   

    // ---------- Notes upload (client-side simulation) ----------
    document.getElementById('note-upload').addEventListener('change', function(e){
      const file = e.target.files[0];
      if(!file) return;
      const className = prompt('Enter class for this note (e.g., 5 or Nursery):', '5') || '5';
      const uploader = prompt("Uploaded by (teacher's name):", 'Teacher') || 'Teacher';
      const table = document.querySelector('#notes-table tbody');
      const tr = document.createElement('tr');
      const today = new Date().toISOString().slice(0,10);
      tr.innerHTML = `<td>${className}</td><td>${file.name}</td><td>${uploader}</td><td>${today}</td>`;
      table.prepend(tr);
      alert('Note added to table (simulated). In production, please upload to server.');
      e.target.value = '';
    });

    // ---------- Filters for notes table ----------
    function filterTableByClass(selectId, tableId){
      const sel = document.getElementById(selectId);
      sel.addEventListener('change', ()=>{
        const val = sel.value;
        const rows = document.querySelectorAll('#' + tableId + ' tbody tr');
        rows.forEach(r => {
          if(val === 'all') r.style.display = '';
          else r.style.display = r.cells[0].innerText.trim() === val ? '' : 'none';
        });
      });
    }
    filterTableByClass('notes-class-filter', 'notes-table');
    filterTableByClass('pyq-class-filter', 'pyq-table');

    // ---------- Assignment submission (client-side simulated) ----------
    document.getElementById('assignment-form').addEventListener('submit', function(e){
      e.preventDefault();
      const name = document.getElementById('asg-name').value.trim();
      const cls = document.getElementById('asg-class').value.trim();
      const subject = document.getElementById('asg-subject').value.trim();
      const fileInp = document.getElementById('asg-file');
      if(!name || !cls || !subject || !fileInp.files.length){
        alert('Please fill all fields and attach file.');
        return;
      }
      const feedback = document.getElementById('asg-feedback');
      feedback.textContent = `Assignment submitted (simulated): ${name} — ${cls} — ${subject}.`;
      this.reset();
      setTimeout(()=> feedback.textContent = '', 7000);
    });

    // ---------- Render toppers (sample data) ----------

    const toppers = <?= json_encode($toppers) ?>;
const schoolToppers = toppers.filter(t => t.category === "School Topper");
const toppersContainer = document.getElementById('school-toppers');
if (schoolToppers.length > 0 ) {
    schoolToppers.forEach(topper => {

        let div = document.createElement('div');
        div.className = "topper-card";

        div.innerHTML = `
            <img src="<?= base_url() ?>/${topper.pic}" alt="${topper.stu_name}">
            <div class="topper-meta">
                <strong>${topper.stu_name}</strong>
                <div class="muted">${topper.exam_name}</div>
                <div class="muted small">Class ${topper.stu_class}</div>
                <div class="percent">${topper.stu_percent} %</div>
            </div>
        `;

        toppersContainer.appendChild(div);
    });
} else {
    const div3 = document.createElement('div');
    div3.innerHTML = `<h4>No School Toppers have been added</h4>`;
    toppersContainer.appendChild(div3);
}
   
const classToppers = toppers.filter(t => t.category === "Class Topper");
const classToppersContainer = document.getElementById('class-toppers');
if (classToppers.length > 0 ) {
    classToppers.forEach(topper => {

        let div = document.createElement('div');
        div.className = "topper-card";

        div.innerHTML = `
            <img src="<?= base_url() ?>/${topper.pic}" alt="${topper.stu_name}">
            <div class="topper-meta">
                <strong>${topper.stu_name}</strong>
                <div class="muted">${topper.exam_name}</div>
                <div class="muted small">Class ${topper.stu_class} </div>
                <div class="percent">${topper.stu_percent} %</div>
            </div>
        `;

        classToppersContainer.appendChild(div);
    });
} else {
    const div3 = document.createElement('div');
    div3.innerHTML = `<h4>No School Toppers have been added</h4>`;
    classToppersContainer.appendChild(div3);
}

    // Accessibility: keyboard toggle for EduConnect dropdown (header still hover)
    document.querySelectorAll('.dropdown > a').forEach(a=>{
      a.addEventListener('click', (e)=>{ e.preventDefault(); const menu = a.nextElementSibling; menu.style.display = menu.style.display === 'block' ? 'none' : 'block'; });
    });

    // Small responsive tweak: make nav collapse on narrow widths (keeps header logic unchanged)
    // (You can change this to a proper menu if you'd like)

    // on construction massage
    function showMessage(event) {
      event.preventDefault(); // stop link from opening
      alert("🚧 Page is under construction!");
    }
  </script>
</body>
</html>
