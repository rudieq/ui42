<header class="bg-white">
    <nav class="ui42-main-nav navbar navbar-expand-md navbar-light container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/img/logo.png" alt="{{ __('Logo') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-primary" href="#">{{ __('Kontakty a čísla na oddelenia') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        EN
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">EN</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 ui42-search mr-md-2">
                <input class="form-control" type="search" placeholder="" aria-label="{{ __('Hľadať') }}">
                <i class="fa fa-search text-muted"></i>
            </form>
            <button class="btn btn-success my-2 my-sm-0" type="submit">{{ __('Prihlásenie') }}</button>
        </div>
        <div class="collapse navbar-collapse navbarSupportedContent w-100">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">{{ __('O nás') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/minicipalities') }}">{{ __('Zoznam miest') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#">{{ __('Inšpekcia') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#">{{ __('Kontakt') }}</a></li>
            </ul>
        </div>
    </nav>
</header>
