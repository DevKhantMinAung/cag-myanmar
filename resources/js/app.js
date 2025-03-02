import './bootstrap';

const handleScroll = () => {
    const navBar = document.getElementById('nav-bar');
    const goTop = document.getElementById('go-top');
    const scrollPosition = window.scrollY;
    
    navBar?.classList.toggle('filled-nav', scrollPosition > 100);
    goTop?.classList.toggle('hidden', scrollPosition <= 100);
};

const setActiveNav = () => {
    const sections = document.querySelectorAll(".wrapper");
    const navLinks = document.querySelectorAll("nav div");

    let currentSection = null;

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        if (window.scrollY >= sectionTop - sectionHeight / 3) {
            currentSection = section.id;
        }
    });

    navLinks.forEach(navLink => {
        navLink.classList.toggle(
            "active_nav",
            navLink.querySelector("a").getAttribute("href").substring(1) === currentSection
        );
    });
};

const debounce = (func, delay = 50) => {
    let timer;
    return () => {
        clearTimeout(timer);
        timer = setTimeout(func, delay);
    };
};

document.addEventListener("DOMContentLoaded", () => {
    window.addEventListener("scroll", debounce(handleScroll));
    window.addEventListener("scroll", debounce(setActiveNav));
});
