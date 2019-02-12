<div class="row">
    <div class="col-12">
        <div class="float-left">
            {!! Form::open(['method' => 'get','url' => route($classCurrent.'.index'), 'class' => 'form-inline']) !!}
            <div class="form-group mb-2">
                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => $placeholderSearch]) !!}
            </div>
            <button type="submit" class="btn btn-info mx-sm-3 mb-2">
                Rechercher
            </button>
            {!! Form::close() !!}
        </div>

        <div class="float-right">
            <a href="{{ route($classCurrent.'.create') }}" class="btn btn-success">
                <span class="fas fa-plus"></span> {{ $messageBtnAdd }}
            </a>
        </div>
    </div>
</div>