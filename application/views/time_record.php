<!DOCTYPE html>
<html>
<head>
    <title>Employee Time In/Out</title>
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
        .card {
            padding: 20px;
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Employee Time In/Out</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('TimeRecord/process_time_record') ?>">
                            <div class="form-group">
                                <label for="qrcode_or_id">QR Code or Employee ID:</label>
                                <input type="text" name="qrcode_or_id" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="time_in" class="btn btn-primary">Time In</button>
                                <button type="submit" name="time_out" class="btn btn-success">Time Out</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CDN links for jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- CDN link for DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#timeRecordTable').DataTable();
        });
    </script>
</body>
</html>
