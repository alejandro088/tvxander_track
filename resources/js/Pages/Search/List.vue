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
                <li><span class="ion-ios-arrow-right"></span> movie listing</li>
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
            <search-filters :query="query" @order="setOrder"/>
            
            <order-list v-if="orderBy == 'list'" :results="results" />
            <order-grid v-else :results="results" />

            
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
                <a href="#"><i class="ion-arrow-right-b"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="sidebar">
              <div class="searh-form">
                <h4 class="sb-title">Search for movie</h4>
                <form class="form-style-1" action="#">
                  <div class="row">
                    <div class="col-md-12 form-it">
                      <label>Movie name</label>
                      <input type="text" placeholder="Enter keywords" />
                    </div>
                    <div class="col-md-12 form-it">
                      <label>Genres & Subgenres</label>
                      <div class="group-ip">
                        <select
                          name="skills"
                          multiple=""
                          class="ui fluid dropdown"
                        >
                          <option value="">Enter to filter genres</option>
                          <option value="Action1">Action 1</option>
                          <option value="Action2">Action 2</option>
                          <option value="Action3">Action 3</option>
                          <option value="Action4">Action 4</option>
                          <option value="Action5">Action 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 form-it">
                      <label>Rating Range</label>

                      <select>
                        <option value="range">
                          -- Select the rating range below --
                        </option>
                        <option value="saab">
                          -- Select the rating range below --
                        </option>
                        <option value="saab">
                          -- Select the rating range below --
                        </option>
                        <option value="saab">
                          -- Select the rating range below --
                        </option>
                      </select>
                    </div>
                    <div class="col-md-12 form-it">
                      <label>Release Year</label>
                      <div class="row">
                        <div class="col-md-6">
                          <select>
                            <option value="range">From</option>
                            <option value="number">10</option>
                            <option value="number">20</option>
                            <option value="number">30</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <select>
                            <option value="range">To</option>
                            <option value="number">20</option>
                            <option value="number">30</option>
                            <option value="number">40</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input class="submit" type="submit" value="submit" />
                    </div>
                  </div>
                </form>
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
import OrderList from './components/OrderList.vue';
import OrderGrid from './components/OrderGrid.vue';

export default {
  components: {
    AppLayout,
    SearchFilters,
    OrderList,
    OrderGrid,
  },
  props: ["results", "query"],
  data() {
      return {
          orderBy: 'list',
      }
  },
  methods: {
      setOrder(event){
          console.log(event);
          this.orderBy = event;
      }
  }
};
</script>

<style>
</style>