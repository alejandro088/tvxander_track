<template>
    <app-layout>
        <user-breadcumb section="Favorite movies" />

        <div class="page-single">
            <div class="container">
                <div class="row ipad-width2">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <profile-sidebar />
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="topbar-filter user">
                            <p>
                                Found
                                <span>{{ favoriteMovies.length }}</span> in
                                total
                            </p>
                            <label>Sort by:</label>
                            <select>
                                <option value="range"
                                    >-- Choose option --</option
                                >
                                <option value="saab"
                                    >-- Choose option 2--</option
                                >
                            </select>
                            <a href="userfavoritelist.html" class="list"
                                ><i class="ion-ios-list-outline"></i
                            ></a>
                            <a href="userfavoritegrid.html" class="grid"
                                ><i class="ion-grid active"></i
                            ></a>
                        </div>
                        <div class="flex-wrap-movielist grid-fav">
                            <div
                                class="movie-item-style-2 movie-item-style-1"
                                v-for="item in favoriteMovies"
                                :key="item.id"
                            >
                                <img
                                    :src="
                                        `https://image.tmdb.org/t/p/w200${item.poster_path}`
                                    "
                                    alt=""
                                />
                                <div class="hvr-inner">
                                    <inertia-link
                                        :href="
                                            route('movie.show', { id: item.id })
                                        "
                                    >
                                        Read more
                                        <i
                                            class="ion-android-arrow-dropright"
                                        ></i>
                                    </inertia-link>
                                </div>
                                <div class="mv-item-infor">
                                    <h6>
                                        <inertia-link
                                            :href="
                                                route('movie.show', {
                                                    id: item.id
                                                })
                                            "
                                            >{{ item.title }}</inertia-link
                                        >
                                    </h6>
                                    <p class="rate">
                                        <i class="ion-android-star"></i>
                                        <span>{{ item.vote_average }}</span> /10
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="topbar-filter">
                            <label>Movies per page:</label>
                            <select>
                                <option value="range">20 Movies</option>
                                <option value="saab">10 Movies</option>
                            </select>

                            <div class="pagination2">
                                <span>Page 1 of 2:</span>
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">...</a>
                                <a href="#">78</a>
                                <a href="#">79</a>
                                <a href="#"
                                    ><i class="ion-arrow-right-b"></i
                                ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ProfileSidebar from "@/Tvxander/ProfileSidebar";
import UserBreadcumb from "@/Tvxander/UserBreadcumb";

export default {
    components: {
        AppLayout,
        ProfileSidebar,
        UserBreadcumb
    },
    props: ["favoriteMovies"]
};
</script>

<style></style>
