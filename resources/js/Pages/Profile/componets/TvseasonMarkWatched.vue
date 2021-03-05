<template>
    <div>
        <v-container fluid>
            <v-switch
                v-model="isWatched"
                @change="setWatchedSeason(season, $event)"
                hide-details
                label="Marcar temporada como vista?"
            ></v-switch>
        </v-container>
    </div>
</template>

<script>

export default {
    props: ["season"],
    data() {
        return {
            isWatched: false,
            ex11: false
        };
    },
    methods: {
        setWatchedSeason: async function(season, e) {
            console.log(this.isWatched);
            await window.axios
                .post(
                    `/dashboard/season/${season["id"]}/watched`,
                    {
                        check: this.isWatched
                    },
                    {
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            )
                        }
                    }
                )
                .then(
                    response => {
                        console.log('All episodes have been successfully marked!');
                    },
                    response => {
                        // error callback
                        console.log('An error has occurred');
                    }
                );
        }
    }
};
</script>
