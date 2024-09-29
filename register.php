<!DOCTYPE html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px 40px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    width: 350px;
}

.form h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.input-group {
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
    transition: 0.3s;
}

.input-group input:focus {
    border-color: #007bff;
}

.btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

.form p {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

.form a {
    color: #007bff;
    text-decoration: none;
}

.form a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="container">
    <form action="proses_regis.php" method="POST" class="form">
            <h2>Isi Form Dengan Benar</h2>
            <div class="input-group">
                <label for="username">username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm-password">Konfirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" class="btn">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
