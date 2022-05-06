
    const body = document.getElementById('body');

    // リサイズ時、リロード
    window.addEventListener('resize', e => {
        if (e.target.innerWidth <= 768) {
            location.reload();
        }
    });

    if ( body.classList.contains('works') ) {
        window.addEventListener('DOMContentLoaded', () => {
            const anchorLinks = document.querySelectorAll('a[href*="#"]');
            const anchorLinksArr = Array.prototype.slice.call(anchorLinks);

            // スクロールアニメーション
            anchorLinksArr.forEach(link => {
              link.addEventListener('click', e => {
                e.preventDefault();
                const targetId = link.hash;
                const targetElement = document.querySelector(targetId);
                const targetOffsetTop = window.pageYOffset + targetElement.getBoundingClientRect().top;
                window.scrollTo({
                  top: targetOffsetTop,
                  behavior: "smooth"
                });
              });
            });
          });
    }

      if ( body.classList.contains('works-detail') ) {
          const opacityList = ['header', 'posts-conts--inner', 'posts-cont', 'navigation', 'links'];
          opacityList.forEach( e => {
            document.getElementById(e).classList.add('opacity-1');
          });
      }

      if ( body.classList.contains('home') ) {
            //swiper 768以下で起動
            const mediaQueryList = window.matchMedia("(max-width:767px)");
            let swiper;

            const listener = (event) => {
            if (!event.matches) {
                        swiper = new Swiper('.swiper', {
                            slidesPerView: 3,
                            loop: true,
                            speed: 500,
                            autoplay: {
                                delay: 4000,
                                disableOnInteraction: false
                            },
                            mousewheel: {
                                invert: false,
                            },
                            scrollbar: {
                                el: '.swiper-scrollbar',
                                draggable: true,
                                hide: true
                            },
                        });
                    }
                }
                mediaQueryList.addEventListener("change", listener);
                listener(mediaQueryList);
            }

    // AOS
    // スマホとタブレット時は無効
    AOS.init({
        disable: 'mobile'
    });


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('gnav-component', require('./components/GnavComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
