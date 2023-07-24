<!DOCTYPE html>
<html>
<head>
    <title>List of Users</title>
    <!-- CDN links for Bootstrap CSS and DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        /* Custom styles for centering elements and adjusting padding */
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

        /* Adjust padding and margin for form fields */
        .form-group {
            margin-bottom: 20px;
        }

        /* Adjust padding for buttons */
        .btn {
            padding: 10px 20px;
        }

        /* Center buttons */
        .text-center {
            text-align: center;
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

        /* Add custom styles for buttons */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #b02a37;
            border-color: #b02a37;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">List of Users</h2>
        <form id="deleteForm" method="post" action="<?= base_url('user/delete') ?>">
            <table id="userTable" class="table table-striped">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="<?= $user->id ?>"></td>
                        <td><?= $user->user_name ?></td>
                        <td><?= $user->user_type === 1 ? 'Super Admin' : 'Admin' ?></td>
                        <td>
                            <a href="<?= base_url('user/edit/'.$user->id) ?>" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center">
                <button id="deleteBtn" class="btn btn-danger" type="submit">Delete Selected</button>
            </div>
        </form>
    </div>

    <!-- CDN links for jQuery, Bootstrap JS, and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();

            $('#checkAll').on('click', function() {
                $('input[name="ids[]"]').prop('checked', this.checked);
            });

            $('#deleteBtn').on('click', function() {
                if (confirm('Are you sure you want to delete the selected user(s)?')) {
                    $('#deleteForm').submit();
                }
            });
        });
    </script>
</body>
</html>
