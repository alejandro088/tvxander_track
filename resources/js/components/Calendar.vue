<template>
  <v-app id="dayspan" v-cloak>
    <ds-calendar-app :calendar="calendar"></ds-calendar-app>
  </v-app>
</template>

<script>
import { Calendar } from 'dayspan';

export default {
  name: 'calendar',
  data: () => ({
    calendar: Calendar.months()
  })
}
</script>

<style>
body, html, #dayspan {
  font-family: Roboto, sans-serif;
  width: 100%;
  height: 100%;
}
</style>