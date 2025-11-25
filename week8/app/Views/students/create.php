<h1>Add New Student</h1>
<form action="/students/store" method="post">
    <label>First Name:</label>
    <input type="text" name="first_name" required><br><br>
    
    <label>Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" id="email" required onkeyup="validateEmail(this.value)"><br><br>

    <button type="submit">Save</button>
</form>
