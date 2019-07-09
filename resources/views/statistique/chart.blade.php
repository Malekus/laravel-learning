
@if(!is_null($idChart))
    <div id="{{ $idChart }}" style="width: 100%; height: 400px;"></div>
    {!! $chart !!}
@endif