@if(strpos(strtolower($title), 'partenaire') !== false)
    <div class="col-12 pb-2">
        <h1><i class="fas fa-users mr-3"></i>{{ $title }}</h1>
    </div>
@endif