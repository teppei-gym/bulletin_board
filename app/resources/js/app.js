/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

const favorite = document.querySelectorAll('.js-favorite');
const csrf = document.getElementsByName('csrf-token')[0].content;

for (let el of [...favorite]) {
    el.addEventListener('click', function (e) {
        const _this = this;
        console.log(_this);
        const countSpan = e.target.nextElementSibling;
        const userId = countSpan.dataset.userId;
        const postId = countSpan.dataset.postId;

        ajax(url, { userId: userId, postId: postId }).then(function (count) {
            console.log(count);
            countSpan.innerHTML = `  ${count}`;
            _this.classList.toggle('text-danger');
        });
    })
}

const url = document.getElementsByName('favorite-url')[0].content;

function ajax(url, { userId, postId }) {
    return new Promise(function (resolve) {
        const xhr = new XMLHttpRequest();

        xhr.open('POST', url);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8')
        xhr.setRequestHeader('X-CSRF-token', csrf);

        xhr.send(`user_id=${userId}&post_id=${postId}`);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                resolve(xhr.responseText);
            }
        }
    })
}

