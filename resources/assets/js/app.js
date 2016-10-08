
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

import Notification from 'vue-bulma-notification';
import UserRegister from './layouts/components/UserRegister';
import Dashboard from './layouts/components/Dashboard';
import Painel from './layouts/components/Painel';
import MessagesList from './layouts/components/messages/Index';
import PhotosList from './layouts/components/photos/Index';
import GuestsList from './layouts/components/guests/Index';


Vue.component('notification', Notification);
Vue.component('user-register', UserRegister);
Vue.component('dashboard', Dashboard);
Vue.component('painel', Painel);
Vue.component('messages-list', MessagesList);
Vue.component('guests-list', GuestsList);
Vue.component('photos-list', PhotosList);

const app = new Vue({
    el: '#app'
});
