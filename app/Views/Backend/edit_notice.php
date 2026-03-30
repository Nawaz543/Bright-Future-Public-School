<h2>Edit Notice</h2>

<form action="<?= base_url('admin/p_dashboard/update/'.$notice['id']) ?>" method="post" enctype="multipart/form-data">
    
    <label>Title:</label>
    <input type="text" name="title" value="<?= esc($notice['title']) ?>" required><br><br>

    <label>File Path:</label>
    <input type="file" name="file" ><br><br>
    <!-- If you want file upload instead, replace with type="file" -->

    <button type="submit">Update</button>
</form>
