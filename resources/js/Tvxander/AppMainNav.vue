<template>
    <nav>
        <v-dialog v-model="loginModal" max-width="400">
            <v-card class="m-4">
                <app-login />
            </v-card>
        </v-dialog>


        <v-dialog v-model="registerModal" max-width="400">
            <v-card>
                <app-register />
            </v-card>
        </v-dialog>

        <v-toolbar dark>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title class="mx-3">
                <div class="logo">
                    <a :href="route('home')">
                        <h2>TVXander</h2>
                    </a>
                </div>
            </v-toolbar-title>

            <template v-if="$page.props.user">
                <div class="mx-2">
                    <inertia-link as="v-btn" href="/dashboard" text>
                        Dashboard
                    </inertia-link>

                    <v-btn @click="logout" color="error">
                        Logout
                    </v-btn>
                </div>
            </template>

            <template v-else>
                <v-btn @click="loginModal = true" text>Log In</v-btn>

                <v-btn @click="registerModal = true" color="red" rounded>Sign Up</v-btn>
            </template>
            <v-spacer></v-spacer>
            <v-btn icon @click="toggleSearchDialog">
                <v-icon>mdi-magnify</v-icon>
            </v-btn>
            <v-btn icon>
                <v-icon>mdi-heart</v-icon>
            </v-btn>
            <v-btn icon>
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>

            <!--Search-->
            <div class="search-sticky" id="search-content" v-if="showSearch" v-click-outside="onClickOutside">
                <div>
                    <v-text-field
                        v-model="query"
                        outlined
                        clearable
                        label="Search for a movie, TV Show or celebrity that you are looking for"
                        type="text"
                        @keyup.enter.prevent="search"
                        light
                        autofocus
                        id="searchfield"
                    />
                </div>
            </div>
        </v-toolbar>
    </nav>
</template>

<script>
import JetNavLink from "@/Jetstream/NavLink";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import AppLogin from "@/Pages/Auth/Login";
import AppRegister from "@/Pages/Auth/Register";

export default {
    components: {
        JetNavLink,
        JetDialogModal,
        JetDropdownLink,
        AppLogin,
        AppRegister
    },
    data() {
        return {
            loginModal: false,
            registerModal: false,
            query: "",
            showSearch: false
        };
    },
    mounted() {},
    methods: {
        onClickOutside(){
            this.showSearch = false;
        },
        logout() {
            this.$inertia.post(route("logout"));
        },
        search() {
            this.$inertia.get("/search", { query: this.query });
        },

        toggleSearchDialog() {
            this.showSearch = !this.showSearch;
        }
    }
};
</script>

<style>
.search-sticky {
    background-color: white;
    padding: 10px;
    position: fixed;
    top: 100px;
    width: 95vw;
    height: 100px;
    margin-top: 100px;
}
</style>
