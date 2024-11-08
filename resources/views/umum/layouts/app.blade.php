<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* CSS untuk memastikan footer selalu di bagian bawah */
        body,
        html {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            flex: 1;
        }
    </style>
</head>

<body>
    <!-- Header with logo and navigation -->
    <header class="bg-dark text-white">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <a href="/" class="text-gold text-decoration-none">
                <h1 class="h4 m-0">Muria Batik</h1>
            </a>
            <nav>
                <a href="{{ route('umum.index') }}" class="text-dark me-3 btn btn-warning">Home</a>
                <a href="{{ route('umum.produk') }}" class="text-dark me-3 btn btn-warning">Produk</a>
            </nav>
            <div class="flex flex-1 items-start justify-between">
                <p class="text-6xl font-bold mb-4">{{ $keranjangs->count() }}</p>

                <a href="{{ route('keranjang.index') }}" class="relative bg-gold text-black p-3 rounded-full hover:bg-yellow-600 mt-2">
                    <!-- Ikon keranjang -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4m1.6 8l1.3 5.2a1 1 0 001 .8h9.4a1 1 0 001-.8l1.3-5.2M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                    </svg>

                    <!-- Badge jumlah item di pojok kanan atas ikon -->
                    @if ($keranjangs->count() > 0)
                        <span class="absolute -top-2 -right-2 inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-600 border-2 border-white rounded-full">
                            {{ $keranjangs->count() }}
                        </span>
                    @endif
                </a>
            </div>





        </div>
    </header>

    <style>
        /* Warna-warna khusus */
        .bg-dark {
            background-color: #2f2f2f !important;
            /* Abu gelap */
        }

        .text-gold {
            color: #d4af37 !important;
            /* Emas */
        }

        .bg-gold {
            background-color: #d4af37 !important;
            /* Emas untuk badge */
        }
    </style>


    <!-- Main catalog container -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark mt-auto">
        <div class="container text-center">
            <small>Muria Batik &copy; 2024 kerajinan batik asli Kudus</small>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
