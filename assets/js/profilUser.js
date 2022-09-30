let updateProfilUserBtnLinkForm = document.getElementById('updateProfilUserBtn');
let updateProfilUserToggle = document.getElementById('updateProfilUserToggle');

// function to open and close article modification form
updateProfilUserBtnLinkForm.addEventListener('click', (e) => {
    e.preventDefault();
    updateProfilUserToggle.classList.toggle('updateProfilUserClick');
});
    