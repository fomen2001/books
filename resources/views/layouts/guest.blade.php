<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .min-h-screen {
            background-image: url('{{ asset('assets/img/background.jpg') }}'); /* URL de votre image */
            background-size: cover; /* Assure que l'image couvre toute la section */
            background-position: center; /* Centre l'image horizontalement et verticalement */
        }

        .rounded-image {
            border-radius: 50%; /* Rendre l'image ronde */
            width: 100px; /* Définir une largeur fixe pour l'image */
            height: 100px; /* Définir une hauteur fixe pour l'image */
            object-fit: cover; /* Assure que l'image couvre toute la zone */
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
  
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Contenu de votre page ici -->
        <div class="top-right">
            <button type="button" class="btn btn-outline-primary"><a href="{{ route('welcome') }}" class="text-blue-500 hover:text-blue-700">Welcome</a></button>
        </div>
        <!-- Nouvelle section d'image -->
        <div class="mt-4">
            <img src="{{ asset('assets/img/cover.jpeg') }}" alt="Description de votre image" class="rounded-image">
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>
</html>
