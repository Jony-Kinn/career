<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Add Institutions</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
       
        <nav>
            <ul>
                <li><a href="admin.html">Add Institutions</a></li>
                <li><a href="addFaculty.php">Add Faculties</a></li>
                <li><a href="addCourse.php">Add Courses</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section id="admin-functions">
        <h2>Add High Learning Institution</h2>
        <form id="institutionForm">
            <label for="institution-name">Institution Name:</label>
            <input type="text" id="institution-name" required>
            
            <label for="institution-location">Location:</label>
            <input type="text" id="institution-location" required>
            
            <button type="submit">Add Institution</button>
        </form>

        <h3>Institution Dashboard</h3>
        <table id="institutionDashboard">
            <thead>
                <tr>
                    <th>Institution Name</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Added institutions will be displayed here -->
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Career Guidance Platform. All rights reserved.</p>
    </footer>

    <script src="admin.js"></script>
</body>
</html>
