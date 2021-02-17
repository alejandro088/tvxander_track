<template>
    <div data-app>
        <v-dialog
            v-if="$store.state.ytvideo"
            v-model="show"
            width="600"
            style="z-index: 999999;"
        >
            <v-card>
                <v-toolbar dark color="primary">
                    <v-btn icon dark @click="stop">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>{{
                        $store.state.ytvideo.name
                    }}</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn dark text @click="toggleVideo">
                            <v-icon>{{
                                state == "playing" ? "mdi-pause" : "mdi-play"
                            }}</v-icon>
                        </v-btn>
                        <v-btn dark text @click="stopVideo">
                            <v-icon>mdi-stop</v-icon>
                        </v-btn>
                    </v-toolbar-items>
                </v-toolbar>

                <div class="video-container">
                    <youtube
                        :video-id="$store.state.ytvideo.key"
                        ref="youtube"
                        @paused="paused"
                        @playing="playing"
                    ></youtube>
                </div>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    props: ["video", "visible"],
    data() {
        return {
            state: "ready"
        };
    },
    mounted() {
        console.log(this.$store.state.player);
    },
    methods: {
        stop() {
            this.stopVideo();
            //$('#player').contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            this.show = false;
        },
        stopVideo() {
            this.player.stopVideo();
        },
        playVideo() {
            this.player.playVideo();
        },
        toggleVideo() {
            if (this.state == "playing") {
                this.pauseVideo();
            } else {
                this.playVideo();
            }
        },
        pauseVideo() {
            this.player.pauseVideo();
        },
        paused() {
            this.state = "paused";
            console.log("paused!!!");
        },
        playing() {
            this.state = "playing";
            console.log("watching!!!");
        }
    },
    computed: {
        show: {
            get() {
                return this.$store.state.videoModal;
            },
            set(value) {
                if (!value) {
                    this.player.stopVideo();
                    this.$emit("close");
                }
            }
        },
        player() {
            return this.$refs.youtube.player;
        }
    }
};
</script>

<style>
.video-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
}
.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
