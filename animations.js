function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function addAnimationOnScroll(elements, animationClass) {
    elements.forEach(element => {
        if (isInViewport(element)) {
            element.classList.add(animationClass);
        }
    });
}

const heroElements = document.querySelectorAll('.hero > *');
const menuElements = document.querySelectorAll('.menu > *');
const aboutElements = document.querySelectorAll('.about > *');
const contactElements = document.querySelectorAll('.contact > *');

window.addEventListener('load', () => {
    addAnimationOnScroll(heroElements, 'fadeInUp');
    addAnimationOnScroll(menuElements, 'fadeInUp');
    addAnimationOnScroll(aboutElements, 'fadeInUp');
    addAnimationOnScroll(contactElements, 'fadeInUp');
});

window.addEventListener('scroll', () => {
    addAnimationOnScroll(heroElements, 'fadeInUp');
    addAnimationOnScroll(menuElements, 'fadeInUp');
    addAnimationOnScroll(aboutElements, 'fadeInUp');
    addAnimationOnScroll(contactElements, 'fadeInUp');
});