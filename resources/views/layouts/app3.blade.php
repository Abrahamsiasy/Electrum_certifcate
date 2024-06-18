<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calibration and Traceability Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Laboratory Calibration and Measurement Traceability Form</h2>

    <form>

      <!-- Section 1: Equipment Information -->
      <h4>Section 1: Equipment Information</h4>
      <div class="form-group">
        <label for="equipmentName">Equipment Name</label>
        <input type="text" class="form-control" id="equipmentName" placeholder="Enter equipment name">
      </div>
      <div class="form-group">
        <label for="manufacturer">Manufacturer</label>
        <input type="text" class="form-control" id="manufacturer" placeholder="Enter manufacturer">
      </div>
      <div class="form-group">
        <label for="modelNumber">Model Number</label>
        <input type="text" class="form-control" id="modelNumber" placeholder="Enter model number">
      </div>
      <div class="form-group">
        <label for="serialNumber">Serial Number</label>
        <input type="text" class="form-control" id="serialNumber" placeholder="Enter serial number">
      </div>

      <!-- Section 2: Laboratory Calibration -->
      <h4>Section 2: Laboratory Calibration</h4>
      <div class="form-group">
        <label for="calibrationDate">Calibration Date</label>
        <input type="date" class="form-control" id="calibrationDate">
      </div>
      <div class="form-group">
        <label for="calibrationPoints">Calibration Points</label>
        <textarea class="form-control" id="calibrationPoints" rows="3" placeholder="Enter calibration points"></textarea>
      </div>
      <div class="form-group">
        <label for="refEquipmentName">Reference Equipment Name</label>
        <input type="text" class="form-control" id="refEquipmentName" placeholder="Enter reference equipment name">
      </div>
      <div class="form-group">
        <label for="refManufacturer">Reference Equipment Manufacturer</label>
        <input type="text" class="form-control" id="refManufacturer" placeholder="Enter manufacturer">
      </div>
      <div class="form-group">
        <label for="refModelNumber">Reference Equipment Model Number</label>
        <input type="text" class="form-control" id="refModelNumber" placeholder="Enter model number">
      </div>


      <!-- Section 3: SI Traceability (Optional) -->
      <h4>Section 3: SI Traceability (Optional)</h4>
      <div class="form-group">
        <label for="siCalibrationPoints">SI Calibration Points</label>
        <textarea class="form-control" id="siCalibrationPoints" rows="3" placeholder="Enter SI calibration points"></textarea>
      </div>
      <div class="form-group">
        <label for="siRefEquipmentName">SI Reference Equipment Name</label>
        <input type="text" class="form-control" id="siRefEquipmentName" placeholder="Enter reference equipment name">
      </div>
      <div class="form-group">
        <label for="siRefManufacturer">SI Reference Equipment Manufacturer</label>
        <input type="text" class="form-control" id="siRefManufacturer" placeholder="Enter manufacturer">
      </div>
      <div class="form-group">
        <label for="siRefModelNumber">SI Reference Equipment Model Number</label>
        <input type="text" class="form-control" id="siRefModelNumber" placeholder="Enter model number">
      </div>

      <div class="form-group">
        <label for="traceabilityStatement">Traceability Statement</label>
        <textarea class="form-control" id="traceabilityStatement" rows="3" placeholder="Enter traceability statement"></textarea>
      </div>

      <!-- Additional Information (Optional) -->
      <h4>Additional Information (Optional)</h4>
      <div class="form-group">
        <label for="calibrationUncertainty">Calibration Uncertainty</label>
        <input type="text" class="form-control" id="calibrationUncertainty" placeholder="Enter calibration uncertainty">
      </div>
      <div class="form-group">
        <label for="calibrationInterval">Calibration Interval</label>
        <input type="text" class="form-control" id="calibrationInterval" placeholder="Enter calibration interval">
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>
</body>
</html>
