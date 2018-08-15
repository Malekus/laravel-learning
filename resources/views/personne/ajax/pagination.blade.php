@if($personnes->total() != 0 && $personnes->total() != $personnes->count())
    <div class="row">
        <div class="col">
            <div class="pagination justify-content-center">
                @if($personnes->lastPage() <= 5)
                    @for($i = 1; $i < $personnes->lastPage() + 1; $i++)
                        @if($personnes->currentPage() == $i)
                            <li class="page-item active"><a class="page-link" href="{{ $personnes->url($i) }}">{{ $i  }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $personnes->url($i) }}">{{ $i  }}</a></li>
                        @endif
                    @endfor
                @elseif($personnes->currentPage() <= 3)
                    @for($i = 1; $i < 5; $i++)
                        @if($personnes->currentPage() == $i)
                            <li class="page-item active"><a class="page-link" href="{{ $personnes->url($i) }}">{{ $i  }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $personnes->url($i) }}">{{ $i  }}</a></li>
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $personnes->nextPageUrl() }}">Suivant</a></li>
                @elseif($personnes->lastPage() - 3 <= $personnes->currentPage())
                    <li class="page-item"><a class="page-link" href="{{ $personnes->previousPageUrl() }}">Précédent</a></li>
                    @for($i = 4; $i >= 0; $i--)
                        @if($personnes->currentPage() == $personnes->lastPage() - $i)
                            <li class="page-item active"><a class="page-link" href="{{ $personnes->url($personnes->lastPage() - $i) }}">{{ $personnes->lastPage() - $i  }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $personnes->url($personnes->lastPage() - $i) }}">{{ $personnes->lastPage() - $i  }}</a></li>
                        @endif
                    @endfor

                @else
                    <li class="page-item"><a class="page-link" href="{{ $personnes->previousPageUrl() }}">Précédent</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $personnes->url($personnes->currentPage() - 2) }}">{{ $personnes->currentPage() - 2 }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $personnes->url($personnes->currentPage() - 1) }}">{{ $personnes->currentPage() - 1 }}</a></li>
                    <li class="page-item active"><a class="page-link" href="{{ $personnes->url($personnes->currentPage()) }}">{{ $personnes->currentPage() }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $personnes->url($personnes->currentPage() + 1) }}">{{ $personnes->currentPage() + 1 }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $personnes->url($personnes->currentPage() + 2) }}">{{ $personnes->currentPage() + 2 }}</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $personnes->nextPageUrl() }}">Suivant</a></li>
                @endif
            </div>
        </div>
    </div>
@endif