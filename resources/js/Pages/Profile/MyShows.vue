<template>
  <app-layout>
    

    <user-breadcumb section="My Shows" />

    <div class="page-single">
      <div class="container">
        <div class="row ipad-width2">
          <div class="col-md-3 col-sm-12 col-xs-12">
            <profile-sidebar />
          </div>
          <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="text-white col-md-12">
              <div class="mt-3">
                <div>Current Shows</div>

                <div>
                  <table>
                    <thead>
                      <th scope="col">Name</th>
                      <th scope="col">Last Episode</th>
                      <th scope="col">Next Episode</th>
                      <th scope="col">Options</th>
                    </thead>
                    <tbody>
                    
                      <tr v-for="show in currentShows" :key="show.id">
                        <td>
                          <inertia-link :href="route('tv.show',show.show)"
                            ><strong>{{show.name}}</strong></inertia-link>
                          <span>
                            <em class="date d-block">
                              
                              You had {{show.episodes_unwatched}} unwatched
                              episodes!!
                            </em>
                          </span>
                        </td>
                        
                        <td v-if="show.last_episode_to_air != null">
                          <span>
                            <strong>
                                {{ show.last_episode_to_air.season_number}}
                                x
                                {{ show.last_episode_to_air.episode_number}}
                                -
                                {{ show.last_episode_to_air.name}}
                            </strong>
                              
                            <em class="date d-block"
                              >{{show.last_episode_to_air.air_date}}
                              |
                              <span
                                >{{humanize(show.last_episode_to_air.air_date)}}</span
                              ></em
                            ></span
                          >
                        </td>

                         
                        <td v-if="show.next_episode_to_air != null">
                          <span>
                            <strong class="number">
                                {{show.next_episode_to_air.season_number}}
                                 x
                                {{show.next_episode_to_air.episode_number}}
                                -
                                {{show.next_episode_to_air.name}}
                            </strong>
                            <em class="date d-block"
                              >{{show.next_episode_to_air.air_date}}
                              |
                              <span
                                >{{humanize(show.next_episode_to_air.air_date)}}</span
                              ></em
                            ></span
                          >
                        </td>

                       
                        <td>
                            
                            <button @click="showDelete(show.show)" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                            </button>
                          
                          
                            
                            <button @click="showArchive(show.show)" class="btn btn-warning">
                              <i class="fa fa-file"></i>
                            </button>
                          
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="card mt-3">
                <div class="card-header">Ended Shows</div>

                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th scope="col">Name</th>
                      <th scope="col">Last Episode</th>
                      <th scope="col">Episodes Unwatched</th>
                      <th scope="col">Options</th>
                    </thead>
                    <tbody>
                      <tr v-for="show in endedShows" :key="show.index">
                        <td>
                          <a :href="route('tv.show',show.show)"
                            ><strong>{{show.name}}</strong></a
                          >
                        </td>
                        
                        <td v-if="show.last_episode_to_air != null">
                          <span>
                            <strong class="number">.
                                {{show.last_episode_to_air['season_number']}} 
                                x
                                {{show.last_episode_to_air['episode_number']}}
                                -
                                 {{show.last_episode_to_air['name']}}</strong>
                            <em class="date d-block"
                              >{{show.last_episode_to_air['air_date']}}
                              |
                              <span>{{show.last_episode_to_air['air_date']}}
                                </span></em
                            ></span
                          >
                        </td>

                        @else
                        <td></td>
                        @endif

                        <td>
                          <span>
                            <em class="date d-block"
                              >You had {{show.episodes_unwatched}} unwatched
                              episodes!!
                            </em>
                          </span>
                        </td>

                        <td>
                          <form
                            :action="`/tv/${show.show}/delete`"
                            method="post"
                            class="d-inline"
                          >
                            
                            <button type="submit" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                            </button>
                          </form>
                          <form
                            :action="`/tv/${show.id}/archive`"
                            method="post"
                            class="d-inline"
                          >
                           
                            <button type="submit" class="btn btn-warning">
                              <i class="fa fa-file"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="card mt-3">
                <div class="card-header">Canceled Shows</div>

                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th scope="col">Name</th>
                      <th scope="col">Last Episode</th>
                      <th scope="col">Episodes Unwatched</th>
                      <th scope="col">Options</th>
                    </thead>
                    <tbody>
                      
                      <tr v-for="show in canceledShows" :key="show.index">
                        <td>
                          <a :href="route('tv.show',show.show)"
                            ><strong>{{show.name}}</strong></a
                          >
                        </td>
                        
                        <td v-if="show.last_episode_to_air != null">
                          <span>
                            <strong class="number">
                                {{show.last_episode_to_air['season_number']}} 
                                x
                                {{show.last_episode_to_air['episode_number'] }}
                                -
                                {{show.last_episode_to_air['name']}}
                            </strong>
                            <em class="date d-block"
                              >{{show.last_episode_to_air['air_date']}}
                              |
                              <span
                                >{{show.last_episode_to_air['air_date']}}</span
                              ></em
                            ></span
                          >
                        </td>

                        

                        <td>
                          <span>
                            <em class="date d-block"
                              >You had {{show.episodes_unwatched}} unwatched
                              episodes!!
                            </em>
                          </span>
                        </td>

                        <td>
                          <form
                            :action="`/tv/${show.id}/delete`"
                            method="post"
                            class="d-inline"
                          >
                            
                            <button type="submit" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                            </button>
                          </form>

                          <form
                            :action="`/tv/${show.id}/archive`"
                            method="post"
                            class="d-inline"
                          >
                            @csrf
                            <button type="submit" class="btn btn-warning">
                              <i class="fa fa-file"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="card mt-3">
                <div class="card-header">Archived Shows</div>

                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <th scope="col">Name</th>
                      <th scope="col">Last Episode</th>
                      <th scope="col">Next Episode</th>
                      <th scope="col">Options</th>
                    </thead>
                    <tbody>
                      
                      <tr v-for="show in archivedShows" :key="show.id">
                        <td>
                          <a :href="route('tv.show',show.show)"
                            ><strong>{{show.name}}</strong></a
                          >
                        </td>
                        
                        <td v-if="show.last_episode_to_air != null">
                          <span>
                            <strong class="number">{{ show.last_episode_to_air['season_number']}} 
                                x
                                            {{ show.last_episode_to_air['episode_number'] }}
                                -
                                            {{ show.last_episode_to_air['name']}}
                            </strong>
                            <em class="date d-block"
                              >{{ show.last_episode_to_air['air_date'] }}
                              |
                              <span
                                >{{show.last_episode_to_air['air_date']}}</span
                              ></em
                            ></span
                          >
                        </td>
                        
                        <td v-if="show.next_episode_to_air != null">
                          <span>
                            <strong class="number">
                                {{show.next_episode_to_air['season_number'] }} x
                                            {{show.next_episode_to_air['episode_number']}} -
                                            {{show.next_episode_to_air['name'] }}
                                            </strong>
                            <em class="date d-block"
                              >{{ show.next_episode_to_air['air_date'] }}
                              |
                              <span
                                >{{ show.next_episode_to_air['air_date'] }}</span
                              ></em
                            ></span
                          >
                        </td>

                        
                        <td>
                          <form
                            :action="`/tv/${$show.id}/delete`"
                            method="post"
                            class="d-inline"
                          >
                            
                            <button type="submit" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                            </button>
                          </form>
                          <form
                            :action="`/tv/${show.id}/restore`"
                            method="post"
                            class="d-inline"
                          >
                            
                            <button type="submit" class="btn btn-primary">
                              <i class="fa fa-file"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
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
import ProfileSidebar from '@/Tvxander/ProfileSidebar';
import UserBreadcumb from '@/Tvxander/UserBreadcumb';
import { DateTime } from "luxon";

export default {
  components: {
    AppLayout,
    ProfileSidebar,
    UserBreadcumb,
  },
  props: ['currentShows', 'endedShows', 'canceledShows', 'archivedShows'],
  methods: {
    toJson(json) {
      
      return JSON.parse(json);
    },
    humanize(date){
        return DateTime.fromISO(date).setLocale("es").toRelative();
    },
    async showDelete(id) {
      try {
            const response = await window.axios.delete(`/tv/${id}`);
            console.log(response);
          } catch (error) {
              console.log(error)
          }
    },
    showArchive(id){

    }
  }
};
</script>

<style>
</style>