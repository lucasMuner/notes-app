@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">

        <div class="card shadow-sm w-100 mb-3">
            <div class="card-body">
                <a href="{{ route('new') }}" class="btn btn-primary text-white"><i class="fa fa-plus text-white"></i> Anotar</a>
            </div>
        </div>

        <div class="mt-3 mb-3 scrollable-container">
            @if(count($notes) !== 0)
                @foreach ($notes as $note)
                    @include('note')
                @endforeach
            @else
                <div class="card card-hover shadow-sm w-100 ">
                    <div class="card-body">
                        <p class="card-text">Você não possui anotações</p>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
