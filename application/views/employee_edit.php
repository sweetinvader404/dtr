<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Edit Employee</h2>
        <form method="post" action="<?= base_url('employee/edit/'.$employee->id) ?>">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="form-control" value="<?= $employee->first_name ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control" value="<?= $employee->last_name ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </div>
        </form>
    </div>
</body>
</html>
