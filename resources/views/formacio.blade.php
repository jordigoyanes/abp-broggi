@extends('templates.master3')
@section('titulo')FORMACIO @endsection

@section('principal')

<div class="row">
    <div class="card" style="width: 25rem; height: 300px; margin-right: 220px; margin-left: 100px">
        <div class="card-title" style="background-color: #1CADC3;">
            <h5 style="color: white; margin-left: 105px; margin-top: 10px">CAIGUDA PER ACR</h5>
        </div>

        <video width="400px" height="200px" id="video">
            <source src="{{ asset('img/clip1.mp4')}}" type="video/mp4">
        </video>
        <div class="card-footer" style="background-color: rgb(215, 240, 244);">
            <div class="botones">
                <button onclick="playVid()" onclick="startTimer()" type="button" style="background-color: #1CADC3; color: white; border-radius: 10px; margin-right: 50px; margin-left: 30px">
                    PLAY
                </button>
                <button onclick="pauseVid()" type="button" style="background-color: #1CADC3; color: white; color: white; border-radius: 10px; margin-right: 50px">
                    PAUSE
                </button>

                <button onclick="aumentar()" style="background-color: #1CADC3; color: white; border-radius: 10px">
                    Avançar
                </button>
            </div>
        </div>
    </div>

    <div class="card" style="width: 25rem;">
        <div class="card-title" style="background-color: #1CADC3;">
            <h5 style="color: white; margin-left: 105px; margin-top: 10px">CONSCIÈNCIA</h5>
        </div>

        <video width="400px" height="200px" id="video">
            <source src="{{ asset('img/clip2.mp4')}}" type="video/mp4">
        </video>
        <div class="card-footer" style="background-color: rgb(215, 240, 244);">
            <div class="botones">
                <button onclick="playVid()" onclick="startTimer()" type="button" style="background-color: #1CADC3; color: white; border-radius: 10px; margin-right: 50px; margin-left: 30px">
                    PLAY
                </button>
                <button onclick="pauseVid()" type="button" style="background-color: #1CADC3; color: white; color: white; border-radius: 10px; margin-right: 50px">
                    PAUSE
                </button>

                <button onclick="aumentar()" style="background-color: #1CADC3; color: white; border-radius: 10px">
                    Avançar
                </button>
            </div>
        </div>
    </div>


</div>
<div class="row" style="margin-top: 20px">
    <div class="card" style="width: 25rem; height: 300px; margin-right: 220px; margin-left: 100px;">
        <div class="card-title" style="background-color: #1CADC3;">
            <h5 style="color: white; margin-left: 105px; margin-top: 10px">VALORACIÓ RESPIRACIÓ</h5>
        </div>

        <video width="400px" height="200px" id="video">
            <source src="{{ asset('img/clip3.mp4')}}" type="video/mp4">
        </video>
        <div class="card-footer" style="background-color: rgb(215, 240, 244);">
            <div class="botones">
                <button onclick="playVid()" onclick="startTimer()" type="button" style="background-color: #1CADC3; color: white; border-radius: 10px; margin-right: 50px; margin-left: 30px">
                    PLAY
                </button>
                <button onclick="pauseVid()" type="button" style="background-color: #1CADC3; color: white; color: white; border-radius: 10px; margin-right: 50px">
                    PAUSE
                </button>

                <button onclick="aumentar()" style="background-color: #1CADC3; color: white; border-radius: 10px">
                    Avançar
                </button>
            </div>
        </div>
    </div>

    <div class="card" style="width: 25rem;">
        <div class="card-title" style="background-color: #1CADC3;">
            <h5 style="color: white; margin-left: 105px; margin-top: 10px">RCP 1</h5>
        </div>

        <video width="400px" height="200px" id="video">
            <source src="{{ asset('img/clip4.mp4')}}" type="video/mp4">
        </video>
        <div class="card-footer" style="background-color: rgb(215, 240, 244);">
            <div class="botones">
                <button onclick="playVid()" onclick="startTimer()" type="button" style="background-color: #1CADC3; color: white; border-radius: 10px; margin-right: 50px; margin-left: 30px">
                    PLAY
                </button>
                <button onclick="pauseVid()" type="button" style="background-color: #1CADC3; color: white; color: white; border-radius: 10px; margin-right: 50px">
                    PAUSE
                </button>

                <button onclick="aumentar()" style="background-color: #1CADC3; color: white; border-radius: 10px">
                    Avançar
                </button>
            </div>
        </div>
    </div>


