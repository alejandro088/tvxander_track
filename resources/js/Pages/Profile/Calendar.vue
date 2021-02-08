<template>
  <app-layout>
    
    <user-breadcumb section="Calendar" />

    <div class="page-single">
      <div class="container">
        <div class="row ipad-width2">
          <div class="col-md-3 col-sm-12 col-xs-12">
            <profile-sidebar />
          </div>
          <div class="col-md-9 col-sm-12 col-xs-12">
            <tv-calendar />
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import ProfileSidebar from '@/Tvxander/ProfileSidebar';
import UserBreadcumb from '@/Tvxander/UserBreadcumb';
import TvCalendar from '@/Tvxander/Calendar';

export default {
     components: {
            AppLayout,
            ProfileSidebar,
            UserBreadcumb,
            TvCalendar
     }
};
</script>

<style>
</style>