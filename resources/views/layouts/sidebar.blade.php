<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('images/logo_TournamentManager.png') }}" alt="TM Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">Tournament Manager</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('tournament.create') }}" class="nav-link active">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Nouveau Tournoi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('club') }}" class="nav-link">
                        {{-- <a href="" class="nav-link"> --}}

                        <i class="nav-icon fas fa-home"></i>
                        <p>Tableau de bord
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/club/tournament') }}" class="nav-link">
                        <img src="{{ asset('images/tournoi.png') }}" alt="Tournament Icon" class="nav-icon">
                        {{-- <i class="nav-icon fas fa-player"></i> --}}
                        <p>Les Tournois
                        </p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/club/player') }}" class="nav-link">
                        <img src="{{ asset('images/maillot-de-foot.png') }}" alt="T-shirt Icon" class="nav-icon">
                        {{-- <i class="nav-icon fas fa-player"></i> --}}
                        <p>Les Joueurs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/club/inscription') }}" class="nav-link">
                        <img src="{{ asset('images/inscription.png') }}" alt="T-shirt Icon" class="nav-icon">
                        {{-- <i class="nav-icon fas fa-player"></i> --}}
                        <p>Les Insciptions
                        </p>
                    </a>
                </li>
                <li class="nav-header">MES TOURNOIS</li>
                @if (auth()->user()->tournaments = 'null')
                    <li class="nav-item">
                    </li>
                @else
                    @foreach (auth()->user()->tournaments as $tournament)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>{{ $tournament->name }}
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('tournament_show', $tournament->name) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Présentation</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inscriptions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../forms/editors.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gérer</p>
                                    </a>
                                </li>

                            </ul>

                        </li>
                    @endforeach

                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
