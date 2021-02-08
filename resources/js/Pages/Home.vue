<template>
   <app-layout>

    <movie-items />

    
   </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import AppSlider from "@/Tvxander/AppSlider";
import MovieItems from "@/Tvxander/MovieItems";


export default {
  components: {
    AppLayout,
    AppSlider,
    MovieItems,
  },
};
</script>
        