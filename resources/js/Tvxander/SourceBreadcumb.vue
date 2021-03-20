<template>
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>{{ title }}</h1>
                        <ul class="breadcumb">
                            <li class="active">
                                <inertia-link :href="route('home')">
                                    Home
                                </inertia-link>
                            </li>
                            <li>
                                <span class="ion-ios-arrow-right"></span>
                                View details
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title"]
};
</script>

<style></style>
