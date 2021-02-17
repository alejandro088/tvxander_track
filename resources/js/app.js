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

import Vuetify from "vuetify"; // path to vuetify export
import "vuetify/dist/vuetify.min.css";

import { MdSwitch } from "vue-material/dist/components";
import "vue-material/dist/vue-material.min.css";
import "vue-material/dist/theme/default.css";

Vue.use(MdSwitch);

Vue.use(Vuetify);

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);

const app = document.getElementById("app");

new Vue({
    vuetify: new Vuetify({
        theme: { dark: true }
    }),
    store: store,
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(app);
