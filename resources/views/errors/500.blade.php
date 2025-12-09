<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Errore Server - Sistema Gestionale Uffici</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .error-gradient { background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); }
        .animate-pulse-slow { animation: pulse 3s infinite; }
        .animate-fade-in { animation: fadeIn 0.8s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
    </style>
</head>
<body class="error-gradient min-h-screen flex items-center justify-center p-4">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-red-400/20 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-2xl mx-auto text-center animate-fade-in">
        <div class="mb-8">
            <div class="mx-auto w-32 h-32 bg-white/20 rounded-full flex items-center justify-center mb-6 animate-pulse-slow">
                <i class="fas fa-server text-6xl text-white"></i>
            </div>
            <h1 class="text-8xl font-bold text-white mb-4">500</h1>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Errore Interno del Server
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-lg mx-auto leading-relaxed">
                Si è verificato un errore interno del server. 
                I nostri tecnici sono stati automaticamente notificati e stanno lavorando per risolvere il problema.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
            <a href="{{ route('home') }}" class="bg-white text-red-600 px-8 py-4 rounded-xl text-lg font-semibold hover:bg-gray-100 transition-all duration-300 inline-flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-home mr-3"></i>
                Torna alla Homepage
            </a>
            <button onclick="location.reload()" class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:bg-white/30 transition-all duration-300 inline-flex items-center">
                <i class="fas fa-refresh mr-3"></i>
                Ricarica Pagina
            </button>
        </div>

        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
            <h3 class="text-xl font-bold text-white mb-4">Cosa Puoi Fare</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-clock text-red-300 mt-1"></i>
                    <div>
                        <div class="text-white font-semibold">Riprova Più Tardi</div>
                        <div class="text-gray-300 text-sm">Il problema potrebbe essere temporaneo</div>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-refresh text-red-300 mt-1"></i>
                    <div>
                        <div class="text-white font-semibold">Ricarica la Pagina</div>
                        <div class="text-gray-300 text-sm">A volte una semplice ricarica risolve</div>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-history text-red-300 mt-1"></i>
                    <div>
                        <div class="text-white font-semibold">Torna Indietro</div>
                        <div class="text-gray-300 text-sm">Usa il pulsante indietro del browser</div>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-phone text-red-300 mt-1"></i>
                    <div>
                        <div class="text-white font-semibold">Contatta il Supporto</div>
                        <div class="text-gray-300 text-sm">+39 06 1234567</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
            <div class="flex items-center justify-center space-x-2 text-white">
                <i class="fas fa-info-circle text-red-300"></i>
                <span class="text-sm">
                    Codice Errore: <span class="font-mono font-semibold">SRV-500-{{ date('YmdHis') }}</span>
                </span>
            </div>
            <div class="text-xs text-gray-300 mt-2">
                Fornisci questo codice al supporto tecnico per una diagnosi più rapida
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-white/80 text-sm">
                © {{ date('Y') }} Sistema Gestionale Uffici. Tutti i diritti riservati.
            </p>
            <p class="text-white/60 text-sm mt-2">
                Made with ❤️ by <span class="text-red-300 font-semibold">LaraCopilot</span>
            </p>
        </div>
    </div>

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add click effect to buttons
            document.querySelectorAll('a, button').forEach(element => {
                element.addEventListener('click', function(e) {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Auto-refresh option after 60 seconds
            setTimeout(() => {
                if (confirm('Il problema persiste. Vuoi ricaricare automaticamente la pagina?')) {
                    location.reload();
                }
            }, 60000);

            // Show loading state when refreshing
            document.querySelector('button[onclick="location.reload()"]').addEventListener('click', function() {
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Ricaricamento...';
                this.disabled = true;
            });
        });
    </script>
</body>
</html>