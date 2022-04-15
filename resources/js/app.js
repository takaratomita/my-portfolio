
    const body = document.getElementById('body');

    window.addEventListener('DOMContentLoaded', () => {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
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

      if ( body.classList.contains('works-detail') ) {
          const opacityList = ['header', 'posts-conts--inner', 'posts-cont'];
          opacityList.forEach( e => {
            document.getElementById(e).classList.add('opacity-1');
          });
      }

      if ( body.classList.contains('home') ) {

        // swipper
        let swiper = new Swiper(".swiper", {
            direction: 'vertical',
            slidesPerView: 3,
            // slidesPerView: 1,
            mousewheel: {
                invert: false,
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
                hide: true
            },
            breakpoints: {
                // 768px以上の場合
                768: {
                    direction: 'horizontal',
                },
                autoplay: {
                    delay: 3000,
                },
            },

        });
      }


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
