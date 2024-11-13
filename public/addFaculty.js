document.getElementById("facultyForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const name = document.getElementById("faculty-name").value;
    const institutionId = document.getElementById("institution-id").value;

    const row = `<tr><td>${name}</td><td>${institutionId}</td></tr>`;
    document.querySelector("#facultyDashboard tbody").insertAdjacentHTML("beforeend", row);

    document.getElementById("facultyForm").reset();
});
