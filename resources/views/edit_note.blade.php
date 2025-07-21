@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm w-100 mb-3">
            <div class="form card-body">
                 <div class="col">
                    <p class="fs-4">Editar Nota</p>
                </div>
                <form action="{{ route('edit-note-submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="note_id" value="{{ Crypt::encrypt($note->id) }}">
                    <div class="form-group mt-2">
                        <label for="note_title">Título</label>
                        <input class="form-control mt-1" type="text" name="title" id="note_title" placeholder="Digite o título..." value="{{ old('title', $note->title) }}">
                        {{-- error --}}
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="note_text">Texto</label>
                        <textarea class="form-control mt-1" id="note_text" name="text" rows="8" cols="50" placeholder="Digite sua anotação...">{{ old('text', $note->text) }}</textarea>
                        {{-- error --}}
                        @error('text')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-100 mt-3 justify-content-end d-flex">
                        <a type="button" href="{{ route('home') }}" class="btn btn-warning mx-2 text-white"><i class="fa fa-undo"></i> Voltar</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Atualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection