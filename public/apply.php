<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link rel="stylesheet" href="apply.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="apply.html">Apply</a>
        <a href="view_admission.php">View Admissions</a>
        <a href="profile.html">Profile</a>
    </div>

    <!-- Page Content -->
    <div class="content">
        <h2>Apply for Courses</h2>

        <!-- Dashboard Section -->
        <div class="dashboard">
            <h3>Your Selected Institution and Courses</h3>
            <p><strong>Institution:</strong> 
                <span id="dashboardSelectedInstitution">None</span> 
                <button id="dashboardEditInstitutionBtn" style="display: none;">Edit</button>
                <button id="dashboardDeleteInstitutionBtn" style="display: none;">Delete</button>
            </p>
            <p><strong>Courses:</strong></p>
            <ul id="dashboardSelectedCoursesList">
                <li>No courses selected</li>
            </ul>
        </div>

        <!-- Results Entry Section -->
        <div class="results-entry">
            <h3>Enter Your Results</h3>
            <div id="subjectResultsContainer">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" placeholder="Enter subject" required>
                
                <label for="grade">Grade:</label>
                <input type="number" id="grade" placeholder="Enter grade (0-100)" min="0" max="100" required>

                <button type="button" id="addResultButton">Add Result</button>
            </div>

            <!-- Display added subjects and grades -->
            <ul id="addedResultsList">
                <li>No results added yet.</li>
            </ul>
        </div>

        <!-- Course Selection Form -->
        <div class="course-selection">
            <h3>Select Institution and Courses</h3>
            <form id="courseForm">
                <label for="institution">Institution:</label>
                <select id="institution" required>
                    <option value="">Select Institution</option>
                    <option value="University A">National University of Lesotho</option>
                    <option value="University B">Limkokwing University</option>
                    <option value="College C">Lerotholi Polytechnic</option>
                </select>

                <label for="course">Course:</label>
                <select id="course" required>
                    <option value="">Select Course</option>
                    <option data-requirements='{"Math": 70, "English": 65}' value="Course 1">BSc Software Engineering</option>
                    <option data-requirements='{"Math": 80, "Science": 75}' value="Course 2">Business Administration</option>
                    <option data-requirements='{"English": 75, "History": 70}' value="Course 3">Graphic Design</option>
                </select>

                <button type="button" id="addCourseButton">Add Course</button>
            </form>
        </div>

    </div>

    <!-- JavaScript for handling selections and dashboard updates -->
    <script src="apply.js"></script>
</body>
</html>