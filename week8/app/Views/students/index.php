<h1>Students List</h1>
<a href="/students/create">+ Add New User</a>
<ul>
    <?php foreach ($students as $student): ?>
        <li>
            <?= esc($student['first_name']) ?> (<?= esc($student['last_name']) ?>)
            <a href="<?php echo site_url('students/edit'). $student['id'] ?>">Edit</a> |
            <a href="<?php echo site_url('students/delete'). $student['id'] ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>