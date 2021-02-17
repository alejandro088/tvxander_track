<template>
    <nav id="mainNav" class="navbar navbar-default navbar-custom">
        <!-- Brand and toggle get grouped for better mobile display -->

        <jet-dialog-modal :show="loginModal" @close="loginModal = false">
            <template #content>
                <app-login />
            </template>
        </jet-dialog-modal>

        <jet-dialog-modal :show="registerModal" @close="registerModal = false">
            <template #content>
                <app-register />
            </template>
        </jet-dialog-modal>

        <div class="navbar-header logo">
            <div
                class="navbar-toggle"
                data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1"
            >
                <span class="sr-only">Toggle navigation</span>
                <div id="nav-icon1">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <a :href="route('home')">
                <h2>TVXander</h2>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div
            class="collapse navbar-collapse flex-parent"
            id="bs-example-navbar-collapse-1"
        >
            <ul class="nav navbar-nav flex-child-menu menu-left">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>

                <template v-if="$page.props.user">
                    <li>
                        <inertia-link href="/dashboard">
                            Dashboard
                        </inertia-link>
                    </li>
                    <!-- Authentication -->
                    <form @submit.prevent="logout">
                        <button
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        >
                            Logout
                        </button>
                    </form>
                </template>
                <template v-else>
                    <li class="loginLink">
                        <a href="#" @click="loginModal = true">LOG In</a>
                    </li>
                    <li class="btn signupLink">
                        <a href="#" @click="registerModal = true">sign up</a>
                    </li>
                </template>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
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
            registerModal: false
        };
    },
    methods: {
        logout() {
            this.$inertia.post(route("logout"));
        }
    }
};
</script>

<style></style>
