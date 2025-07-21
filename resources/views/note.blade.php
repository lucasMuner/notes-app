<div class="card card-hover shadow-sm w-100 mb-2">
    <div class="card-body"> 
        <div class="card-title d-flex justify-content-between align-items-center">
            <strong>{{ $note['title'] }}</strong>
            <div>
                <a href="{{ route('edit', ['id' => Crypt::encrypt($note['id'])]) }}" type="button" class="btn btn-sm btn-secondary me-2"><i class="fa fa-pencil"></i></a>
                <a href="{{ route('delete', ['id' => Crypt::encrypt($note['id'])]) }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </div>
        </div>
        <div class="row">
            <small class="card-text">Data de Criação: {{ date('d/m/Y H:i', strtotime($note['created_at'])) }}</small>
            @if($note['created_at'] != $note['updated_at'])
                <small class="card-text">Data de Atualização: {{ date('d/m/Y H:i', strtotime($note['updated_at'])) }}</small>
            @endif
        </div>
        <hr>
        <p class="card-text">{{ $note['text'] }}</p>
    </div>
</div>