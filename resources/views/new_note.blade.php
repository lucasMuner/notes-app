@extends('layouts.main_layout')

@section('content')

    <div class="container mt-5">
        <div class="card shadow-sm w-100 mb-3">
            <div class="form card-body">
                <div class="col">
                    <p class="fs-4">Anotar</p>
                </div>
                <form action="{{ route('new-note-submit') }}" method="post">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="note_title">Título</label>
                        <input class="form-control mt-1" type="text" name="title" id="note_title" placeholder="Digite o título..." value="{{ old('title') }}">
                        {{-- error --}}
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="note_text">Texto</label>
                        <textarea class="form-control mt-1" id="note_text" name="text" rows="8" cols="50" placeholder="Digite sua anotação...">{{ old('text') }}</textarea>
                        {{-- error --}}
                        @error('text')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-100 mt-3 justify-content-end d-flex">
                        <a type="button" href="{{ route('home') }}" class="btn btn-warning mx-2 text-white"><i class="fa fa-undo"></i> Voltar</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection