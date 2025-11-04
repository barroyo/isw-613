<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>
    <h1>User List</h1>
    <a href="/students/create">+ Add New User</a>
    <ul>
        <?php foreach ($students as $student): ?>
            <li>
                <?= esc($student['first_name']) ?> (<?= esc($student['last_name']) ?>)
                <a href="/students/edit/<?= $student['id'] ?>">Edit</a> |
                <a href="/students/delete/<?= $student['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
