<div class="header">
    <div class="logo">
        <a href="{{ route('index') }}">
            <i class="fa fa-tachometer-alt"></i>
            <span>APCIS 4.0</span>
        </a>

    </div>
    <div class="nav-trigger"><span></span></div>
    <div class="linkSignOut">
        <a href="{{ route('logout') }}">

        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span>Déconnexion</span>
            <i class="fas fa-sign-out-alt"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </div>
</div>

<style>
    .linkSignOut {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height: 100%;
    }

    .linkSignOut a {
        padding: 10px;
        text-decoration: none;
        color: white;
    }

    .linkSignOut a:hover {
        text-decoration: none;
        color: #FFFFEE;
    }
</style>