<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Meow' : 'Meow' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <header> 
        @if (Route::has('login'))
        <div class="px-3 py-2 text-bg-dark border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none display-6">Meows</a>
                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        @auth
                        <li class="nav-link text-white">
                            <span>{{ auth()->user()->name }}</span>
                        </li>
                        <li>
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="nav-link text-white">Logout</button>
                            </form>
                        </li>
                        @else
                            <li>
                                <a href="{{route('login')}}" class="nav-link text-white">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href= "{{route('register')}}" class="nav-link text-white">Sign up</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </header>

    <section class="container mt-3">

         <!-- Success Toast -->
        @if (session('success'))
        <div id="successAlert" class="alert alert-warning alert-dismissible fade show" role="alert">
             {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- JS for 3s toast dismissal -->
        <script>
            setTimeout(function () {
                let alert = document.getElementById('successAlert');
                if (alert) {
                    alert.remove();
                }
            }, 3000);
        </script>

        {{ $slot }}
    </section>
</body>
</html>