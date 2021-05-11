<template>
    <div class="row border">
        <div class="col-md-2 border ">
            {{ episode.episode_number }} - {{ episode.name }}
        </div>
        <div class="col-md-2 border ">
            <p>Air Date</p>
            {{ episode.air_date }}
        </div>
        <div class="col-md-6 border ">
            {{ episode.overview }}
        </div>

        <div class="col-md-2 border ">
            <p class="text-center">Watched?</p>

            <v-switch
                v-model="watched"
                @change="setWatched(episode)"
                :color="color"
                hide-details
            >
            </v-switch>
        </div>
    </div>
</template>

<script>
export default {
    props: ["episode", "initWatched"],
    data() {
        return {
            color: "primary",
            watched: this.initWatched
        };
    },
    methods: {
        setWatched(episode) {
            this.color = "success";

            window.axios
                .post(
                    `/dashboard/episode/${episode.id}/watched`,
                    {
                        check: this.watched
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
                        this.color = "primary";

                        this.$root.$emit("notification", {
                            icon: "success",
                            message: this.watched
                                ? "The episode has been watched"
                                : "The episode has been unwatched"
                        });
                    },
                    response => {
                        // error callback
                        this.color = "error";

                        this.$root.$emit("notification", {
                            icon: "error",
                            message: "An error has occurred"
                        });
                    }
                );
        }
    }
};
</script>
