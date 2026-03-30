

  <!-- ========= MAIN ========= -->
    <!-- Intro -->
<div>
<?php if(session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <!-- Quick Links -->
   
      <div class="section-header">
        <h2>🎯 Quick Links</h2>
        <!-- form -->
      <form id="QuickLinkForm" action="<?= site_url('admin/p_dashboard/studentCorner/storeql') ?>" method="post" enctype="multipart/form-data">
        <label>Type:</label>
        <select name="section" required>
            <option value="Quick Link" selected>Quick Link</option>
        </select>
        <input type="text" name="path" placeholder="Paste link here" required>
        <input type="text" name="title" placeholder="Title of link" required>
        <button type="submit">Add Link</button><br><br>
      </form>
      </div>
      <div class="quicklinks">
      <?php if (!empty($datas) && in_array('Quick Link', $sections)): ?>
        <?php foreach ($datas as $row): ?>
          <?php if ($row['section'] === 'Quick Link'): ?>
            <a href="<?= base_url('admin/p_dashboard/studenttCorner/delete/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to delete this Document?')">Delete➔</a>
            <a class="link-card" href="<?= esc($row['path']) ?>" target="_blank" rel="noopener"><?= esc($row['title']) ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No Links Avilable</p>
      <?php endif; ?>
      </div>

    <!-- Routine / Timetable -->
   
      <div class="section-header">
        <h2>📅 Routine / Timetable</h2>
      </div>

      <!-- DAILY CLASS ROUTINE table -->
      <div class="card">
        <h3>Daily Class Routine</h3>
        <!-- form -->
      <form id="DailyRoutineForm" action="<?= site_url('admin/p_dashboard/studentCorner/store') ?>" method="post" enctype="multipart/form-data">
        <label>Type:</label>
        <select name="section" required>
            <option value="Daily Routine" selected>Daily Routine</option>
        </select>
        <input type="text" name="class" placeholder="Eg- 1 to 5 or 5" required>
        <input type="file" name="file" required>
        <button type="submit">Add Routine</button>
      </form>
        <div class="table-container">
          <table id="routine-table" class="data-table">
            <thead>
              <tr>
                <th>Action</th>
                <th>Class</th>
                <th>Upload On</th>
                <th>Link</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($datas) && in_array('Daily Routine', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['section'] === 'Daily Routine'): ?>
                    <tr><td><a href="<?= base_url('admin/p_dashboard/studenttCorner/delete/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to delete this Document?')">Delete</a></td>
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
        <!-- form -->
      <form id="SpcialClassForm" action="<?= site_url('admin/p_dashboard/studentCorner/store') ?>" method="post" enctype="multipart/form-data">
        <select name="section" required>
            <option value="Special Class" selected>Special Class</option>
        </select>
        <label>Class : </label><input type="text" name="class" placeholder="Eg- 1 to 5 or 5" required>
        <label>Title : </label><input type="text" name="title" placeholder="Eg- Computer Lab" required>
        <label>Date : </label><input type="text" name="start" placeholder="Eg- 5th Aug 2025" required>
        <label>Time : </label><input type="text" name="end" placeholder="Eg- 12 :00 pm" required>
        <label>By : </label><input type="text" name="author" placeholder="Eg- Principal Sir" required>
        <button type="submit">Add Special Class</button>
      </form>
        <div class="table-container">
          <table id="special-table" class="data-table">
            <thead>
              <tr>
                <th>Action</th>
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
                    <tr><td><a href="<?= base_url('admin/p_dashboard/studenttCorner/delete/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to delete this Document?')">Delete</a></td>
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
    
    <!-- Study Material -->
  
      <div class="section-header">
        <h2>📘 Study Material</h2>
      </div>

      <div class="grid-2">
        <!-- Class-wise Notes & PDFs -->
        <div class="card">
          <div class="card-head">
            
             <!-- form -->
      <form id="notesForm" action="<?= site_url('admin/p_dashboard/studentCorner/store') ?>" method="post" enctype="multipart/form-data">
        <select name="section" required>
            <option value="Class Notes" selected>Class Notes</option>
        </select>
        <label>Class : </label><input type="text" name="class" placeholder="Eg- 1 to 5 or 5" required>
        <label>Subject : </label><input type="text" name="subject" placeholder="Eg- Computer" required>
        <label>Title : </label><input type="text" name="title" placeholder="Eg- parts of comp" required>
        <label>Uploaded By : </label><input type="text" name="author" placeholder="Eg- Pritam" required>
        <input type="file" name="file" required>
        <input type="hidden" name="status" value="approved">
        <button type="submit">Add Class Notes</button>
      </form>
      <h3>Unapproved Class-wise Notes & PDFs</h3>
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
            </div>
          </div>

          <div class="table-container">
            <table id="notes-table" class="data-table">
              <thead>
                <tr> <th>Action</th> <th>Class</th><th>Subject</th><th>Title</th><th>Uploaded By</th><th>Uploaded On</th> <th>Download</th></tr>
              </thead>
              <tbody>
                <?php if (!empty($datas) && in_array('Class Notes', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['status'] === 'unapproved'): ?>
                    <tr><td><a href="<?= base_url('admin/p_dashboard/edi/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to Approve this Document?')">Approve</a> | 
                            <a href="<?= base_url('admin/p_dashboard/studenttCorner/delete/'.$row['id']) ?>" 
                           onclick="return confirm('Are you sure you want to delete this Document?')">
                           Delete
                          </a></td>
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

        <!--approved Class-wise Notes & PDFs -->
        <div class="card">
          <div class="card-head">
            <h3>Approved Class-wise Notes & PDFs</h3>
            </div>
          </div>

          <div class="table-container">
            <table id="notes-table" class="data-table">
              <thead>
                <tr> <th>Action</th><th>Class</th><th>Subject</th><th>Title</th><th>Uploaded By</th><th>Uploaded On</th><th>Download</th></tr>
              </thead>
              <tbody>
                <?php if (!empty($datas) && in_array('Class Notes', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['status'] === 'approved'): ?>
                    <tr><td><a href="<?= base_url('admin/p_dashboard/studenttCorner/delete/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to delete this Document?')">
                           Delete</a></td>
                        <td><?= esc($row['class']) ?></td><td><?= esc($row['subject']) ?></td>
                        <td><?= esc($row['title']) ?></td><td><?= esc($row['author']) ?></td><td><?= esc($row['created_at']) ?></td>
                        <td><a href="<?= base_url($row['file']) ?>" target="_blank">Download</a></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No Class Notes Avilable</p>
              <?php endif; ?>
            </table>
          </div>
          <div class="card-footer small muted">Tip: Use filters to narrow down by class</div>
        </div>

        <!-- PYQ Table -->
        <div class="card">
          <div class="card-head">
              <!-- form -->
      <form id="pyqForm" action="<?= site_url('admin/p_dashboard/studentCorner/store') ?>" method="post" enctype="multipart/form-data">
        <select name="section" required>
            <option value="Pyqs" selected>Pyqs</option>
        </select>
        <label>Class : </label><input type="text" name="class" placeholder="Eg- 1 to 5 or 5" required>
        <label>Subject : </label><input type="text" name="subject" placeholder="Eg- Computer" required>
        <label>Year : </label><input type="text" name="on_year" placeholder="Eg- 2024" required>
        <label>Exam name : </label><input type="text" name="exam_name" placeholder="Eg- Finnal" required>
        <label>File : </label><input type="file" name="file" required>
        <button type="submit">Add PYQs</button>
      </form>
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
                <tr> <th>Action</th><th>Class</th><th>Subject</th><th>Year</th><th>Exam Name</th><th>Link</th></tr>
              </thead>
              <tbody>
                <?php if (!empty($datas) && in_array('Pyqs', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['section'] === 'Pyqs'): ?>
                    <tr><td><a href="<?= base_url('admin/p_dashboard/studenttCorner/delete/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to delete this Document?')">
                           Delete</a></td>
                        <td><?= esc($row['class']) ?></td><td><?= esc($row['subject']) ?></td>
                        <td><?= esc($row['on_year']) ?></td><td><?= esc($row['exam_name']) ?></td>
                        <td><a href="<?= base_url($row['file']) ?>" target="_blank">Download</a></td>
                    </tr>
                 <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No Pyqs Avilable</p>
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
         <!-- form -->
      <form id="ExtraLinkForm" action="<?= site_url('admin/p_dashboard/studentCorner/store') ?>" method="post" enctype="multipart/form-data">
        <select name="section" required>
            <option value="Extra Link" selected>Extra Link</option>
        </select>
        <input type="text" name="path" placeholder="Paste link here" required>
        <input type="text" name="title" placeholder="Title of link" required>
        <button type="submit">Add Link</button><br><br>
      </form>
        <?php if (!empty($datas) && in_array('Extra Link', $sections)): ?>
        <?php foreach ($datas as $row): ?>
          <?php if ($row['section'] === 'Extra Link'): ?>
            <a href="<?= base_url('admin/p_dashboard/studenttCorner/delete/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to delete this Document?')">Delete➔</a>
            <a class="link-card" href="<?= esc($row['path']) ?>" target="_blank" rel="noopener"><?= esc($row['title']) ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No Links Avilable</p>
      <?php endif; ?>
      </div>
  

    <!-- Online Classes -->
      <div class="section-header">
        <h2>💻 Online Classes</h2>
      </div>

      <div class="card">
         <!-- form -->
      <form id="onlineClassForm" action="<?= site_url('admin/p_dashboard/studentCorner/store') ?>" method="post" enctype="multipart/form-data">
        <select name="section" required>
            <option value="Online Class" selected>Online Class</option>
        </select>
        <label>Class : </label><input type="text" name="class" placeholder="Eg- 1 to 5 or 5" required>
        <label>Subject : </label><input type="text" name="subject" placeholder="Eg- Computer" required>
        <label>Start : </label><input type="text" name="start" placeholder="Eg- 09:00 AM" required>
        <label>End : </label><input type="text" name="end" placeholder="Eg- 10:00 AM" required>
        <label>By : </label><input type="text" name="author" placeholder="Eg- ____ sir" required>
        <label>Platform : </label><input type="text" name="title" placeholder="Eg- Zoom" required>
        <label>Link : </label><input type="text" name="path" placeholder="Eg- zoom.....com" required>
        <button type="submit">Add Class Link</button>
      </form>
        <h3>Today's Live Class Links</h3>
        <div class="table-container">
          <table id="live-table" class="data-table">
            <thead><tr> <th>Action</th><th>Class</th><th>Subject</th><th>Start</th><th>End</th><th>By</th><th>Platform</th></tr></thead>
            <tbody>
              <?php if (!empty($datas) && in_array('Online Class', $sections)): ?>
                <?php foreach ($datas as $row): ?>
                  <?php if ($row['section'] === 'Online Class'): ?>
                    <tr><td><a href="<?= base_url('admin/p_dashboard/studenttCorner/delete/'.$row['id']) ?>" onclick="return confirm('Are you sure you want to delete this Document?')">
                           Delete</a></td>
                        <td><?= esc($row['class']) ?></td><td><?= esc($row['subject']) ?></td>
                        <td><?= esc($row['start']) ?></td><td><?= esc($row['end']) ?></td><td><?= esc($row['author']) ?></td>
                        <td><a class="link-card" href="<?= esc($row['path']) ?>" target="_blank" rel="noopener"><?= esc($row['title']) ?></a></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No Online Class Avilable</p>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
  

    <!-- Exam Schedule -->
  
      <div class="section-header">
        <h2>📝 Exam Schedule</h2>
         <!-- form -->
      <form id="ExamScheduleForm" action="<?= site_url('admin/p_dashboard/studentCorner/update') ?>" method="post" enctype="multipart/form-data">
        <select name="section" required>
            <option value="Exam Schedule" selected>Exam Schedule</option>
        </select>
        <label>Exam Name : </label><input type="text" name="exam_name" placeholder="Eg- Finnal 2025-26" required>
        <label>Start : </label><input type="text" name="start" placeholder="Eg- 2nd march or Coming soon" required>
        <label>End : </label><input type="text" name="end" placeholder="Eg- 12th March" required>
        <input type="file" name="file" required>
        <button type="submit">Add Exam Schedule</button>
      </form>
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


