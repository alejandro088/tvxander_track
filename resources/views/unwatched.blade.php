@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('css')
<style>
 


/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  float:right;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.default:checked + .slider {
  background-color: #444;
}
input.primary:checked + .slider {
  background-color: #2196F3;
}
input.success:checked + .slider {
  background-color: #8bc34a;
}
input.info:checked + .slider {
  background-color: #3de0f5;
}
input.warning:checked + .slider {
  background-color: #FFC107;
}
input.danger:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
    
</style>
@endsection

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="episodes-list">
                <div class="card">
                    <div class="card-header">Unwatched</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @forelse ($shows as $show)
                        @if ($show->episodes_unwatched > 0)                            
                        <a href="#" class="show-link" data-id="{{$show->show}}" v-on:click="episodes({{$show->show}})">
                            {!! $image->getHtml($show->poster_path, 'w154', null, 200, "img-thumbail m-1") !!}
                        </a>
                        @endif
                        @empty
                        <span>En este momento no tienes Shows registrados</span>
                        @endforelse

                    </div>
                </div>
                
                <button class="btn btn-danger" v-if="show.show.name" @click="update">Refresh data for @{{show.show.name}}</button>
                <b-card no-body>
                    <b-tabs card>
                        <b-tab title="S " 
                            :title=`${item.season_number}` 
                            v-for="(item, i) in show.seasons" 
                            v-bind:data="item"
                            v-bind:key="i" active
                            v-if="item != null">

                            <h2>@{{show.show.name}} - @{{item.name}}</h2>
                            <p>@{{item.overview}}</p>
                            
                            <div class="form-group">
                            <span>Marcar temporada como vista?</span>
                            <label class="switch">
                                    
                                    <input type="checkbox" class="success season-watched" v-on:click="setWatchedSeason(item, i, $event)">
                                    <span class="slider round"></span>
                            </label>
                        </div>

                            <table class="table table-striped">
                                <thead>
                                    <th scope="col">Title</th>
                                    <th scope="col">Air Date</th>
                                    <th scope="col">Overview</th>
                                    <th scope="col">Watched?</th>
                                </thead>
                                <tbody class="tbody">
                                    <tr v-for="(episode, index) in item.episodes" v-bind:class="hidefield">
                                        <td>
                                            @{{episode.episode_number}} - @{{episode.name}}
                                        </td>
                                        <td>
                                            @{{episode.air_date}}
                                        </td>
                                        <td>
                                            @{{episode.overview}}
                                        </td>
                                        <td>                                               
                                                   
                                                                                    
                                            <label class="switch">
                                                <input type="checkbox" v-model="episode.watched" class="success episode-watched" v-on:click="setWatched(episode.id,item.season_number, index, $event)">
                                                <span class="slider round"></span>
                                            </label>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </b-tab>
                    </b-tabs>
                </b-card>

                

            </div>
        </div>
    </div>

    @endsection


    @section('js')

    <script>
        var vm = new Vue({

            el: '#episodes-list',
            data: {
                show: {
                    show: {},
                    seasons: {},
                    //episodes: {},

                },
                watched: []
            },
            methods: {
                episodes: async function (id) {
                    //console.log(id);


                    const data = await this.$http.get(`/shows/${id}`).then(response => {
                        this.show.show = response.data.show;
                        //this.show.episodes = response.data.seasons;

                        var seasons = Object.assign({}, response.data.seasons);
                        //console.log(seasons);
                        this.show.seasons = seasons;

                        //console.log(response.data);
                        
                    });

                    

                    var elements = document.querySelectorAll("tr.d-none"); 
                    
                    var i;
                    for (i = 0; i < elements.length; i++) {
                        elements[i].classList.remove("d-none");
                    }

                    var elements = document.querySelectorAll("season-watched"); 
                    
                    var i;
                    for (i = 0; i < elements.length; i++) {
                        elements[i].checked = false;
                    }

                    

                   
                },
                setWatched: async function(episode_id,season_number, index, e) {
                    
                    var episodes = this.show.seasons[season_number-1].episodes; 
                    
                    
                    const data = await this.$http.post(`/episode/${episode_id}/watched`,
                        {check: e.target.checked},
                        {headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }}).then(response => {
                        
                            e.target.classList.add("primary");
                            e.target.classList.remove("success");
                            e.target.classList.remove("danger");
                    }, response => {
                        // error callback
                        e.target.classList.add("danger");
                        
                        e.target.classList.remove("success");

                        setTimeout(() => {
                            e.target.checked = false;
                        }, 3000);
                    });

                     //e.target.parentElement.parentElement.parentElement.classList.add('d-none');
                    
                },
                setWatchedSeason: async function(season, index, e) {
                    const data = await this.$http.post(`/season/${season['id']}/watched`,
                        {check: e.target.checked},
                        {headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }}).then(response => {
                        
                            e.target.classList.add("primary");
                            e.target.classList.remove("success");
                            e.target.classList.remove("danger");

                            
                    }, response => {
                        // error callback
                        e.target.classList.add("danger");
                        
                        e.target.classList.remove("success");

                        setTimeout(() => {
                            e.target.checked = false;
                        }, 3000);
                    });
                },
                update: async function() {
                    var show = this.show.show.show;

                    const data = await this.$http.get(`/update/${show}`).then(response => {
                        this.show.show = response.data.show;
                        //this.show.episodes = response.data.seasons;

                        var seasons = Object.assign({}, response.data.seasons);
                        //console.log(seasons);
                        this.show.seasons = seasons;

                        //console.log(response);
                        
                    });
                }
            },
            computed: {
                  hidefield: function () {   
                     
                     return {
                            
                            'd-none': true,
                        }
                    }
            }


        })

    </script>

    @endsection
