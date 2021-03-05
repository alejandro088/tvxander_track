<template>
    <!-- BEGIN | Header -->
    <header class="tw-ht-header tw-full-width-hd">
        
        <app-main-nav />
            
    </header>
    <!-- END | Header -->
</template>

<script>
import JetNavLink from "@/Jetstream/NavLink";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import AppLogin from "@/Pages/Auth/Login";
import AppRegister from "@/Pages/Auth/Register";
import AppMainNav from "./AppMainNav";

export default {
    components: {
        JetNavLink,
        JetDialogModal,
        JetDropdownLink,
        AppLogin,
        AppRegister,
        AppMainNav
    },
    data() {
        return {
            loginModal: false,
            registerModal: false,
        };
    },
    methods: {
        
    }
};
</script>

<style></style>
