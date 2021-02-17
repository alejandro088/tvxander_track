<template>
    <div id="biography" class="tab">
        <v-container>
            <div class="rv-hd">
                <div>
                    <h3>Biography of</h3>
                    <h2>{{ $page.props.person.name }}</h2>
                </div>
            </div>
            <p>
                {{ $page.props.person.biography }}
            </p>
        </v-container>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
