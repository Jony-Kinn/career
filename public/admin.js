document.getElementById("institutionForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from refreshing the page

    // Get institution name and location from the form
    const name = document.getElementById("institution-name").value;
    const location = document.getElementById("institution-location").value;

    // Create a new table row
    const row = document.createElement("tr");

    // Add the institution data and delete button to the row
    row.innerHTML = `
        <td>${name}</td>
        <td>${location}</td>
        <td><button class="delete-btn">Delete</button></td>
    `;

    // Add an event listener to the delete button to remove the row
    row.querySelector(".delete-btn").addEventListener("click", function() {
        row.remove(); // Remove the row from the table
    });

    // Append the new row to the institution dashboard
    document.querySelector("#institutionDashboard tbody").appendChild(row);

    // Clear the form fields
    document.getElementById("institutionForm").reset();
});
