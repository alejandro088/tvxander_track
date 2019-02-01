<template>
  <div>
  <full-calendar :events="events" :config="config" @event-render="eventRender"></full-calendar>
  </div>
</template>

<script>
import { FullCalendar } from 'vue-full-calendar'
import axios from 'axios'

var tooltip = $('<div/>').qtip({
		id: 'fullcalendar',
		prerender: true,
		content: {
			text: ' ',
			title: {
				button: true
			}
		},
		position: {
			my: 'bottom center',
			at: 'top center',
			target: 'mouse',
			viewport: $('full-calendar'),
			adjust: {
				mouse: false,
				scroll: false
			}
		},
		show: false,
		hide: false,
		style: 'qtip-light'
	}).qtip('api');

export default {
  name: 'calendar',
  data() {
    return {
      events: null,
      config: {
        defaultView: 'month',
        
      },
    }
  },
  created() {
      const data = axios.get(`/events`).then(response => {
                this.events = response.data;

            });
  },
  methods: {
    eventRender: function(event, element) {
        if (element && event.description) {
            tooltip.set({
				'content.text': event.description
			})
			.reposition(event).show(event);
        }
      },
  },
  components: {
    FullCalendar,
  },
}

</script>