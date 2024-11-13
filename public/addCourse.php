<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses</title>
    <link rel="stylesheet" href="addCourse.css">
</head>
<body>
    <header>
      
        <nav>
            <ul>
                <li><a href="admin.html">Add Institutions</a></li>
                <li><a href="faculties.html">Add Faculties</a></li>
                <li><a href="courses.html">Add Courses</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section id="admin-functions">
        <h2>Add Course under Faculty</h2>
        <form id="courseForm">
            <label for="course-name">Course Name:</label>
            <input type="text" id="course-name" required>

            <label for="faculty-id">Faculty ID:</label>
            <input type="number" id="faculty-id" required>

            <label for="course-duration">Course Duration (years):</label>
            <input type="number" id="course-duration" required min="1">
            
            <button type="submit">Add Course</button>
        </form>

        <h3>Course Dashboard</h3>
        <table id="courseDashboard">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Faculty ID</th>
                    <th>Duration (Years)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Added courses will be displayed here -->
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Career Guidance Platform. All rights reserved.</p>
    </footer>

    <script src="addCourse.js"></script>
</body>
</html>
