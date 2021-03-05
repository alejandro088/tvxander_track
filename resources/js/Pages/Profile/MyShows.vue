<template>
    <app-layout>
        <user-breadcumb section="My Shows" />

        <div class="page-single">
            <div class="container">
                <div class="row ipad-width2">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <profile-sidebar />
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="text-white col-md-12">
                            <current-shows :shows="currentShows" />

                            <ended-shows :shows="endedShows" />

                            <canceled-shows :shows="canceledShows" />

                            <archived-shows :shows="archivedShows" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ProfileSidebar from "@/Tvxander/ProfileSidebar";
import UserBreadcumb from "@/Tvxander/UserBreadcumb";
import CurrentShows from "./componets/CurrentShows";
import EndedShows from "./componets/EndedShows";
import CanceledShows from "./componets/CanceledShows";
import ArchivedShows from "./componets/ArchivedShows";

export default {
    components: {
        AppLayout,
        ProfileSidebar,
        UserBreadcumb,
        CurrentShows,
        EndedShows,
        CanceledShows,
        ArchivedShows
    },
    props: ["currentShows", "endedShows", "canceledShows", "archivedShows"],
    methods: {
        toJson(json) {
            return JSON.parse(json);
        },
        async showDelete(id) {
            try {
                const response = await window.axios.delete(`/tv/${id}`);
                console.log(response);
            } catch (error) {
                console.log(error);
            }
        },
        showArchive(id) {}
    }
};
</script>

<style></style>
