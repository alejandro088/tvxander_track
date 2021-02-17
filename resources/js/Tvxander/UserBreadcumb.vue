<template>
    <div class="hero user-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>{{ $page.props.user.name }} profile</h1>
                        <ul class="breadcumb">
                            <li class="active">
                                <inertia-link :href="route('home')"
                                    >Home</inertia-link
                                >
                            </li>
                            <li>
                                <span class="ion-ios-arrow-right"></span
                                >{{ section }}
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
    props: ["section"]
};
</script>

<style></style>
