<template>
    <app-layout>
        <div class="hero common-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero-ct">
                            <h1>movie listing - list</h1>
                            <ul class="breadcumb">
                                <li class="active"><a href="#">Home</a></li>
                                <li>
                                    <span class="ion-ios-arrow-right"></span>
                                    movie listing
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-single" :class="orderBy == 'list' ? 'movie_list' : ''">
            <div class="container">
                <div class="row ipad-width2">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <search-filters :query="query" @order="setOrder" />

                        <order-list
                            v-if="orderBy == 'list'"
                            :results="theResults"
                            :type="type"
                        />
                        <order-grid v-else :results="theResults" :type="type" />

                        <div class="topbar-filter">
                            <label>Movies per page:</label>
                            <select>
                                <option value="range">5 Movies</option>
                                <option value="saab">10 Movies</option>
                            </select>
                            <div class="pagination2">
                                <span>Page 1 of 2:</span>
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#"
                                    ><i class="ion-arrow-right-b"></i
                                ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="searh-form">
                                <h4 class="sb-title">Resultados</h4>

                                <p>
                                    <a href="#" @click="view('Shows')">
                                        Programas de televisión
                                        {{ total.shows }}</a
                                    >
                                </p>
                                <p>
                                    <a href="#" @click="view('Movies')"
                                        >Peliculas {{ total.movies }}</a
                                    >
                                </p>
                                <p>
                                    <a href="#" @click="view('Persons')"
                                        >Celebridades {{ total.persons }}</a
                                    >
                                </p>
                                <p>
                                    <a href="#" @click="view('Companies')"
                                        >Compañías {{ total.companies }}</a
                                    >
                                </p>
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
import SearchFilters from "@/Pages/Search/Filters";
import OrderList from "./components/OrderList.vue";
import OrderGrid from "./components/OrderGrid.vue";

export default {
    components: {
        AppLayout,
        SearchFilters,
        OrderList,
        OrderGrid
    },
    props: ["results", "query", "total"],
    data() {
        return {
            orderBy: "list",
            type: "Movies",
            theResults: this.results.movies
        };
    },
    methods: {
        view(type) {
            if (type == "Shows") {
                this.theResults = this.results.shows;
                this.type = "Shows";
            }

            if (type == "Movies") {
                this.theResults = this.results.movies;
                this.type = "Movies";
            }

            if (type == "Persons") {
                this.theResults = this.results.persons;
                this.type = "Persons";
            }

            if (type == "Companies") {
                this.theResults = this.results.companies;
                this.type = "Companies";
            }
        },
        setOrder(event) {
            console.log(event);
            this.orderBy = event;
        }
    }
};
</script>

<style></style>
