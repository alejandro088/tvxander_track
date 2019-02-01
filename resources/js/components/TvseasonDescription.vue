<template>
    <div>
        <h2>{{serie.name}} - {{season.name}}</h2>
        <p>{{season.overview}}</p>
    </div>
</template>

<script>
    export default {
           props: ['serie', 'season'],
        }
</script>