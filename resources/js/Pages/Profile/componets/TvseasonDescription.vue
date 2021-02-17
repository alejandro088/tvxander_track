<template>
    <div>
        <v-container>
            <h2>{{ serie.name }} - {{ season.name }}</h2>
            <p>{{ season.overview }}</p>
        </v-container>
    </div>
</template>

<script>
export default {
    props: ["serie", "season"]
};
</script>
