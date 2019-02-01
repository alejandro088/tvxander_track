@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="episodes-list">

                @include('partials.tv.unwatched')

                <div class="half-circle-spinner" v-if="this.$store.state.loading">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-2"></div>
                </div>


                <b-card no-body v-if="serie">
                    <b-tabs card>
                        <b-tab title="S " :title=`${item.season_number}` v-for="(item, i) in seasons" v-bind:data="item"
                            v-bind:key="i" active v-if="item != null">

                            <tvseason-description v-if="serie" :serie="serie" :season="item"></tvseason-description>

                            <tvseason-mark-watched :season="item" v-if="item"></tvseason-mark-watched>

                            <hr>

                            <tvseason-list-episodes :episodes="item.episodes"></tvseason-list-episodes>

                        </b-tab>
                    </b-tabs>
                </b-card>

                <div class="row mt-3" v-if="serie">
                    <div class="container">
                        <p><button class="btn btn-danger" @click="update">Refresh data for @{{this.$store.state.serie.name}}</button></p>
                        <p><span class="text-muted">Si los datos no se encuentran actualizados a TMDB, haz click en el
                                botón de arriba.</span></p>
                    </div>
                </div>
                <pre>@{{ this.$store.state }}</pre>

            </div>
        </div>
    </div>

    @endsection
