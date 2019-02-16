@extends('layout.layout')

@section('content')
    <div class="background-home">

        <div class="logo-wrapper">
            <div class="logo"></div>
            <span class="caption material-shadow-text">Zpěvník</span>
        </div>
        <div class="search-wrapper">
            <input class="search-home  material-shadow"
                   placeholder="Zadejte název písně (třeba Ať požehnán je Bůh)">
            <button type="submit" class="search-submit material-shadow">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
@endsection
