<template>
    <v-card class="m-4">
        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
       
            <form @submit.prevent="submit">
                 <v-card-text>
                <div>
                    <v-text-field
                        label="E-Mail"
                        v-model="form.email"
                        outlined
                        shaped
                        dark
                        autofocus
                    ></v-text-field>
                </div>

                <div class="mt-4">
                    <v-text-field
                        label="Password"
                        v-model="form.password"
                        outlined
                        shaped
                        dark
                        type="password"
                    ></v-text-field>
                </div>

                <div class="block mt-4">

                    <v-container class="px-0" fluid>
                        <v-checkbox
                            v-model="form.remember"
                            label="Remember me"
                        ></v-checkbox>
                    </v-container>
                </div>

                </v-card-text>

                <v-card-actions>

                <div class="flex items-center justify-end mt-4">
                    <inertia-link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                    >
                        Forgot your password?
                    </inertia-link>

                    <v-btn
                        class="ml-4"
                        :loading="loading"
                        :disabled="loading"
                        @click="submit"
                    >
                        Login
                    </v-btn>
                </div>
                </v-card-actions>
            </form>
        
    </v-card>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
    components: {
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors
    },

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false
            }),
            loading: false,
        };
    },

    methods: {
        submit() {
            this.loading = true;
            
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? "on" : ""
                }))
                .post("/login", {
                    onFinish: () => {
                        this.loading = false;
                        this.form.reset("password")
                    }
                });
        }
    }
};
</script>

<style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
    border: 0;
    -webkit-text-fill-color: white;
    -webkit-box-shadow: 0 0 0px 1000px transparent inset;
    transition: background-color 5000s ease-in-out 0s;
    background-color: transparent !important;
}
</style>
