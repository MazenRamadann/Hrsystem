<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Roles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Manage Roles</h2>
    <form action="add_role.php" method="POST" class="mb-4">
        <div class="mb-3">
            <label for="role_name" class="form-label">Role Name</label>
            <input type="text" id="role_name" name="role_name" class="form-control" placeholder="Enter Role Name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Role Description</label>
            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter Role Description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Role</button>
    </form>

    <h3>Existing Roles</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Role Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include "inc/connection.php";
        $result = mysqli_query($con, "SELECT * FROM roles");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['role_name']}</td>
                <td>{$row['description']}</td>
                <td>
                    <a href='edit_role.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='delete_role.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
