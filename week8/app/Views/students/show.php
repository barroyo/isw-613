<!DOCTYPE html>
<html>
<head>
    <title>Show Student</title>
</head>
<body>
<h1>Show Student</h1>
<form>
    <label>Name:</label>
    <input type="text" name="name" value="<?= esc($student['first_name']) ?>" readonly><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= esc($student['email']) ?>"><br><br>
</form>
</body>
</html>
