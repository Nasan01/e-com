import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import { createStore } from 'vuex';

const store = createStore({
    state() {
        return {
            cart: [],
        }
    },

    getters: {
        cartCount(state) {
            return state.cart.length;
        },

        total(state) {
            let total = 0;

            state.cart.forEach(c => {
                if(!c.quantity) {
                    total += c.price;
                } else {
                    total += (c.price * c.quantity);
                }
            });

            return total;
        }
    },

    mutations: {
        add(state, payload) {

            const isAlreadyAdded = state.cart.includes(payload);

            if(!isAlreadyAdded) {
                state.cart.push(payload);
            } else {
                alert('this product is already added into the cart! ');
            }

        },

        remove(state, payload) {
            state.cart = state.cart.filter(c => c.id !== payload.id);
        },

        clear(state) {
            state.cart = [];
        },

        calculateTotal(state, payload) {
            const cartId = state.cart.indexOf(payload.cart);

            state.cart[cartId].quantity = payload.quantity;
        }
    }
})

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(store)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#570DF8' });
