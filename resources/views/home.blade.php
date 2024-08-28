@extends('layouts.admin')

@section('content')

<section class="container" style="text-align: center">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="height: 180px">

            <div style="text-align: center">
                <p><img src="images/equipo.jpg"></p>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"
            style="text-align: center; font-size: 24px; font-family: bold; background-color: #C0C0C0; color:  #0380f4;">
            SISTEMA DE EQUIPOS
        </div>
        <br><br>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="height: 40px">

        </div>
    </div>

    <div class="row">
        <style>
            .BorderColorChangeElement {
                animation: BorderColorChange 1s ease-out 0s infinite alternate none running;
            }

            @keyframes BorderColorChange {
                0% {
                    border: 10px solid #e5e5e5;
                }

                100% {
                    border: 10px solid white;
                }
            }
        </style>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="BorderColorChangeElement">
                <div style="vertical-align: middle;padding:8px;font-size:20px; text-transform: uppercase; color:  #03A9F4;;
                        font-family: Century">
                    <b>¡HOLA {{ Auth::user()->username }}!</b>
                </div>
            </div>
        </div>
    </div>
    <hr>
</section>

@endsection