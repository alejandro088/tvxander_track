<template>
    <div class="form-group">
        <span>Marcar temporada como vista?</span>
        <label class="switch">

            <input type="checkbox" class="success season-watched" v-on:click="setWatchedSeason(season, $event)">
            <span class="slider round"></span>
        </label>
    </div>
</template>

<script>
export default {
    props: ['season'],
    methods: {
        setWatchedSeason: async function (season, e) {
            const data = await axios.post(`/season/${season['id']}/watched`, {
                check: e.target.checked
            }, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(response => {

                e.target.classList.add("primary");
                e.target.classList.remove("success");
                e.target.classList.remove("danger");


            }, response => {
                // error callback
                e.target.classList.add("danger");

                e.target.classList.remove("success");

            });
        },
    }
}
</script>