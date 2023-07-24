<!DOCTYPE html>
<html>
<head>
    <title>List of Employees</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <style>
        /* Custom styles for centering elements */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        /* Add custom styles for the container */
        .container {
            margin-top: 50px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
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
        <h2 class="text-center mb-4">List of Employees</h2>
        <table id="employeeTable" class="table table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><input type="checkbox" name="ids[]" value="<?= $employee->id ?>"></td>
                    <td><?= $employee->first_name ?></td>
                    <td><?= $employee->last_name ?></td>
                    <td>
                        <a href="<?= base_url('employee/edit/'.$employee->id) ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button id="deleteBtn" class="btn btn-danger">Delete Selected</button>
    </div>

    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable();
            $('#checkAll').on('click', function() {
                $('input[name="ids[]"]').prop('checked', this.checked);
            });

            $('#deleteBtn').on('click', function() {
                if (confirm('Are you sure you want to delete the selected employee(s)?')) {
                    $('#deleteForm').submit();
                }
            });
        });
    </script>
</body>
</html>
