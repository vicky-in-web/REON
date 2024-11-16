const gotopspace = document.getElementById('gotopspace');
window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        gotopspace.classList.add('visible');
    } else {
        gotopspace.classList.remove('visible');
    }
};