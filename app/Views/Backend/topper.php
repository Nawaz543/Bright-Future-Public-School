 <?php if(session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>


<form id="topperForm" action="<?= site_url('admin/p_dashboard/studentCorner/storeTopper') ?>" method="post" enctype="multipart/form-data">
        <select name="category" required>
            <option value="School Topper" >School Topper</option>
            <option value="Class Topper" >Class Topper</option>
        </select>
        <label>Student Name :</label><input type="text" name="stu_name" placeholder="Eg- Ramesh Kr." required>
        <label>Student Class :</label><input type="text" name="stu_class" placeholder="Eg- 5" required>
        <label>Percentage :</label><input type="text" name="stu_percent" placeholder="Eg- 95%" required>
        <label>Exam name : </label><input type="text" name="exam_name" placeholder="Eg- 2nd Terminal 2025-26" required>
        <label>Student Photo </label><input type="file" name="pic" required>
        <button type="submit">Add</button>
      </form>
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

      <script>

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
                <div class="percent">${topper.stu_percent}</div>
                <div class="percent">
                    <a href="<?= base_url('admin/p_dashboard/studenttCorner/deleteTopper') ?>/${topper.id}"
                       onclick="return confirm('Are you sure you want to delete this one?')" 
                       class="delete-btn">Delete</a>
                       || <a href="<?= base_url('admin/p_dashboard/studentCorner/editTopper') ?>/${topper.id}" class= "btn">Edit</a>
                </div>
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
                <div class="muted small">Class ${topper.stu_class}</div>
                <div class="percent">${topper.stu_percent}</div>
                <div class="percent">
                    <a href="<?= base_url('admin/p_dashboard/studenttCorner/deleteTopper') ?>/${topper.id}"
                       onclick="return confirm('Are you sure you want to delete this one?')" 
                       class="delete-btn">Delete</a>
                       || <a href="<?= base_url('admin/p_dashboard/studentCorner/editTopper') ?>/${topper.id}" class= "btn">Edit</a>
                </div>
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

      </script>