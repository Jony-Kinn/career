// public/js/script.js

document.addEventListener('DOMContentLoaded', () => {
    const roleSelect = document.getElementById('role');

    roleSelect.addEventListener('change', () => {
        const selectedRole = roleSelect.value;
        // You can add logic based on the selected role
        console.log(`Selected role: ${selectedRole}`);
    });
});

