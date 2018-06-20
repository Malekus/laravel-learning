<div class="side-nav">
    <nav>
        <ul>
            <li>
                <a href="{{ route('personne.index') }}">
                    <span><i class="fas fa-user"></i></span>
                    <span>Personne</span>
                </a>
            </li>
            <li>
                <a href="{{ route('partenaire.index') }}">
                    <span><i class="fas fa-users"></i></span>
                    <span>Partenaire</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('statistique.index') }}">
                    <span><i class="fas fa-chart-bar"></i></span>
                    <span>Statistique</span>
                </a>
            </li>
            <li>
                <a href="{{ route('exportation.index') }}">
                    <span><i class="fas fa-exchange-alt"></i></span>
                    <span>Payments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('configuration.index') }}">
                    <span><i class="fas fa-cogs"></i></span>
                    <span>Configuration</span>
                </a>
            </li>
        </ul>
    </nav>
</div>


<aside class="menu">
    <ul class="menu-list">
        <li><a href="{{ route('personne.index') }}" class=""><span class="icon"><i class="fas fa-user"></i></span>Personne</a></li>
        <li><a href="{{ route('partenaire.index') }}"><span class="icon"><i class="fas fa-users"></i></span>Partenaire</a></li>
        <li><a href="{{ route('statistique.index') }}"><span class="icon"><i class="fas fa-chart-bar"></i></span>Statistique</a></li>
        <li><a href="{{ route('exportation.index') }}"><span class="icon"><i class="fas fa-exchange-alt"></i></span>Exportation</a></li>
        <li><a href="{{ route('configuration.index') }}"><span class="icon"><i class="fas fa-cogs"></i></span>Configuration</a></li>
    </ul>
</aside>

