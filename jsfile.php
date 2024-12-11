    <!-- boostrap -->
    <script type="text/javascript" src="plugin/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <!-- jqery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./navbar-mobile.js"></script>

    <script type="module">
        import gotopbtn from "./components/gotopbtn.js";
        import contact_modal from "./components/contact_modal.js";
        import newslist from "./components/newslist.js";

        Vue.createApp(gotopbtn).mount('#gotopbtn');
        Vue.createApp(contact_modal).mount('#contact_modal');
        Vue.createApp(newslist).mount('#newslist');
    </script>
    <script>
        document.addEventListener('scroll', () => {
            const serviceSection = document.getElementById('service');
            const viewportHeight = window.innerHeight;
            const sectionTop = serviceSection.getBoundingClientRect().top;

            if (sectionTop < viewportHeight * 0.8) { // 當 section 80% 進入視口時觸發動畫
                serviceSection.classList.add('visible');
            } else {
                serviceSection.classList.remove('visible');
            }
        });
        document.addEventListener('scroll', () => {
            const suggestSection = document.getElementById('suggest');
            const viewportHeight = window.innerHeight;
            const sectionTop = suggestSection.getBoundingClientRect().top;

            if (sectionTop < viewportHeight * 0.8) {
                suggestSection.classList.add('visible');
            } else {
                suggestSection.classList.remove('visible');
            }
        });
        document.addEventListener('scroll', () => {
            const thenewsSection = document.getElementById('thenews');
            const viewportHeight = window.innerHeight;
            const sectionTop = thenewsSection.getBoundingClientRect().top;

            if (sectionTop < viewportHeight * 0.8) {
                thenewsSection.classList.add('visible');
            } else {
                thenewsSection.classList.remove('visible');
            }
        });
    </script>
