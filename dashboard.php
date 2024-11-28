<?php
session_start();

if(!isset($_SESSION['user']))
  header("Location:login.php?error=2");

    

?>


<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
            <img src="img/profile.jpg" alt="HR Logo">
            </div>

            <span class="logo_name">HR SYSTEM</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li><br>
                <li><a href="manageEmployee.php">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Manage Employees</span>
                </a></li><br>
                <li><a href="manageLeave.php">
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
                
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <!-- <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a> -->

                <div class="mode-toggle">
                  <!-- <span class="switch"></span> -->
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-users-alt"></i>  <!-- Icon for Total Employees -->
                        <span class="text">Total Employees</span>
                        <span class="number">
                        <?php
                                // Database connection
                                include "inc/connection.php";
                                // Query to get total number of employees

                                $sql = "SELECT COUNT(*) AS total FROM Employees";
                                $result = $con->query($sql);

                                // Fetch the result and display the total count
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo $row['total'];
                                } else {
                                    echo "0";  // In case no employees exist
                                }
                                // Close the connection
                                $con->close();
                            ?>
                        </span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-clock"></i> <!-- Icon for Pending Leave Requests -->
                        <span class="text">Pending Leave Requests</span>
                        <span class="number">5</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-user-minus"></i> <!-- Icon for Employees on Leave -->
                        <span class="text">Employees on Leave</span>
                        <span class="number">3</span>
                    </div>
                </div>
                
            </div>
            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <span class="data-list">Prem Shahi</span>
                        <span class="data-list">Deepa Chand</span>
                        <span class="data-list">Manisha Chand</span>
                        <span class="data-list">Pratima Shahi</span>
                        <span class="data-list">Man Shahi</span>
                        <span class="data-list">Ganesh Chand</span>
                        <span class="data-list">Bikash Chand</span>
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <span class="data-list">premshahi@gmail.com</span>
                        <span class="data-list">deepachand@gmail.com</span>
                        <span class="data-list">prakashhai@gmail.com</span>
                        <span class="data-list">manishachand@gmail.com</span>
                        <span class="data-list">pratimashhai@gmail.com</span>
                        <span class="data-list">manshahi@gmail.com</span>
                        <span class="data-list">ganeshchand@gmail.com</span>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined</span>
                        <span class="data-list">2022-02-12</span>
                        <span class="data-list">2022-02-12</span>
                        <span class="data-list">2022-02-13</span>
                        <span class="data-list">2022-02-13</span>
                        <span class="data-list">2022-02-14</span>
                        <span class="data-list">2022-02-14</span>
                        <span class="data-list">2022-02-15</span>
                    </div>
                    <div class="data type">
                        <span class="data-title">Type</span>
                        <span class="data-list">New</span>
                        <span class="data-list">Member</span>
                        <span class="data-list">Member</span>
                        <span class="data-list">New</span>
                        <span class="data-list">Member</span>
                        <span class="data-list">New</span>
                        <span class="data-list">Member</span>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                        <span class="data-list">Liked</span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    

    <script src="script.js"></script>
</body>
</html>