<template>
    <div class="topbar-filter">
        <p>Found <span>1,608 movies</span> in total</p>
        <label>Sort by:</label>
        <select>
            <option value="popularity">Popularity Descending</option>
            <option value="popularity">Popularity Ascending</option>
            <option value="rating">Rating Descending</option>
            <option value="rating">Rating Ascending</option>
            <option value="date">Release date Descending</option>
            <option value="date">Release date Ascending</option>
        </select>
        <button @click="$emit('order', 'list')" class="list">
            <i class="ion-ios-list-outline"></i>
        </button>
        <button @click="$emit('order', 'grid')" class="grid">
            <i class="ion-grid"></i>
        </button>
    </div>
</template>

<script>
export default {
    props: ["query"]
};
</script>

<style></style>
