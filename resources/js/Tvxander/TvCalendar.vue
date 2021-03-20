<template>
    <FullCalendar :options="calendarOptions" @eventDestroy="eventDestroy" />
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import tippy from "tippy.js";
import "tippy.js/dist/tippy.css";

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
                eventDidMount: this.getEventDetailsPopup,
            }
        };
    },
    created() {
        axios.get(`/events`).then(response => {
            this.calendarOptions.events = response.data;
        });
    },
    methods: {
        getEventDetailsPopup(info) {
            tippy(info.el, {
                content: info.event.extendedProps.description,
                delay: { show: 500, hide: 300 },
            });
        },
        eventDestroy(info) {
            //get uuid
            let id = parseInt(info.el.getAttribute("data-vue-id"));

            if (this.eventsObj[id]) {
                //if exist destroy
                this.eventsObj[id].$destroy(true);
            }
        },
    },
};
</script>

<style>


.fc-event-title {
    color: black;
}

</style>
