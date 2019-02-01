import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// 0. If using a module system (e.g. via vue-cli), import Vue and VueRouter
// and then call `Vue.use(VueRouter)`.

// 1. Define route components.
// These can be imported from other files


// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
  { name: 'all_shows', path: '/all-shows', component: require('./components/AllShows.vue').default },
  { name: 'last_episodes', path: '/last-episodes', component: require('./components/LastEpisodes.vue').default },
  { name: 'last_shows', path: '/last-shows', component: require('./components/LastShows.vue').default },
  { name: 'most_views', path: '/most-views', component: require('./components/MostViews.vue').default }
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
export const router = new VueRouter({
  routes // short for `routes: routes`
})