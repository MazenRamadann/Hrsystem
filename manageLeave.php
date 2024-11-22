<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Leave Requests</title>
    <!-- Bootstrap and Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- Sidebar -->
    <nav>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="dashboard.php"><i class="uil uil-estate"></i> Dashboard</a></li>
                <li><a href="manageEmployee.php"><i class="uil uil-users-alt"></i> Manage Employees</a></li>
                <li><a href="manage_leave_requests.php"><i class="uil uil-schedule"></i> Manage Leave Requests</a></li>
                <li><a href="logout.php"><i class="uil uil-signout"></i> Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Section -->
    <section class="dashboard">
        <div class="container mt-5">
            <h2>Manage Leave Requests</h2>

            <!-- Filters -->
            <form method="GET" action="manage_leave_requests.php" class="row mb-4">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="employeeName" placeholder="Search by Employee Name" value="<?php echo isset($_GET['employeeName']) ? $_GET['employeeName'] : ''; ?>">
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="status">
                        <option value="">All Status</option>
                        <option value="Pending" <?php echo (isset($_GET['status']) && $_GET['status'] == "Pending") ? "selected" : ""; ?>>Pending</option>
                        <option value="Approved" <?php echo (isset($_GET['status']) && $_GET['status'] == "Approved") ? "selected" : ""; ?>>Approved</option>
                        <option value="Rejected" <?php echo (isset($_GET['status']) && $_GET['status'] == "Rejected") ? "selected" : ""; ?>>Rejected</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="fromDate" placeholder="From Date" value="<?php echo isset($_GET['fromDate']) ? $_GET['fromDate'] : ''; ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>

            <!-- Leave Requests Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Request ID</th>
                            <th>Employee Name</th>
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "inc/connection.php"; // Ensure this is the correct path

                        // Fetch filters
                        $employeeName = isset($_GET['employeeName']) ? mysqli_real_escape_string($con, $_GET['employeeName']) : '';
                        $status = isset($_GET['status']) ? mysqli_real_escape_string($con, $_GET['status']) : '';
                        $fromDate = isset($_GET['fromDate']) ? mysqli_real_escape_string($con, $_GET['fromDate']) : '';

                        // Base query
                        $query = "SELECT * FROM leave_requests WHERE 1";

                        // Apply filters
                        if ($employeeName) {
                            $query .= " AND employee_name LIKE '%$employeeName%'";
                        }
                        if ($status) {
                            $query .= " AND status = '$status'";
                        }
                        if ($fromDate) {
                            $query .= " AND start_date >= '$fromDate'";
                        }

                        $result = mysqli_query($con, $query);

                        // Check for records
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                                    <tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['employee_name']."</td>
                                        <td>".$row['leave_type']."</td>
                                        <td>".$row['start_date']."</td>
                                        <td>".$row['end_date']."</td>
                                        <td>".$row['reason']."</td>
                                        <td>".$row['status']."</td>
                                        <td>
                                            <a href='approve_leave.php?id=".$row['id']."' class='btn btn-success btn-sm'>Approve</a>
                                            <a href='reject_leave.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Reject</a>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>No leave requests found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
