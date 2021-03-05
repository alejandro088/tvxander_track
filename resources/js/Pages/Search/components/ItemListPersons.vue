<template>
    <div>
        <v-container>
            <v-row>
                <v-col
                    v-for="item in results"
                    :key="item.id"
                    cols="4"
                >
                    <v-card flat tile>

                        <v-card-title>
                            <inertia-link
                                    :href="
                                        route('person.show', { id: item.id })
                                    "
                                >
                                    {{ item.name }}
                                </inertia-link>
                        </v-card-title>
                    <img
                        :src="
                            item.profile_path
                                ? $store.getters.profile_size_w185 +
                                  item.profile_path
                                : '/images/no-image.png'
                        "
                        alt=""
                    />
                    
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    props: ["results"]
};
</script>

<style>
.person-item {
    display: flex;
    flex-direction: column;
    align-items: inherit;
    width: 300px;
    position: relative;
    margin-right: 23px;
}
</style>
