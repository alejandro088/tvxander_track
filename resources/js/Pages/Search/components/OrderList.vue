<template>
    <div>
        <component :is="`ItemList${type}`" :results="results" />
    </div>
</template>

<script>
export default {
    components: {
        ItemListMovies: () => import("./ItemListMovies.vue"),
        ItemListShows: () => import("./ItemListShows.vue"),
        ItemListPersons: () => import("./ItemListPersons.vue"),
        ItemListCompanies: () => import("./ItemListCompanies.vue")
    },
    props: ["results", "query", "type"]
};
</script>
