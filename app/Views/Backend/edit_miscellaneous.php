<h2>Edit Document</h2>

<form action="<?= base_url('admin/p_dashboard/updateMis/'.$record['id']) ?>" method="post"   enctype="multipart/form-data">
    
    <label>Type:</label>
        <select name="type" required>
            <option value="">-- Select Type --</option>
            <option value="Academic Calendar" <?= $record['type']=="Academic Calendar" ? "selected" : "" ?>>Academic Calendar</option>
            <option value="Fee Structure" <?= $record['type']=="Fee Structure" ? "selected" : "" ?>>Fee Structure</option>
        </select>
    <label>File Path:</label>
    <input type="file" name="file" ><br><br>
    <small>Current: <a href="<?= base_url($record['file']) ?>" target="_blank">View File</a></small>
    <!-- If you want file upload instead, replace with type="file" -->
<br><br>
    <button type="submit">Update</button>
</form>
