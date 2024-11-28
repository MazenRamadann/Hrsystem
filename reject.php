<?php
// Include the database connection
include "inc/connection.php";

// Check if the ID is passed in the URL
if (isset($_GET['id'])) {

    $leaveRequestId = $_GET['id'];

    // Update the leave request status to 'Rejected'
    $sql= "UPDATE leave_requests SET status = 'Rejected' WHERE id = $leaveRequestId";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Redirect to the manageLeave page with a success message
        header("Location: manageLeave.php?message=Leave request rejected");
        exit();
    } else {
        echo "Error rejecting the leave request.";
    }
}

mysqli_close($con);
?>

