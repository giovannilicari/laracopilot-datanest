<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Gestionale Uffici</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-primary:hover { background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%); transform: translateY(-1px); }
        .animate-fade-in { animation: fadeIn 0.6s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-sm shadow-lg border-b border-blue-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-building text-2xl text-indigo-600"></i>
                    </div>
                    <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Sistema Gestionale Uffici
                    </h1>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-indigo-50">
                            Home
                        </a>
                        <a href="#servizi" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-indigo-50">
                            Servizi
                        </a>
                        <a href="#contatti" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-indigo-50">
                            Contatti
                        </a>
                        <a href="{{ route('admin.login') }}" class="btn-primary text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-sign-in-alt mr-2"></i>Area Admin
                        </a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-700 hover:text-indigo-600 focus:outline-none focus:text-indigo-600" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-sm border-t border-blue-100">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 text-base font-medium transition-all duration-200">Home</a>
                <a href="#servizi" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 text-base font-medium transition-all duration-200">Servizi</a>
                <a href="#contatti" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 text-base font-medium transition-all duration-200">Contatti</a>
                <a href="{{ route('admin.login') }}" class="btn-primary text-white block px-3 py-2 text-base font-medium transition-all duration-200 rounded-lg mx-3 mt-2">
                    <i class="fas fa-sign-in-alt mr-2"></i>Area Admin
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-slate-800 via-slate-900 to-slate-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-building text-2xl text-indigo-400"></i>
                        <h3 class="text-lg font-bold">Ente Pubblico</h3>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Sistema di gestione digitale per l'efficienza amministrativa e la trasparenza dei processi pubblici.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors duration-200">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors duration-200">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors duration-200">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-indigo-400">Link Rapidi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Trasparenza</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Albo Pretorio</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Bandi e Gare</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Modulistica</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-indigo-400">Servizi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Gestione Pratiche</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Protocollo Digitale</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Controllo Spese</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Reportistica</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white text-sm transition-colors duration-200">Assistenza Tecnica</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-indigo-400">Contatti</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-indigo-400"></i>
                            <span class="text-gray-300 text-sm">Via Roma 123, 00100 Città</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-indigo-400"></i>
                            <span class="text-gray-300 text-sm">+39 06 1234567</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-indigo-400"></i>
                            <span class="text-gray-300 text-sm">info@ente.gov.it</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-clock text-indigo-400"></i>
                            <span class="text-gray-300 text-sm">Lun-Ven 9:00-17:00</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-gray-700 my-8">

            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} Sistema Gestionale Uffici. Tutti i diritti riservati.
                </p>
                <p class="text-gray-400 text-sm mt-2 md:mt-0">
                    Made with ❤️ by <span class="text-indigo-400 font-semibold">LaraCopilot</span>
                </p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add animation on scroll
        $(document).ready(function() {
            $(window).scroll(function() {
                $('.animate-on-scroll').each(function() {
                    if ($(this).offset().top < $(window).scrollTop() + $(window).height() - 100) {
                        $(this).addClass('animate-fade-in');
                    }
                });
            });
        });
    </script>
</body>
</html>