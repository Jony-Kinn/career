document.addEventListener("DOMContentLoaded", function() {
    const courseForm = document.getElementById("courseForm");
    const courseDashboard = document.getElementById("courseDashboard").querySelector("tbody");

    // Check if the course form exists
    if (!courseForm) {
        console.error("Course form not found");
        return;
    }

    // Add course to the dashboard
    courseForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission

        // Get form values
        const courseName = document.getElementById("course-name").value.trim();
        const facultyId = document.getElementById("faculty-id").value.trim();
        const courseDuration = document.getElementById("course-duration").value.trim();

        // Validate inputs
        if (!courseName || !facultyId || !courseDuration) {
            alert("Please fill in all fields.");
            return;
        }

        // Create a new row with course details
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${courseName}</td>
            <td>${facultyId}</td>
            <td>${courseDuration}</td>
            <td><button class="delete-btn">Delete</button></td>
        `;

        // Append the new row to the dashboard
        courseDashboard.appendChild(newRow);

        // Add event listener to the delete button
        newRow.querySelector(".delete-btn").addEventListener("click", function() {
            newRow.remove(); // Remove the course from the dashboard
            console.log(`Deleted course: ${courseName}`);
        });

        // Log the added course
        console.log(`Added course: ${courseName}, Faculty ID: ${facultyId}, Duration: ${courseDuration}`);

        // Clear form fields
        courseForm.reset();
    });
});
