<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Non Trovata - Sistema Gestionale Uffici</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .error-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .animate-bounce-slow { animation: bounce 2s infinite; }
        .animate-fade-in { animation: fadeIn 0.8s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="error-gradient min-h-screen flex items-center justify-center p-4">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-2xl mx-auto text-center animate-fade-in">
        <div class="mb-8">
            <div class="mx-auto w-32 h-32 bg-white/20 rounded-full flex items-center justify-center mb-6 animate-bounce-slow">
                <i class="fas fa-exclamation-triangle text-6xl text-white"></i>
            </div>
            <h1 class="text-8xl font-bold text-white mb-4">404</h1>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Pagina Non Trovata
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-lg mx-auto leading-relaxed">
                La pagina che stai cercando non esiste o è stata spostata. 
                Verifica l'URL o torna alla homepage per continuare la navigazione.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
            <a href="{{ route('home') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-xl text-lg font-semibold hover:bg-gray-100 transition-all duration-300 inline-flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-home mr-3"></i>
                Torna alla Homepage
            </a>
            <a href="{{ route('admin.login') }}" class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:bg-white/30 transition-all duration-300 inline-flex items-center">
                <i class="fas fa-sign-in-alt mr-3"></i>
                Area Admin
            </a>
        </div>

        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
            <h3 class="text-xl font-bold text-white mb-4">Suggerimenti Utili</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-search text-indigo-300 mt-1"></i>
                    <div>
                        <div class="text-white font-semibold">Verifica l'URL</div>
                        <div class="text-gray-300 text-sm">Controlla che l'indirizzo sia corretto</div>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-refresh text-indigo-300 mt-1"></i>
                    <div>
                        <div class="text-white font-semibold">Ricarica la Pagina</div>
                        <div class="text-gray-300 text-sm">Prova a ricaricare la pagina</div>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-history text-indigo-300 mt-1"></i>
                    <div>
                        <div class="text-white font-semibold">Torna Indietro</div>
                        <div class="text-gray-300 text-sm">Usa il pulsante indietro del browser</div>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-headset text-indigo-300 mt-1"></i>
                    <div>
                        <div class="text-white font-semibold">Contatta il Supporto</div>
                        <div class="text-gray-300 text-sm">Se il problema persiste</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-white/80 text-sm">
                © {{ date('Y') }} Sistema Gestionale Uffici. Tutti i diritti riservati.
            </p>
            <p class="text-white/60 text-sm mt-2">
                Made with ❤️ by <span class="text-indigo-300 font-semibold">LaraCopilot</span>
            </p>
        </div>
    </div>

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add click effect to buttons
            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function(e) {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Auto-redirect after 30 seconds (optional)
            setTimeout(() => {
                if (confirm('Vuoi essere reindirizzato automaticamente alla homepage?')) {
                    window.location.href = '{{ route("home") }}';
                }
            }, 30000);
        });
    </script>
</body>
</html>