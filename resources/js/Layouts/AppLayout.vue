<template>
  <div>
    
    <app-header />

     <!-- Page Content -->
    <main>
        <slot></slot>
    </main>

    <!-- Modal Portal -->
    <portal-target name="modal" multiple>
    </portal-target>

    <app-footer />

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
    AppFooter,
  },
};
</script>
        

