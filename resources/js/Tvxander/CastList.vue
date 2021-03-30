<template>
    <div>
        <v-virtual-scroll :items="items" :item-height="50" height="300">
            <template v-slot:default="{ item }">
                <v-list-item>
                    <v-list-item-avatar>
                        <v-avatar size="56" class="profile">
                            <v-img
                                class="mx-3"
                                :src="
                                    item.profile_path
                                        ? $store.getters.profile_size_w45 +
                                          item.profile_path
                                        : '/images/no-image.png'
                                "
                                alt=""
                            />
                        </v-avatar>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title>
                            <inertia-link :href="route(itemRoute, item.id)">
                                {{ item.name }}
                            </inertia-link>
                        </v-list-item-title>
                    </v-list-item-content>

                    <v-list-item-action>
                        <p>... {{ item.character ? item.character : item[fieldJob] }}</p>
                    </v-list-item-action>
                </v-list-item>
            </template>
        </v-virtual-scroll>
    </div>
</template>

<script>
export default {
    props: ["items", "itemRoute", "fieldJob"]
};
</script>

<style></style>
