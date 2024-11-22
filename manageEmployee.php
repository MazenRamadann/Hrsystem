<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <!-- Bootstrap and Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Assuming you have your custom styles here -->
</head>
<body>
    <!-- Sidebar -->
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
                <li><a href="manage_leave_requests.php">
                    <i class="uil uil-schedule"></i>
                    <span class="link-name">Manage Leave Requests</span>
                </a></li><br>
                <li><a href="manage_roles.php">
                    <i class="uil uil-user-check"></i>
                    <span class="link-name">Manage Roles</span>
                </a></li><br>
                <li><a href="settings.php">
                    <i class="uil uil-setting"></i>
                    <span class="link-name">Settings</span>
                </a></li><br>
            </ul>
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>
                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Dashboard Section -->
    <section class="dashboard">
        <div class="container mt-5">
            <h2>Manage Employees</h2>

            <!-- Add Employee Button -->
            <a href="addEmployee.php" class="btn btn-primary mb-3">Add New Employee</a>

            <!-- Search Bar -->
            <div class="mb-3">
                <form action="manageEmployee.php" method="GET">
                    <input type="text" class="form-control" name="searchEmployee" id="searchEmployee" placeholder="Search Employees by Name" value="<?php echo isset($_GET['searchEmployee']) ? $_GET['searchEmployee'] : ''; ?>">
                </form>
            </div>

            <!-- Employee Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "inc/connection.php"; // Ensure this path is correct.

                            // Capture the search query
                            $searchQuery = isset($_GET['searchEmployee']) ? mysqli_real_escape_string($con, $_GET['searchEmployee']) : '';

                            // Modify the SQL query to include search functionality
                            if ($searchQuery) {
                                $sql = "SELECT * FROM employees WHERE db_fullName LIKE '%$searchQuery%'"; // Search by employee name
                            } else {
                                $sql = "SELECT * FROM employees"; // No search query, fetch all employees
                            }

                            $result = mysqli_query($con, $sql);

                            // Check if there are any employees
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                        <tr>
                                            <td>".$row['db_id']."</td>
                                            <td>".$row['db_fullName']."</td>
                                            <td>".$row['db_gender']."</td>
                                            <td>".$row['db_position']."</td>
                                            <td>".$row['db_department']."</td>
                                            <td>".$row['db_email']."</td>
                                            <td>".$row['db_status']."</td>
                                            <td>".$row['db_date']."</td>
                                            <td>
                                                <a href='update.php?ID=".$row['db_id']."' class='btn btn-warning btn-sm'>
                                                    <i class='bi bi-pencil-square'></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <a href='delete.php?ID=".$row['db_id']."' class='btn btn-danger btn-sm'>
                                                    <i class='bi bi-trash'></i> Delete
                                                </a>
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No employees found.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script> <!-- Link to your custom JS -->
</body>
</html>
