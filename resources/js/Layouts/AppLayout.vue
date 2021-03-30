<template>
    <div>
        <v-app>
            <v-navigation-drawer v-model="drawer" app temporary color="#272727">
                <v-toolbar>
                    <v-app-bar-nav-icon
                        @click="$root.$emit('drawer')"
                    ></v-app-bar-nav-icon>
                    <v-toolbar-title class="mx-3">
                        <div class="logo">
                            <a :href="route('home')">
                                <h2>TVXander</h2>
                            </a>
                        </div>
                    </v-toolbar-title>
                </v-toolbar>

                <v-list dense rounded color="#272727">
                    <v-list-item class="px-2" color="primary">
                        <v-list-item-avatar size="128">
                            <v-img src="/images/uploads/user-img.png"></v-img>
                        </v-list-item-avatar>
                    </v-list-item>
                    <inertia-link
                        v-for="item in items"
                        :key="item.title"
                        as="v-btn"
                        :href="item.route"
                    >
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>{{
                                item.title
                            }}</v-list-item-title>
                        </v-list-item-content>
                    </inertia-link>
                </v-list>
            </v-navigation-drawer>

            <app-header />

            <!-- Page Content -->
            <main>
                <slot></slot>

                <v-alert
                    ref="alert"
                    :type="icon == '' ? 'success' : icon"
                    class="alert"
                >
                    {{ message }}
                </v-alert>
            </main>

            <!-- Modal Portal -->
            <portal-target name="modal" multiple> </portal-target>

            <app-footer />
        </v-app>
    </div>
</template>

<script>
import Preloader from "@/Tvxander/Preloader";
import AppHeader from "@/Tvxander/AppHeader";
import AppSlider from "@/Tvxander/AppSlider";
import MovieItems from "@/Tvxander/MovieItems";
import AppFooter from "@/Tvxander/AppFooter";

export default {
    components: {
        Preloader,
        AppHeader,
        AppSlider,
        MovieItems,
        AppFooter
    },
    data() {
        return {
            alert: false,
            message: "",
            icon: "",
            drawer: false,
            items: [
                {
                    title: "Profile",
                    icon: "mdi-view-dashboard",
                    route: "/dashboard/profile"
                },
                {
                    title: "Favorite Movies",
                    icon: "mdi-forum",
                    route: "/dashboard/favoritemovies"
                },
                {
                    title: "Calendar",
                    icon: "mdi-forum",
                    route: "/dashboard/calendar"
                },
                {
                    title: "My Shows",
                    icon: "mdi-forum",
                    route: "/dashboard/myshows"
                },
                {
                    title: "Unwatched",
                    icon: "mdi-forum",
                    route: "/dashboard/unwatched"
                }
            ]
        };
    },
    mounted() {
        this.$root.$on("notification", data => {
            this.showAlert(data);
        });

        this.$root.$on("drawer", () => {
            this.drawer = !this.drawer;
        });
    },
    methods: {
        showAlert(data) {
            this.icon = data.icon;
            this.message = data.message;
            this.alert = true;

            let alert = document.getElementsByClassName("alert");

            alert[0].classList.toggle("alert-is-shown");

            setTimeout(function() {
                alert[0].classList.toggle("alert-is-shown");
            }, 5000);
        }
    }
};
</script>

<style>
.alert {
    position: fixed;
    top: 40px;
    right: 100px;
    z-index: 9999;
    transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);

    transform: translateX(100%);
    transition: all 500ms;
    opacity: 0;
}

.alert-is-shown {
    opacity: 1;
    transform: translateX(0);
    transition: all 500ms;
}
</style>
