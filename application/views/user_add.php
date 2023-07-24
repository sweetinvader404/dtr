<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
    <!-- CDN links for Bootstrap CSS and DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            margin-top: 50px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Add New User</h2>
                <form method="post" action="<?= base_url('user/add') ?>">
                    <div class="form-group">
                        <label for="user_name">Username:</label>
                        <input type="text" name="user_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="user_password">Password:</label>
                        <input type="password" name="user_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="user_type">User Type:</label>
                        <select name="user_type" class="form-control" required>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CDN links for jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- CDN link for DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>
</html>
