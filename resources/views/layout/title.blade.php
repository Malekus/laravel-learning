{{--

@if(strpos(strtolower($title), 'partenaire') !== false)
    <div class="col-12 pb-2">
        <h1><i class="fas fa-users mr-3"></i>{{ $title }}</h1>
    </div>
@endif

@if(strpos(strtolower($title), 'personne') !== false)
    <div class="col-12 pb-2">
        <h1><i class="fas fa-user mr-3"></i>{{ $title }}</h1>
    </div>
@endif

@if(strpos(strtolower($title), 'configuration') !== false)
    <div class="col-12 pb-2">
        <h1><i class="fas fa-cogs mr-3"></i>{{ $title }}</h1>
    </div>
@endif

@if(strpos(strtolower($title), 'caf') !== false)
    <div class="col-12 pb-2">
        <h1><i class="far fa-calendar-alt mr-3"></i>{{ $title }}</h1>
    </div>
@endif

@if(strpos(strtolower($title), 'routine') !== false)
    <div class="col-12 pb-2">
        <h1><i class="fas fa-user mr-3"></i>{{ $title }}</h1>
    </div>
@endif


--}}

<div class="col-12 pb-2">
    <h1><i class="fas {{  $icon  }} mr-3" ></i>{{ $title }}</h1>
</div>
