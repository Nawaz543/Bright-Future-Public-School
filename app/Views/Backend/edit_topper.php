<h2>Edit Data</h2>

<form action="<?= base_url('admin/p_dashboard/updateTopper/'.$topper['id']) ?>" method="post" enctype="multipart/form-data">
     <select name="category" required>
            <option value="School Topper" <?= ($topper['category'] == 'School Topper') ? 'selected' : '' ?>>School Topper</option>
            <option value="Class Topper" <?= ($topper['category'] == 'Class Topper') ? 'selected' : '' ?>>Class Topper</option>
        </select> <br><br>
        <label>Student Name :</label><input type="text" name="stu_name" value="<?= esc($topper['stu_name']) ?>" required><br><br>
        <label>Student Class :</label><input type="text" name="stu_class" value="<?= esc($topper['stu_class']) ?>" required><br><br><br>
        <label>Percentage :</label><input type="text" name="stu_percent" value="<?= esc($topper['stu_percent']) ?>" required><br><br>
        <label>Exam name : </label><input type="text" name="exam_name" value="<?= esc($topper['exam_name']) ?>" required><br><br><br>
    <label>File:</label>
    <input type="file" name="file" ><br>
    <small>Check Current File : <a href="<?= base_url($topper['pic']) ?>" target="_blank">   Here  </a></small>
    <!-- If you want file upload instead, replace with type="file" -->
    <br><br>
    <button type="submit">Update</button>
</form>
