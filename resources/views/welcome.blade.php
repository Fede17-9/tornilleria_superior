@extends('layouts.plantilla')

@section('contenido')
    <style>
        body {
            background-image: url('https://images.pexels.com/photos/30824327/pexels-photo-30824327.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=1080');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Nunito', sans-serif;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: -1;
        }

        .card-welcome {
            max-width: 600px;
            margin-top: 100px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
            padding: 40px;
        }

        .card-welcome h2 {
            color: #1f2d3d;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .card-welcome p {
            font-size: 1.1rem;
            color: #555;
        }

        .btn-custom {
            border-radius: 8px;
            font-size: 1rem;
            padding: 12px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-outline-secondary {
            border-color: #ccc;
        }

        .footer-text {
            font-size: 0.85rem;
            color: #aaa;
        }

        .logo-icon {
            font-size: 3rem;
            color: #007bff;
        }

        .text-shadow {
            text-shadow: 1px 1px 4px rgba(0,0,0,0.2);
        }
    </style>

    <div class="overlay"></div>

    <div class="container d-flex justify-content-center">
        <div class="card card-welcome text-center">
            <div class="mb-4">
                <i class="fas fa-screwdriver-wrench logo-icon mb-2"></i>
                <h2 class="text-shadow">Bienvenido a Tornillería Superior</h2>
                <p class="text-shadow">Sistema profesional de gestión de inventario para productos, clientes y proveedores.</p>
            </div>
            <div>
                <a href="{{ route('login') }}" class="btn btn-primary btn-custom w-100 mb-3">
                    <i class="fas fa-sign-in-alt me-1"></i> Iniciar sesión
                </a>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-custom w-100">
                    <i class="fas fa-user-plus me-1"></i> Registrarse
                </a>
            </div>
            <div class="mt-4 footer-text">
                © {{ date('Y') }} Tornillería Superior. Todos los derechos reservados.
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- FontAwesome para íconos --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
@endsection
