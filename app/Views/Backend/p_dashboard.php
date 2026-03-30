<!DOCTYPE html>
<html lang="en" data-theme="light">
 

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Admin Dashboard</title>
  <link rel="stylesheet" href="<?= base_url('css/Backend/p_dashboard-co-curricular.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/Backend/p_dashboard.css') ?>">
   <link rel="stylesheet" href="<?= base_url('css/Backend/toppers.css') ?>">
 
</head>
<body>
<div class="dashboard">

  <!-- Sidebar -->
  <aside class="sidebar">
    <h2>🛠 Admin</h2>
    <nav>
     
        <a href="#" data-section="dashboard">📊 Dashboard</a>
        <a href="#" data-section="teachers">👩‍🏫 Teachers</a>
        <a href="#" data-section="contact">👩‍🏫 Contact Massages</a>
        <a href="#" data-section="miscellaneous">🗂️ Miscellaneous</a>
    
      <a href="#" data-section="notices">📢 Notices</a>
      <a href="#" data-section="events">🎉 Events</a>
      <a href="#" data-section="co-curricular">🌟 Co-Curricular</a>
      <a href="#" data-section="materials">📚 Study Material</a>
      <a href="#" data-section="topper">🥇 Topper's List</a>
    </nav>
    <a href="<?= base_url('/admin/logout') ?>" id="log-btn"> Logout </a>
    <button id="toggle-theme">🌙 Dark Mode</button>
  </aside>

  <!-- Main Content -->
  <main class="content">
    <!-- Dynamic content will load here -->
    <section id="dashboard" class="section active">
      <h1>Welcome, Admin 👋</h1>
      <p>Select an option from sidebar to manage school content.</p>
    </section>

    <!-- Notices -->
    <section id="notices" class="section">
      <h2>📢 Manage Notices</h2>
      <!-- massage -->
       <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
<!-- form -->
      <form id="noticeForm" action="<?= site_url('admin/p_dashboard/store') ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Notice Title" required>
        <input type="file" name="file" required>
        <button type="submit">Add Notice</button>
      </form>
      <table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Date</th>
            <th>Title</th>
            <th>File</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($notices)): ?>
            <?php foreach($notices as $notice): ?>
                <tr>
                    <td><?= esc($notice['id']) ?></td>
                    <td><?= esc($notice['created_at']) ?></td>
                    <td><?= esc($notice['title']) ?></td>
                    <td>
                        <a href="<?= base_url($notice['file']) ?>" target="_blank">Download</a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/p_dashboard/edit/'.$notice['id']) ?>">Edit</a> | 
                        <a href="<?= base_url('admin/p_dashboard/delete/'.$notice['id']) ?>" 
                           onclick="return confirm('Are you sure you want to delete this notice?')">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No notices found</td></tr>
        <?php endif; ?>
    </tbody>
</table>

    </section>

    <!-- Events -->
    <section id="events" class="section">
      <h2>📢 Manage Events</h2>
      <!-- massage -->
       <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
<!-- form -->
      <form id="eventForm" action="<?= site_url('admin/p_dashboard/storeEvent') ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Event Title" required>
        <input type="file" name="file" required>
        <button type="submit">Add Event</button>
      </form>
      <table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Sl.No.</th>
            <th>Date</th>
            <th>Title</th>
            <th>File</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($events)): ?>
            <?php foreach($events as $event): ?>
                <tr>
                    <td><?= esc($event['id']) ?></td>
                    <td><?= esc($event['created_at']) ?></td>
                    <td><?= esc($event['title']) ?></td>
                    <td>
                        <a href="<?= base_url($event['file']) ?>" target="_blank">Download</a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/p_dashboard/editEvent/'.$event['id']) ?>">Edit</a> | 
                        <a href="<?= base_url('admin/p_dashboard/deleteEvent/'.$event['id']) ?>" 
                           onclick="return confirm('Are you sure you want to delete this notice?')">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No Events found</td></tr>
        <?php endif; ?>
    </tbody>
