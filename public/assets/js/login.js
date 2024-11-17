document.querySelector('.sign-up-btn').addEventListener('click', function() {
    document.querySelector('.container').classList.toggle('active');
});

document.querySelector('.sign-in-btn').addEventListener('click', function() {
    document.querySelector('.container').classList.remove('active');
});
