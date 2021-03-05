<template>
    <div class="bg-white">
        <full-calendar
            :events="events"
            :config="config"
        ></full-calendar>
    </div>
</template>

<script>
import { FullCalendar } from "vue-full-calendar";
import axios from "axios";

export default {
    name: "calendar",
    data() {
        return {
            events: null,
            config: {
                defaultView: "month"
            }
        };
    },
    created() {
        axios.get(`/events`).then(response => {
            this.events = response.data;
        });
    },
    components: {
        FullCalendar
    }
};
</script>

<style>
.fc-event-title {
    color: black;
}
</style>
