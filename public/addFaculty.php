<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculties</title>
    <link rel="stylesheet" href="addFaculty.css">
</head>
<body>
    <header>
        
        <nav>
            <ul>
                
                <li><a href="faculties.html">Add Faculties</a></li>
            </ul>
        </nav>
    </header>

    <section id="admin-functions">
        <h2>Add Faculty</h2>
        <form id="facultyForm">
            <label for="faculty-name">Faculty Name:</label>
            <input type="text" id="faculty-name" required>

            <label for="institution-id">Institution ID:</label>
            <input type="number" id="institution-id" required>
            
            <button type="submit">Add Faculty</button>
        </form>

        <h3>Faculty Dashboard</h3>
        <table id="facultyDashboard">
            <thead>
                <tr>
                    <th>Faculty Name</th>
                    <th>Institution ID</th>
                </tr>
            </thead>
            <tbody>
                <!-- Added faculties will be displayed here -->
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Career Guidance Platform. All rights reserved.</p>
    </footer>

    <script src="addFaculty.js"></script>
</body>
</html>
