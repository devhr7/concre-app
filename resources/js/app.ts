import '../css/app.css';
import '../js/axios.ts';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { initializeTheme } from './composables/useAppearance';

import { Ziggy } from './ziggy';
import { route, ZiggyVue } from 'ziggy-js';

import ToastService from 'primevue/toastservice'
import ConfirmationService from 'primevue/confirmationservice'


import 'sweetalert2/dist/sweetalert2.min.css';
import VueSweetalert2 from 'vue-sweetalert2';

import Aura from '@primeuix/themes/aura';
import PrimeVue from 'primevue/config';

import {PrimeVueResolver} from '@primevue/auto-import-resolver';


import 'primeicons/primeicons.css'
import Ripple from 'primevue/ripple';
import AnimateOnScroll from 'primevue/animateonscroll';
import FocusTrap from 'primevue/focustrap';
import { client } from 'laravel-precognition-vue';
import { createPinia } from 'pinia';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const pinia = createPinia();
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)
            .use(VueSweetalert2)
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                },
            })
            .directive('ripple', Ripple)
            .directive('animateonscroll', AnimateOnScroll)
            .directive('focustrap', FocusTrap)
            .use(ZiggyVue, Ziggy)
            .use(ToastService)
            .use(ConfirmationService)
            
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

// This will set light / dark mode on page load...
initializeTheme();