</div>
<div class="row" style="margin-top: 20px">
    <div class="card" style="width: 25rem; height: 300px; margin-right: 220px; margin-left: 100px">
        <div class="card-title" style="background-color: #1CADC3;">
            <h5 style="color: white; margin-left: 105px; margin-top: 10px">RCP 4</h5>
        </div>

        <video width="400px" height="200px" id="video">
            <source src="{{ asset('img/clip5.mp4')}}" type="video/mp4">
        </video>
        <div class="card-footer" style="background-color: rgb(215, 240, 244);">
            <div class="botones">
                <button onclick="playVid()" onclick="startTimer()" type="button" style="background-color: #1CADC3; color: white; border-radius: 10px; margin-right: 50px; margin-left: 30px">
                    PLAY
                </button>
                <button onclick="pauseVid()" type="button" style="background-color: #1CADC3; color: white; color: white; border-radius: 10px; margin-right: 50px">
                    PAUSE
                </button>

                <button onclick="aumentar()" style="background-color: #1CADC3; color: white; border-radius: 10px">
                    Avançar
                </button>
            </div>
        </div>
    </div>

    <div class="card" style="width: 25rem;">
        <div class="card-title" style="background-color: #1CADC3;">
            <h5 style="color: white; margin-left: 105px; margin-top: 10px">RCP 2</h5>
        </div>

        <video width="400px" height="200px" id="video">
            <source src="{{ asset('img/clip6.mp4')}}" type="video/mp4">
        </video>
        <div class="card-footer" style="background-color: rgb(215, 240, 244);">
            <div class="botones">
                <button onclick="playVid()" onclick="startTimer()" type="button" style="background-color: #1CADC3; color: white; border-radius: 10px; margin-right: 50px; margin-left: 30px">
                    PLAY
                </button>
                <button onclick="pauseVid()" type="button" style="background-color: #1CADC3; color: white; color: white; border-radius: 10px; margin-right: 50px">
                    PAUSE
                </button>

                <button onclick="aumentar()" style="background-color: #1CADC3; color: white; border-radius: 10px">
                    Avançar
                </button>
            </div>
        </div>
    </div>


</div>
<div class="row" style="margin-top: 20px">
    <div class="card" style="width: 25rem; height: 300px; margin-right: 220px; margin-left: 100px">
        <div class="card-title" style="background-color: #1CADC3;">
            <h5 style="color: white; margin-left: 105px; margin-top: 10px">RCP 7</h5>
        </div>

        <video width="400px" height="200px" id="video">
            <source src="{{ asset('img/clip7.mp4')}}" type="video/mp4">
        </video>
        <div class="card-footer" style="background-color: rgb(215, 240, 244);">
            <div class="botones">
                <button onclick="playVid()" onclick="startTimer()" type="button" style="background-color: #1CADC3; color: white; border-radius: 10px; margin-right: 50px; margin-left: 30px">
                    PLAY
                </button>
                <button onclick="pauseVid()" type="button" style="background-color: #1CADC3; color: white; color: white; border-radius: 10px; margin-right: 50px">
                    PAUSE
                </button>

                <button onclick="aumentar()" style="background-color: #1CADC3; color: white; border-radius: 10px">
                    Avançar
                </button>
            </div>
        </div>
    </div>




</div>


@endsection
