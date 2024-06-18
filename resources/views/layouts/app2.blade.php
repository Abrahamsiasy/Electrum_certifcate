<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calibration and Traceability Input</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="container mt-3">
        <h1>Laboratory Calibration and Measurement Traceability</h1>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h2>Equipment Information</h2>
                    <div class="form-group">
                        <label for="eq_name">Equipment Name:</label>
                        <input type="text" class="form-control" id="eq_name" name="eq_name" required>
                    </div>
                    <div class="form-group">
                        <label for="manufacturer">Brand:</label>
                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                    </div>
                    <div class="form-group">
                        <label for="model_number">Model Number:</label>
                        <input type="text" class="form-control" id="model_number" name="model_number" required>
                    </div>
                    <div class="form-group">
                        <label for="serial_number">Serial Number:</label>
                        <input type="text" class="form-control" id="serial_number" name="serial_number" required>
                    </div>
                    <div class="form-group">
                        <label for="serial_number">Equpiment Id:</label>
                        <input type="text" class="form-control" id="serial_number" name="serial_number" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <h2>Laboratory Calibration</h2>
                    <div class="form-group">
                        <label for="cal_date">Calibration Date:</label>
                        <input type="date" class="form-control" id="cal_date" name="cal_date" required>
                    </div>
                    <h3>Calibration Points</h3>
                    <table class="table table-bordered" id="lab_points_table">
                        <thead>
                            <tr>
                                <th>Point Value</th>
                                <th>Measured Value</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="addLabPoint()">Add Point</button>
                    <div class="form-group mt-3">
                        <label for="lab_ref_eq_name">Laboratory Reference Equipment:</label>
                        <input type="text" class="form-control" id="lab_ref_eq_name" name="lab_ref_eq_name">
                    </div>
                    <div class="form-group">
                        <label for="lab_ref_eq_manufacturer">Manufacturer:</label>
                        <input type="text" class="form-control" id="lab_ref_eq_manufacturer" name="lab_ref_eq_manufacturer">
                    </div>
                    <div class="form-group">
                        <label for="lab_ref_eq_model">Model Number:</label>
                        <input type="text" class="form-control" id="lab_ref_eq_model" name="lab_ref_eq_model">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <h2>SI Traceability (Optional)</h2>
                    <h3>SI Calibration Points</h3>
                    <table class="table table-bordered" id="si_points_table">
                        <thead>
                            <tr>
                                <th>Point Value</th>
                                <th>Measured Value</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" onclick="addSIPoint()">Add Point</button>
                    <div class="form-group mt-3">
                        <label for="si_ref
