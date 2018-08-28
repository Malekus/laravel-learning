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
                    <span>Exportation</span>
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
