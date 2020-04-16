@extends('templates.master')

@section('titulo')
    HOME
@endsection

@section('principal')

<div class="my-5">

    <div class="d-flex py-4 flex-wrap">
        <div class="col-lg-8 col-md-6 col-sm-12">
            <h1 class="font-weight-bold">Que Fem?</h1>
            <p class="pt-3"style="line-height: 1.9rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 pl-md-5 d-flex align-items-center mt-sm-4">
            <img src="img/emergencia1.png" alt="Persona que aten a una emergencia" class="w-100">
        </div>
    </div>
    <div style="height:50px"></div>
    <div class="d-flex mt-5 flex-wrap">
        <div class="order-md-2 col-lg-8 col-md-6 col-sm-12 order-xs-1">
            <h1 class="font-weight-bold">Qui Som?</h1>
            <p class="pt-3" style="line-height: 1.9rem">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="order-md-1 col-lg-4 col-md-6 col-sm-12 pr-md-5 d-flex align-items-center order-xs-2">
            <img src="img/emergencia2.png" alt="Persona que aten a una emergencia" class="w-100">
        </div>
    </div>

    <div style="height:50px"></div>

</div>
@endsection
