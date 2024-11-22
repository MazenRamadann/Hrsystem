<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
     <!----===== Iconscout CSS ===== -->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="images/logo.png" alt="">
            </div>
            <span class="logo_name">HR SYSTEM</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li><br>
                <li><a href="manageEmployee.php">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Manage Employees</span>
                </a></li><br>
                <li><a href="#">
                    <i class="uil uil-schedule"></i>
                    <span class="link-name">Manage Leave Requests</span>
                </a></li><br>
                <li><a href="#">
                    <i class="uil uil-user-check"></i>
                    <span class="link-name">Manage Roles</span>
                </a></li><br>
                <li><a href="#">
                    <i class="uil uil-setting"></i>
                    <span class="link-name">Settings</span>
                </a></li><br>
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="container mt-5">
            <h2>Add New Employee</h2>
            <form action="addEmployee_action.php" method="post">
                <!-- Employee Name -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="name" class="form-label">Name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="name" name="txtName" class="form-control" placeholder="Employee's Full Name" required>
                    </div>
                </div>
                <!-- Gender -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="gender" class="form-label">Gender</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="gender" name="txtGender" class="form-control" placeholder="Enter Male or Female" required>
                    </div>
                </div>


    
                <!-- Employee Position -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="position" class="form-label">Position</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="position" name="txtPosition" class="form-control" placeholder="Employee's Position" required>
                    </div>
                </div>
    
                <!-- Employee Department -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="department" class="form-label">Department</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="department" name="txtDepartment" class="form-control" placeholder="Employee's Department" required>
                    </div>
                </div>
    
                <!-- Employee Email -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="email" class="form-label">Email Address</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" id="email" name="txtEmail" class="form-control" placeholder="Employee's Email Address" required>
                    </div>
                </div>
    
                <!-- Employee Status -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                    </div>
                    <div class="col-md-9">
                        <select id="status" name="txtStatus" class="form-control" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
    
                <!-- Employee Start Date -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Start Date</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" id="start_date" name="txtDate" class="form-control" required>
                    </div>
                </div>
    
                <!-- Submit Button -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" value="Submit" class="btn btn-primary w-100">Add Employee</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
