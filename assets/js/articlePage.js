let createCommentBtnForm = document.getElementById('createCommentBtn');
let createCommentToggle = document.getElementById('createCommentToggle');
let updateArticleBtnForm = document.getElementById('updateArticleBtn');
let updateArticleToggle = document.getElementById('updateArticleToggle');

// function to open and close article modification form
updateArticleBtnForm.addEventListener('click', (e) => {
    e.preventDefault();
    updateArticleToggle.classList.toggle('updateArticleClick');
});

createCommentBtnForm.addEventListener('click', (e) => {
    e.preventDefault();
    createCommentToggle.classList.toggle('createCommentClick');
});
    