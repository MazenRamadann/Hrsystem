<?php
include "inc/connection.php"; // Database connection

// Check if ID is passed in the URL
if (isset($_GET['ID'])) {
    $employeeID = $_GET['ID'];

    // Fetch the employee data from the database
    $sql = "SELECT * FROM employees WHERE db_id = '$employeeID'";
    $result = mysqli_query($con, $sql);

    // If employee data is found, display it
    if (mysqli_num_rows($result) > 0) {
        $employee = mysqli_fetch_assoc($result);
    } else {
        echo "Employee not found.";
        exit;
    }
} else {
    echo "No employee ID provided.";
    exit;
}

// Handle form submission to update employee data
if (isset($_POST['updateEmployee'])) {
    $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $startDate = mysqli_real_escape_string($con, $_POST['startDate']);

    // Update query
    $updateSQL = "UPDATE employees SET 
                    db_fullName = '$fullName', 
                    db_gender = '$gender', 
                    db_position = '$position', 
                    db_department = '$department', 
                    db_email = '$email', 
                    db_status = '$status', 
                    db_date = '$startDate' 
                  WHERE db_id = '$employeeID'";

    if (mysqli_query($con, $updateSQL)) {
        echo "Employee updated successfully!";
        // Redirect back to the manage employee page
        header("Location: manageEmployee.php");
        exit;
    } else {
        echo "Error updating employee: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Employee</h2>

        <!-- Back Button with Icon -->
        <a href="manageEmployee.php" class="btn btn-success mb-3">
            <i class="fas fa-arrow-left"></i> Back to Manage Employees
        </a>

        <!-- Employee Edit Form -->
        <form method="POST">
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo $employee['db_fullName']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="Male" <?php echo ($employee['db_gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo ($employee['db_gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="<?php echo $employee['db_position']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" id="department" name="department" value="<?php echo $employee['db_department']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['db_email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $employee['db_status']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $employee['db_date']; ?>" required>
            </div>

            <button type="submit" name="updateEmployee" class="btn btn-primary">Update Employee</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
