@extends('templates.master3')

@section('titulo')
Historial
@endsection


@section('principal')

<div id="app">
    <historial />
</div>
<script src="{{ asset('js/app.js')}}"></script>

@endsection
