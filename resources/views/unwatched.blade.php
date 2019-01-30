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

                @include('partials.tv.unwatched')

                <div class="half-circle-spinner" v-if="loading">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-2"></div>
                </div>


                <b-card no-body v-if="show.show">
                    <b-tabs card>
                        <b-tab title="S " :title=`${item.season_number}` v-for="(item, i) in show.seasons" v-bind:data="item"
                            v-bind:key="i" active v-if="item != null">

                            <tvseason-description v-if="show.show" :show="show.show" :season="item"></tvseason-description>


                            <tvseason-mark-watched v-if="item" :season="item"></tvseason-mark-watched>



                            <tvseason-list-episodes :episodes="item.episodes"></tvseason-list-episodes>


                        </b-tab>
                    </b-tabs>
                </b-card>

                <div class="row mt-3" v-if="show.show">
                    <div class="container">
                        <p><button class="btn btn-danger" @click="update">Refresh data for @{{show.show.name}}</button></p>
                        <p><span class="text-muted">Si los datos no se encuentran actualizados a TMDB, haz click en el
                                botón de arriba.</span></p>
                    </div>
                </div>
                <pre>@{{ $data }}</pre>

            </div>
        </div>
    </div>

    <template id="list-episodes">

        <div class="container">
            <tvepisode v-for="(episode, index) in episodes" 
                :episode="episode" 
                v-bind:key="episode.id">
            </tvepisode>
        </div>
    </template>

    <template id="item-episode">
        
            <div class="row border">
                <div class="col-md-2 border ">
                    @{{episode.episode_number}} - @{{episode.name}}
                </div>
                <div class="col-md-2 border ">
                    <p>Air Date</p>
                    @{{episode.air_date}}
                </div>
                <div class="col-md-6 border ">
                    @{{episode.overview}}
                </div>

                <div class="col-md-2 border ">

                    <p class="text-center">Watched?</p>
                    <label class="switch">
                        <input type="checkbox" v-model="episode.watched" :class="{primary: isComplete, success: isWaiting, danger: hasError}"
                            v-on:click="setWatched(episode, $event)">
                        <span class="slider round"></span>
                    </label>

                </div>
            </div>
        
    </template>



    @endsection


    @section('js')

    <script src="/js/tvshow.js"></script>

    @endsection
