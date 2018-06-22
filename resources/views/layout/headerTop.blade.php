<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 pb-2">
                        @if(isset($iconHeader))
                            <h1><i class="{{ $iconHeader  }}"></i> {{ $titleHeader }}</h1>
                        @else
                            <h1>{{ $titleHeader }}</h1>
                        @endif
                    </div>