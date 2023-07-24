<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <!-- CDN links for Bootstrap CSS and DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        /* Custom CSS to center the form */
        body, html {
            height: 100%;
        }

        .container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-form {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .user-form h2 {
            text-align: center;
        }

        .user-form .form-group {
            margin-bottom: 15px;
        }

        .user-form .form-control {
            padding: 10px;
        }

        .user-form .text-center {
            text-align: center;
        }

        /* Custom button style */
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Add custom styles for the table */
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
    </style>
</head>
<body>
    <div class="container">
        <div class="user-form">
            <h2>Edit User</h2>
            <form method="post" action="<?= base_url('user/edit/'.$user->id) ?>">
                <div class="form-group">
                    <label for="user_name">Username:</label>
                    <input type="text" name="user_name" class="form-control" value="<?= $user->user_name ?>" required>
                </div>
                <div class="form-group">
                    <label for="user_type">User Type:</label>
                    <select name="user_type" class="form-control" required>
                        <option value="1" <?= $user->user_type === '1' ? 'selected' : '' ?>>Super Admin</option>
                        <option value="2" <?= $user->user_type === '2' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>

    <!-- CDN links for jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- CDN link for DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>
