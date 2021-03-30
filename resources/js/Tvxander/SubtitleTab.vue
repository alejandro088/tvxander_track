<template>
    <div class="title-hd-sm">
        <h4>
            <slot></slot> 
            <span v-if="withCount">({{withCount}})</span>
        </h4>  
    </div>
</template>

<script>
export default {
    props: ["withCount"]
};
</script>

<style></style>
