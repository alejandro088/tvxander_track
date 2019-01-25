@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

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
                        <a href="#" class="show-link" data-id="{{$show->show}}" v-on:click="episodes({{$show->show}})">
                            {!! $image->getHtml($show->poster_path, 'w154', null, 200, "img-thumbail m-1") !!}
                        </a>
                        @empty
                        <span>En este momento no tienes Shows registrados</span>
                        @endforelse

                    </div>
                </div>

                <b-card no-body>
                    <b-tabs card>
                        <b-tab title="S " :title=`${item.season_number}` v-for="item in show.seasons" v-bind:data="item"
                            v-bind:key="item.name" active>

                            <h2>@{{show.show.name}} - @{{item.name}}</h2>
                            <p>@{{item.overview}}</p>

                            <table class="table table-striped">
                                <thead>
                                    <th scope="col">Title</th>
                                    <th scope="col">Air Date</th>
                                    <th scope="col">Overview</th>
                                    <th scope="col">Watched?</th>
                                </thead>
                                <tbody>
                                    <tr v-for="episode in item.episodes">
                                        <td>
                                            @{{episode.name}}
                                        </td>
                                        <td>
                                            @{{episode.air_date}}
                                        </td>
                                        <td>
                                            @{{episode.overview}}
                                        </td>
                                        <td>
                                                   
                                                <input type="checkbox" v-on:click="setWatched(episode.id, $event)" class="form-control" name="watched">                                                
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </b-tab>
                    </b-tabs>
                </b-card>

                {{-- <div id="season-tabs">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="item in show.seasons">

                            @{{item.name}}

                            @{{item.overview}}
                            <ul class="list-group">
                                <li class="list-group-item" v-for="episode in item.episodes">
                                    <b>Overview: </b> @{{episode.overview}}
                                </li>
                            </ul>

                        </li>
                    </ul>

                </div> --}}


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
                    episodes: {},

                },
                watched: []
            },
            methods: {
                episodes: function (id) {
                    console.log(id);


                    this.$http.get(`/shows/${id}`).then(response => {
                        this.show.show = response.data.show;
                        this.show.episodes = response.data.seasons;

                        var seasons = Object.assign({}, response.data.seasons);
                        console.log(seasons);
                        this.show.seasons = seasons;

                        console.log(response.data);
                        console.log(this.show);
                    });


                    //console.log(this.$children);
                },
                setWatched: function(id, e) {
                    console.log(id);
                    console.log(e.target.checked);
                }
            }


        })

    </script>

    @endsection
