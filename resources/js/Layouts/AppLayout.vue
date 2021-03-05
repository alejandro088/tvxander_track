<template>
    <div>
        <v-app>
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
    data(){
        return {
            alert: false,
            message: "",
            icon: ""
        }
    },
    mounted() {
        this.$root.$on('notification', (data) => {
            this.showAlert(data);
            console.log(data);
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
        },
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