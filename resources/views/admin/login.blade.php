<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Sistema Gestionale Uffici</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .login-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .btn-primary { background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); }
        .btn-primary:hover { background: linear-gradient(135deg, #5856eb 0%, #7c3aed 100%); transform: translateY(-1px); }
        .animate-fade-in { animation: fadeIn 0.8s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="login-gradient min-h-screen flex items-center justify-center p-4">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative w-full max-w-md animate-fade-in">
        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-white/20">
            <div class="text-center mb-8">
                <div class="mx-auto w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-user-shield text-2xl text-white"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Area Amministratore</h2>
                <p class="text-gray-600">Accedi al pannello di controllo</p>
            </div>

            @if($errors->has('login'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        {{ $errors->first('login') }}
                    </div>
                </div>
            @endif

            <form action="/admin/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-indigo-500"></i>Email
                    </label>
                    <input type="email" id="email" name="email" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                           placeholder="Inserisci la tua email">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-indigo-500"></i>Password
                    </label>
                    <input type="password" id="password" name="password" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                           placeholder="Inserisci la password">
                </div>

                <button type="submit" class="w-full btn-primary py-3 rounded-lg text-white font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Accedi al Sistema
                </button>
            </form>

            <div class="mt-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <h3 class="text-sm font-semibold text-blue-800 mb-3 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Credenziali di Accesso
                </h3>
                <div class="space-y-2 text-sm text-blue-700">
                    <div class="flex justify-between">
                        <span>Super Admin:</span>
                        <span class="font-mono">admin@office.gov / admin123</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Manager:</span>
                        <span class="font-mono">manager@office.gov / manager123</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Impiegato:</span>
                        <span class="font-mono">clerk@office.gov / clerk123</span>
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Torna al sito principale
                </a>
            </div>
        </div>

        <div class="text-center mt-6">
            <p class="text-white/80 text-sm">
                © {{ date('Y') }} Sistema Gestionale Uffici. Tutti i diritti riservati.
            </p>
        </div>
    </div>

    <script>
        // Auto-fill demo credentials
        document.addEventListener('DOMContentLoaded', function() {
            const credentialButtons = document.querySelectorAll('.credential-btn');
            credentialButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const email = this.dataset.email;
                    const password = this.dataset.password;
                    document.getElementById('email').value = email;
                    document.getElementById('password').value = password;
                });
            });
        });

        // Add loading state to form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Accesso in corso...';
            button.disabled = true;
        });
    </script>
</body>
</html>