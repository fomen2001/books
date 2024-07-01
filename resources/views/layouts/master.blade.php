
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Spatie Permission</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Ajout de transitions pour les liens de navigation */
        .navbar-nav .nav-link {
            transition: color 0.3s, background-color 0.3s;
        }
        
        /* Effet de survol pour les liens de navigation */
        .navbar-nav .nav-link:hover {
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
        }

        /* Animation du bouton de recherche */
        .search-form .form-control {
            transition: width 0.4s ease-in-out;
            width: 150px;
        }
        
        .search-form .form-control:focus {
            width: 300px;
        }

        /* Animation pour le bouton navbar-toggler */
        .navbar-toggler {
            transition: transform 0.2s;
        }

        .navbar-toggler:hover {
            transform: rotate(90deg);
        }
    </style>
</head>

<body>
 
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    Online Book Shop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                       
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ ('Login') }} </a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ ('Register') }}</a></li>
                        @else
                        @canany(['books-create', 'books-view', 'books-delete', 'books-list', 'books-edit'])
                            <li><a class="nav-link" href="{{ route('books.index') }}"> Books</a></li>
                        @endcanany
                        @canany(['cart-create', 'cart-view', 'cart-delete', 'cart-list', 'cart-edit'])    
                            <li><a class="nav-link" href="{{ route('cart.index') }}">Your Cart</a></li>
                        @endcanany
                        @canany(['sales-list'])    
                            <li><a class="nav-link" href="{{ route('sales.index') }}">Sales Report</a></li>
                        @endcanany
                        @canany(['user-create', 'user-view', 'user-delete', 'user-list', 'user-edit'])
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                        @endcanany
                        @canany(['role-create', 'role-view', 'role-delete', 'role-list', 'role-edit'])
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                        @endcanany
                            <form action=""  method="GET" class="form-inline my-2 my-lg-0 search-form">
                          
                                <input class="form-control mr-sm-2" type="search" placeholder="Search for books" aria-label="Search" name="query">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                            
                         
                         
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bg-light">
            <div class="container">
                @yield('content')
            </div>
        </main>
        <hr style="background-color: red; height: 10px; border-raduis: 4px">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Online BookStore</h5>
                        <p>Votre destination pour tous les livres, des classiques aux nouveautés. Achetez facilement et découvrez de nouvelles lectures.</p>
                    </div>
                    
                    <div class="col-md-3">
                        <h5>Contactez-nous</h5>
                        <p><i class="bi bi-envelope-at-fill"> contact@onlinebookstore.com</i></p>
                        <p><i class="bi bi-whatsapp">+237 681 20 89 04</i> </p>
                    </div>
                    <div class="col-md-3">
                        <h5>Suivez-nous</h5>
                        <ul class="social-icons">
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter-x"></i></a></li>
                            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
