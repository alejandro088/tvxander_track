<template>
    <FullCalendar :options="calendarOptions" />
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

export default {
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    data() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin],
                initialView: "dayGridMonth",
                events: [],
                eventDidMount: function(info) {
                    console.log(info.event.extendedProps);
                    console.log(info.el);
                     $(info.el).tooltip({title: info.event.extendedProps.description,
                            container: 'body',
                            delay: { "show": 500, "hide": 300 }
                    });
                }
            }
        };
    },
    created() {
        const data = axios.get(`/events`).then(response => {
            this.calendarOptions.events = response.data;
        });
    }
};
</script>

<style>
.fc-event-title {
    color: black;
}
</style>
