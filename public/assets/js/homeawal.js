document.querySelectorAll('.nav-btn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const targetPage = button.getAttribute('onclick').match(/'([^']+)'/)[1];
        window.location.href = targetPage;
    });
});

const loginBtn = document.querySelector('.login-btn');
loginBtn.addEventListener('mouseenter', () => {
    loginBtn.style.transform = 'scale(1.2)';
});
loginBtn.addEventListener('mouseleave', () => {
    loginBtn.style.transform = 'scale(1)';
});

const ctaButton = document.querySelector('.cta-button');
ctaButton.addEventListener('mouseenter', () => {
    ctaButton.style.backgroundColor = '#00bfff';
    ctaButton.style.transform = 'scale(1.1)';
});
ctaButton.addEventListener('mouseleave', () => {
    ctaButton.style.backgroundColor = '#1e90ff';
    ctaButton.style.transform = 'scale(1)';
});

window.addEventListener('scroll', () => {
    const heroContent = document.querySelector('.hero-content');
    const heroPosition = heroContent.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.5;

    if (heroPosition < screenPosition) {
        heroContent.classList.add('fade-in');
    }
});

window.addEventListener('load', () => {
    const heroContent = document.querySelector('.hero-content');
    heroContent.classList.add('fade-in');
});
function toggleNotificationBox() {
    const notificationBox = document.getElementById('notificationBox');
    if (notificationBox.style.display === 'none' || notificationBox.style.display === '') {
        notificationBox.style.display = 'block';
    } else {
        notificationBox.style.display = 'none';
    }
}

document.addEventListener('click', function(event) {
    const notificationBox = document.getElementById('notificationBox');
    const isClickInside = notificationBox.contains(event.target) || event.target.matches('.nav-btn');
    if (!isClickInside) {
        notificationBox.style.display = 'none';
    }
});
