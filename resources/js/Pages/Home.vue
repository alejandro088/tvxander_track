<template>
    <app-layout>
        <page-breadcumb section="Home" />

        <movie-items />
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import AppSlider from "@/Tvxander/AppSlider";
import MovieItems from "@/Tvxander/MovieItems";
import PageBreadcumb from "@/Tvxander/PageBreadcumb";

export default {
    components: {
        AppLayout,
        AppSlider,
        MovieItems,
        PageBreadcumb
    }
};
</script>
