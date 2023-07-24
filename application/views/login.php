<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap.min.css') ?>">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .card {
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            padding: 10px;
        }
        .login-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="text-center mb-4">Login</h2>
        <form method="post" action="<?= base_url('user/process_login') ?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="login-btn">Login</button>
            </div>
        </form>
    </div>

    <script src="<?= base_url('assets/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap.min.js') ?>"></script>
</body>
</html>
