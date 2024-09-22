    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">e-Hibah</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link @if ($page == 'index') active @endif" aria-current="page"
                                href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($page == 'proposal') active @endif"
                                href="{{ route('proposal.list') }}">Proposal</a>
                        </li>
                    </ul>
                    <a href="{{ route('proposal.create') }}">
                        <button class="btn btn-outline-info" type="submit">Submit Proposal</button>
                    </a>
                    &nbsp;
                    <a href="{{ route('admin.dashboard') }}">
                        <button class="btn btn-outline-warning" type="submit">Login Admin</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>
