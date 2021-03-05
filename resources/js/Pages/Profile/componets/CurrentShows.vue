<template>
    <div class="mt-3">
        <v-card elevation="2" dark>
            <v-card-title>Current Shows</v-card-title>
            <v-card-text>
                <v-simple-table dark>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left" scope="col">Name</th>
                                <th class="text-left" scope="col">
                                    Last Episode
                                </th>
                                <th class="text-left" scope="col">
                                    Next Episode
                                </th>
                                <th class="text-left" scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="show in shows" :key="show.id">
                                <td>
                                    <inertia-link
                                        :href="route('tv.show', show.show)"
                                        ><strong>{{
                                            show.name
                                        }}</strong></inertia-link
                                    >
                                    <span>
                                        <em class="date d-block">
                                            You had
                                            {{ show.episodes_unwatched }}
                                            unwatched episodes!!
                                        </em>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="show.last_episode_to_air != null">
                                        <strong>
                                            {{
                                                show.last_episode_to_air
                                                    .season_number
                                            }}
                                            x
                                            {{
                                                show.last_episode_to_air
                                                    .episode_number
                                            }}
                                            -
                                            {{ show.last_episode_to_air.name }}
                                        </strong>

                                        <em class="date d-block">
                                            {{
                                                show.last_episode_to_air
                                                    .air_date
                                            }}
                                            |
                                            <span>{{
                                                show.last_episode_to_air
                                                    .air_date | humanize
                                            }}</span>
                                        </em>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="show.next_episode_to_air != null">
                                        <strong class="number">
                                            {{
                                                show.next_episode_to_air
                                                    .season_number
                                            }}
                                            x
                                            {{
                                                show.next_episode_to_air
                                                    .episode_number
                                            }}
                                            -
                                            {{ show.next_episode_to_air.name }}
                                        </strong>
                                        <em class="date d-block">
                                            {{
                                                show.next_episode_to_air
                                                    .air_date
                                            }}
                                            |
                                            <span>{{
                                                show.next_episode_to_air
                                                    .air_date | humanize
                                            }}</span>
                                        </em>
                                    </span>
                                </td>

                                <td>
                                    <button
                                        @click="showDelete(show.id)"
                                        class="btn btn-danger"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <button
                                        @click="showArchive(show.id)"
                                        class="btn btn-warning"
                                    >
                                        <i class="fa fa-file"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
export default {
    props: ["shows"]
};
</script>

<style></style>
