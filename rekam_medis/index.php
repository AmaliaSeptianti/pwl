<?php
include "config.php"; // Include database connection file

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $bloodType = mysqli_real_escape_string($conn, $_POST['bloodType']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $temperature = mysqli_real_escape_string($conn, $_POST['temperature']);
    $bloodPressure = mysqli_real_escape_string($conn, $_POST['bloodPressure']);
    $complaint = mysqli_real_escape_string($conn, $_POST['complaint']);

    if (isset($_GET['edit'])) {
        $sql = "UPDATE medical_record set name = '$name', age = '$age', sex = '$sex', address = '$address', blood_type = '$bloodType', weight = '$weight', height = '$height', temperature = '$temperature', blood_pressure = '$bloodPressure', complaint = '$complaint'
        WHERE id = '{$_GET['edit']}'";
    } else {
        // Insert data into database
        $sql = "INSERT INTO medical_record (name, age, sex, address, blood_type, weight, height, temperature, blood_pressure, complaint)
        VALUES('$name', '$age', '$sex', '$address', '$bloodType', '$weight', '$height', '$temperature', '$bloodPressure', '$complaint')";
    }
    if ($conn->query($sql) === TRUE) {
        echo "sql execution successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        die;
    }
}

$medicalRecords = $conn->query("SELECT * FROM medical_record");

if (isset($_GET['edit'])) {
    $medicalRecord = $conn->query("SELECT * FROM medical_record WHERE id=" . $_GET['edit']);

    $row = $medicalRecord->fetch_assoc();
    $editName = $row['name'];
    $editAge = $row['age'];
    $editSex = $row['sex'];
    $editAddress = $row['address'];
    $editBloodType = $row['blood_type'];
    $editWeight = $row['weight'];
    $editHeight = $row['height'];
    $editTemperature = $row['temperature'];
    $editBloodPressure = $row['blood_pressure'];
    $editComplaint = $row['complaint'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Record Clinic 24Hours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Medical Record Clinic 24Hours</h1>

                <!-- create form with bahasa indonesia -->
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="patientName">Nama Pasien</label>
                                <input type="text" class="form-control" id="patientName" name="name" placeholder="Masukkan nama pasien" value="<?php echo isset($editName) ? $editName : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="age">Umur</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Masukkan umur pasien" value="<?php echo isset($editAge) ? $editAge : ''; ?>">
                            </div>
                            <!-- input jenis kelamin -->
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select class="form-select" id="gender" name="sex">
                                    <option value="L" <?php echo (isset($editSex) && $editSex == 'L') ? "selected" : ""; ?>>Laki-laki</option>
                                    <option value="P" <?php echo (isset($editSex) && $editSex == 'P') ? "selected" : ""; ?>>Perempuan</option>
                                </select>
                            </div>
                            <!-- input alamat   -->
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat pasien"><?php echo isset($editAddress) ? $editAddress : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- input golongan darah -->
                            <div class="form-group">
                                <label for="bloodGroup">Golongan Darah</label>
                                <select class="form-select" id="bloodGroup" name="bloodType">
                                    <option value="A+" <?php echo (isset($editBloodType) && $editBloodType == 'A+') ? "selected" : ""; ?>>A+</option>
                                    <option value="A-" <?php echo (isset($editBloodType) && $editBloodType == 'A-') ? "selected" : ""; ?>>A-</option>
                                    <option value="B+" <?php echo (isset($editBloodType) && $editBloodType == 'B+') ? "selected" : ""; ?>>B+</option>
                                    <option value="B-" <?php echo (isset($editBloodType) && $editBloodType == 'B-') ? "selected" : ""; ?>>B-</option>
                                    <option value="AB+" <?php echo (isset($editBloodType) && $editBloodType == 'AB+') ? "selected" : ""; ?>>AB+</option>
                                    <option value="AB-" <?php echo (isset($editBloodType) && $editBloodType == 'AB-') ? "selected" : ""; ?>>AB-</option>
                                    <option value="O+" <?php echo (isset($editBloodType) && $editBloodType == 'O+') ? "selected" : ""; ?>>O+</option>
                                    <option value="O-" <?php echo (isset($editBloodType) && $editBloodType == 'O-') ? "selected" : ""; ?>>O-</option>
                                </select>
                            </div>
                            <!-- input berat badan -->
                            <div class="form-group">
                                <label for="weight">Berat Badan</label>
                                <input type="number" class="form-control" id="weight" name="weight" placeholder="Masukkan berat badan pasien (kg)" value="<?php echo isset($editWeight) ? $editWeight : ''; ?>">
                            </div>
                            <!-- input tinggi badan -->
                            <div class="form-group">
                                <label for="height">Tinggi Badan</label>
                                <input type="number" class="form-control" id="height" name="height" placeholder="Masukkan tinggi badan pasien (cm)" value="<?php echo isset($editHeight) ? $editHeight : ''; ?>">
                            </div>
                            <!-- input suhu tubuh -->
                            <div class="form-group">
                                <label for="temperature">Suhu Tubuh</label>
                                <input type="number" class="form-control" id="temperature" name="temperature" placeholder="Masukkan suhu tubuh pasien (°C)" value="<?php echo isset($editTemperature) ? $editTemperature : ''; ?>">
                            </div>
                            <!-- input tekanan darah -->
                            <div class="form-group">
                                <label for="bloodPressure">Tekanan Darah</label>
                                <input type="text" class="form-control" id="bloodPressure" name="bloodPressure" placeholder="Masukkan tekanan darah pasien (mmHg)" value="<?php echo isset($editBloodPressure) ? $editBloodPressure : ''; ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="keluhan">Keluhan</label>
                                <textarea class="form-control" id="complaint" name="complaint" rows="3" placeholder="Masukkan keluhan utama pasien"><?php echo isset($editComplaint) ? $editComplaint : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_GET['edit'])) { ?>
                        <button type="submit" class="btn btn-primary mt-3">Simpan Update</button>
                        <a href="index.php" class="btn btn-success mt-3">Tambah Baru</a>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-primary mt-3">Simpan Tambah</button>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>Daftar Rekam Medis</h2>
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Golongan Darah</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Suhu Tubuh</th>
                            <th>Tekanan Darah</th>
                            <th>Keluhan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($medicalRecords->num_rows > 0) {
                            while ($row = $medicalRecords->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["sex"]; ?></td>
                                    <td><?php echo $row["address"]; ?></td>
                                    <td><?php echo $row["blood_type"]; ?></td>
                                    <td><?php echo $row["weight"]; ?> kg</td>
                                    <td><?php echo $row["height"]; ?> cm</td>
                                    <td><?php echo $row["temperature"]; ?> °C</td>
                                    <td><?php echo $row["blood_pressure"]; ?> mmHg</td>
                                    <td><?php echo $row["complaint"]; ?></td>
                                    <td>
                                        <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>