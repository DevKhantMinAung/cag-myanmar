import './bootstrap';
const handleScroll = () => {
    const navBar = document.getElementById('nav-bar');
    const goTop = document.getElementById('go-top');
    const scrollPosition = window.scrollY;
    if (scrollPosition > 100) {
        navBar.classList.add('filled-nav')
        goTop.classList.remove('hidden')

    } else {
        navBar.classList.remove('filled-nav')
        goTop.classList.add('hidden')
    }
}

window.addEventListener('scroll', handleScroll);