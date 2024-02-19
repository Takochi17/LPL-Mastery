const body = document.body;
const toggleButton = document.getElementById('dark-mode-toggle'); // Add an id to your toggle button

toggleButton.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
});
