<!DOCTYPE html>
<html>
<head>
    <title>Daily Time Record for <?= $date ?></title>
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
        <h2 class="text-center mb-4">Daily Time Record for <?= $date ?></h2>
        <table id="dailyTimeRecordTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($time_records as $record): ?>
                <tr>
                    <td><?= $record->first_name ?> <?= $record->last_name ?></td>
                    <td><?= $record->time_in ?></td>
                    <td><?= $record->time_out ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#dailyTimeRecordTable').DataTable();
        });
    </script>
</body>
</html>
