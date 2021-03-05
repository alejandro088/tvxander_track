require("./bootstrap");

// Import modules...
import Vue from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin
} from "@inertiajs/inertia-vue";
import PortalVue from "portal-vue";
import { store } from "./store/store";
import VueYoutube from "vue-youtube";
import { DateTime } from "luxon";

Vue.prototype.$date = DateTime;

Vue.use(VueYoutube);

import vuetify from '@/plugins/vuetify' // path to vuetify export

import "vue-material/dist/vue-material.min.css";
import "vue-material/dist/theme/default.css";

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);

const app = document.getElementById("app");

Vue.filter('humanize', function (value) {
    return DateTime
                .fromISO(value)
                .setLocale("es")
                .toRelative();
        
  })

new Vue({
    vuetify,
    store: store,
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(app);
