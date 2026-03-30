<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
  <h1>Add a New Note</h1>

    <form action="/hello/save" method="post">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="4" cols="40" required></textarea><br><br>

        <button type="submit">Save Note</button>
    </form>

    <hr>

   <?php foreach($notes as $note): ?>
    <h1><?= esc($note['title'])?></h1>
    <?= $note['content']?>
    <hr>
    <?php endforeach; ?>
</body>
</html>