</table>
    </section>

    <!-- Co-Curricular -->
    <section id="co-curricular" class="section">
      <h2>🌟 Co-Curricular</h2>
      <p>Upload/Update images.</p>
      <!-- Upload Form -->
  <form action="<?= base_url('admin/p_dashboard/storeCo-curricular') ?>" method="post" enctype="multipart/form-data" class="upload-form">
      <label>Choose Type:</label>
      <select name="type" id="type" required onchange="toggleInput(this.value)">
          <option value="">-- Select --</option>
          <option value="image">Image</option>
          <option value="video">Video</option>
          <option value="instagram">Instagram (Embed)</option>
           <option value="youTube">Youtube (iframe)</option>
      </select>

      <div id="fileInput" style="display:none;">
          <input type="file" name="file">
      </div>

      <div id="iframeInput" style="display:none;">
          <textarea name="iframe_code" placeholder="Paste iframe/embed code"></textarea>
      </div>

      <button type="submit">Upload</button>
  </form>

  <hr>

  <!-- Gallery -->
  <div class="grid">
    <?php if (!empty($medias)): ?>
        <?php foreach ($medias as $row): ?>
            <div class="card">
                <?php if ($row['type'] === 'image'): ?>
                    <img src="<?= base_url($row['path']) ?>" alt="Image" loading="lazy">
                <?php elseif ($row['type'] === 'video'): ?>
                    <video controls>
                        <source src="<?= base_url($row['path']) ?>" type="video/mp4" loading="lazy">
                    </video>
                <?php elseif ($row['type'] === 'youTube'): ?>
                    <div class="iframe-container">
                        <?= str_replace('<iframe', '<iframe loading="lazy"', $row['path']); ?>
                    </div>
                <?php elseif ($row['type'] === 'instagram'): ?>
                        <?= str_replace('<iframe', '<iframe loading="lazy"', $row['path']); ?>
                <?php endif; ?>

                <p><small><?= $row['created_at'] ?></small></p>
                <a href="<?= base_url('admin/p_dashboard/deleteCo-curricular/'.$row['id']) ?>" 
                   onclick="return confirm('Delete this item?')" class="delete-btn">Delete</a>
                   
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No records yet.</p>
    <?php endif; ?>
  </div>

    </section>

    <!-- Materials -->
    <section id="materials" class="section">
      <h2>📚 Study Material</h2>
      <p>Upload study materials (PDFs, Docs).</p>
      <?php include 'studentBackend.php'; ?>
    </section>

    <!-- Topper's list -->
     <section id="topper" class="section">
      <h2>📊 Results</h2>
      <p>Upload/Update Toppersss.</p>
      <?php include 'topper.php'; ?>
    </section>
    <!-- Teachers -->
    <section id="teachers" class="section">
      <h2>👩‍🏫 Teacher Records</h2>
      <p>Add or edit teacher information.</p>
    </section>

    <!-- Contact form -->
    <section id="contact" class="section">
      <h2>📨 Contact Messages</h2>
      <p>Check General Queries /Admission & Registration Questions /Complaints or Feedback / Job Inquiry</p>
      <?php include 'contactMessage.php'; ?>
    </section>

    <!-- miscellaneous -->
    <section id="miscellaneous" class="section">
       <h2>Miscellaneous Documents</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <!-- form -->
      <form id="miscellaneousForm" action="<?= site_url('admin/p_dashboard/storeMis') ?>" method="post" enctype="multipart/form-data">
        <label>Type:</label>
        <select name="type" required>
            <option value="">-- Select Type --</option>
            <option value="Academic Calendar">Academic Calendar</option>
            <option value="Fee Structure">Fee Structure</option>
        </select>
        <input type="file" name="file" required>
        <button type="submit">Add Event</button>
      </form>

    <table border="1" cellpadding="10">
      <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>File</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($records)): ?>
        <?php foreach($records as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['type'] ?></td>
            <td><a href="<?= base_url($row['file']) ?>" target="_blank">Download</a></td>
            <td><?= $row['created_at'] ?></td>
            <td>
              <a href="<?= base_url('admin/p_dashboard/editMis/'.$row['id']) ?>">Edit</a> | 
                        <a href="<?= base_url('admin/p_dashboard/deleteMis/'.$row['id']) ?>" 
                           onclick="return confirm('Are you sure you want to delete this Document?')">
                           Delete
                        </a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No Data found</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    </section>
  </main>
</div>
<script>
 // Sidebar link switching
document.querySelectorAll('.sidebar nav a').forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    let target = link.getAttribute('data-section');

    // sab section ko hide karo
    document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.sidebar nav a').forEach(s => s.classList.remove('active'));

    // target ko active karo
    document.getElementById(target).classList.add('active');
    link.classList.add('active');

    // URL update karo (query string ke saath)
    const newUrl = window.location.pathname + '?section=' + target;
    window.history.replaceState(null, null, newUrl);
  });
});

// On page load, check query string
window.addEventListener('load', () => {
  const urlParams = new URLSearchParams(window.location.search);
  const section = urlParams.get('section') || 'dashboard'; // default dashboard
  let targetSection = document.getElementById(section);
  let targetLink = document.querySelector(`.sidebar nav a[data-section="${section}"]`);
  
  if(targetSection && targetLink) {
    document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.sidebar nav a').forEach(s => s.classList.remove('active'));
    targetSection.classList.add('active');
    targetLink.classList.add('active');
  }
});

//co-curricular input
function toggleInput(type) {
    document.getElementById('fileInput').style.display = (type === 'image' || type === 'video') ? 'block' : 'none';
    document.getElementById('iframeInput').style.display = (type === 'instagram' || type === 'youTube') ? 'block' : 'none';
}

// Dark Mode Toggle
document.getElementById('toggle-theme').addEventListener('click', () => {
  let html = document.documentElement;
  let theme = html.getAttribute('data-theme');
  html.setAttribute('data-theme', theme === 'light' ? 'dark' : 'light');
});
// study matrial
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
</script>
</body>
</html>
