<?php
// Include the database connection
include "inc/connection.php";

// Check if the ID is passed in the URL
if (isset($_GET['id'])) {
    $leaveRequestId = $_GET['id'];

    // Update the leave request status to 'Approved'
    $sql = "UPDATE leave_requests SET status = 'Approved' WHERE id = $leaveRequestId";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Redirect to the manageLeave page with a success message
        header("Location: manageLeave.php?message=Leave request approved");
        exit();
    } else {
        echo "Error approving the leave request.";
    }
}

mysqli_close($con);
?>
