document.addEventListener("DOMContentLoaded", function() {
    const institutionSelect = document.getElementById("institution");
    const courseSelect = document.getElementById("course");
    const addCourseButton = document.getElementById("addCourseButton");
    const subjectInput = document.getElementById("subject");
    const gradeInput = document.getElementById("grade");
    const addResultButton = document.getElementById("addResultButton");
    const addedResultsList = document.getElementById("addedResultsList");
    
    const dashboardSelectedInstitution = document.getElementById("dashboardSelectedInstitution");
    const dashboardSelectedCoursesList = document.getElementById("dashboardSelectedCoursesList");
    const dashboardEditInstitutionBtn = document.getElementById("dashboardEditInstitutionBtn");
    const dashboardDeleteInstitutionBtn = document.getElementById("dashboardDeleteInstitutionBtn");

    let selectedInstitution = null;
    let selectedCourses = [];
    let results = {}; // Store results as an object

    function displayInstitution(institution) {
        dashboardSelectedInstitution.textContent = institution;
        dashboardEditInstitutionBtn.style.display = "inline";
        dashboardDeleteInstitutionBtn.style.display = "inline";
    }

    function displayCourses() {
        dashboardSelectedCoursesList.innerHTML = "";
        if (selectedCourses.length === 0) {
            dashboardSelectedCoursesList.innerHTML = "<li>No courses selected</li>";
            return;
        }
        selectedCourses.forEach((course, index) => {
            const courseItem = document.createElement("li");
            courseItem.textContent = course;

            // Create edit and delete buttons for each course
            const editBtn = document.createElement("button");
            editBtn.textContent = "Edit";
            editBtn.addEventListener("click", () => editCourse(index));

            const deleteBtn = document.createElement("button");
            deleteBtn.textContent = "Delete";
            deleteBtn.addEventListener("click", () => deleteCourse(index));

            // Append buttons to course item
            courseItem.appendChild(editBtn);
            courseItem.appendChild(deleteBtn);
            dashboardSelectedCoursesList.appendChild(courseItem);
        });
    }

    function updateResultsDisplay() {
        addedResultsList.innerHTML = ""; // Clear current list
        if (Object.keys(results).length === 0) {
            addedResultsList.innerHTML = "<li>No results added yet.</li>";
            return;
        }
        
        for (const [subject, grade] of Object.entries(results)) {
            const resultItem = document.createElement("li");
            resultItem.textContent = `${subject}: ${grade}`;
            addedResultsList.appendChild(resultItem);
        }
    }

    addResultButton.addEventListener("click", function() {
        const subject = subjectInput.value.trim();
        const grade = parseInt(gradeInput.value, 10);

        if (!subject || isNaN(grade) || grade < 0 || grade > 100) {
            alert("Please enter a valid subject and a grade between 0 and 100.");
            return;
        }

        // Store the result
        results[subject] = grade;

        // Update the display of added results
        updateResultsDisplay();

        // Clear inputs
        subjectInput.value = "";
        gradeInput.value = "";
    });

    addCourseButton.addEventListener("click", function() {
        const institution = institutionSelect.value;
        const course = courseSelect.value;

        // Check if there are any results entered
        if (Object.keys(results).length === 0) {
            alert("Please add at least one result before selecting a course.");
            return;
        }

        if (!institution) {
            alert("Please select an institution.");
            return;
        }

        // Check if at least one result is 50 or above
        if (!hasValidResults()) {
            alert("You must have at least one result of 50 or above to apply.");
            return;
        }

        if (!selectedInstitution) {
            selectedInstitution = institution;
            displayInstitution(institution);
        } else if (selectedInstitution !== institution) {
            alert("You can only apply to one institution at a time.");
            return;
        }

        if (selectedCourses.length >= 2) {
            alert("You can only apply to two courses per institution.");
            return;
        }

        if (!selectedCourses.includes(course)) {
            selectedCourses.push(course);
            displayCourses();
        } else {
            alert("You have already selected this course.");
        }
    });

    function hasValidResults() {
       return Object.values(results).some(grade => grade >= 50);
   }

   function editCourse(index) {
       const courseToEdit = selectedCourses[index];
       // Set dropdown to the selected course for editing
       courseSelect.value = courseToEdit; 
       
       // Remove from the list and update display
       deleteCourse(index); 
   }

   function deleteCourse(index) {
       selectedCourses.splice(index, 1);
       displayCourses();
       if (selectedCourses.length === 0) {
           dashboardSelectedCoursesList.innerHTML = "<li>No courses selected</li>";
       }
   }

   // Edit and delete functionality for the dashboard buttons
   dashboardEditInstitutionBtn.addEventListener("click", () => {
       selectedInstitution = null;
       displayInstitution('None');
       
       // Reset selections in dropdowns
       institutionSelect.value = "";
       
       // Clear the courses list
       selectedCourses = [];
       displayCourses();
       
       // Hide edit/delete buttons
       dashboardEditInstitutionBtn.style.display = "none";
       dashboardDeleteInstitutionBtn.style.display = "none";
   });

   dashboardDeleteInstitutionBtn.addEventListener("click", () => {
       selectedInstitution = null;

       // Clear selections
       displayInstitution('None');
       selectedCourses = [];
       results = {}; // Clear all results
       updateResultsDisplay(); // Update the displayed results

       displayCourses();
       
       // Hide edit/delete buttons
       dashboardEditInstitutionBtn.style.display = "none";
       dashboardDeleteInstitutionBtn.style.display = "none";
   });
});