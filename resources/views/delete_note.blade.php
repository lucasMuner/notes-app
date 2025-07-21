@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-sm mb-3" style="height: 25rem; width: 25rem;">
            <div class="row text-center">
                <span class="display-3 mt-5 text-center">
                    <i class="fa-solid fa-triangle-exclamation text-warning"></i>
                </span>
                <h4 class="text-info mb-5 mt-4">{{ $note->title }}</h4>
                <p class="text-secondary">Você tem certeza que deseja deletar essa nota?</p>
                <div class="mt-3">
                    <a href="{{ route('home') }}" class="btn btn-warning m-2"><i class="fa fa-cancel"></i> Cancelar</a>
                    <a href="{{ route('delete-note-confirm', ['id' => Crypt::encrypt($note->id)]) }}" class="btn btn-danger m-2"><i class="fa fa-eraser"></i> Deletar</a>
                </div>
            </div>
        </div>
    </div>
@endsection