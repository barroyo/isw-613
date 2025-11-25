<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
<h1>Edit User</h1>
<form action="/users/update/<?= $user['id'] ?>" method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?= esc($user['name']) ?>"><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= esc($user['email']) ?>"><br><br>

    <button type="submit">Update</button>
</form>
</body>
</html>
