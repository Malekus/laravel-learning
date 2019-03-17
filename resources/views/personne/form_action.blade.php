@foreach($options['children'][0]->getChildren() as $key => $value)
    <div class="form-group row">
        <div class="col-md-2 offset-md-2">
            {!! form_label($options['children'][0]->getChildren()[$key]) !!}
        </div>
        <div class="col-md-6">
            {!! form_widget($options['children'][0]->getChildren()[$key]) !!}
            {!! form_errors($options['children'][0]->getChildren()[$key]) !!}
        </div>
        @if($key == 'action')
            <button type="button" class="btn btn-success add-to-collection" style="max-height: 38px;"><i class="fas fa-plus"></i></button>
        @endif
    </div>
@endforeach