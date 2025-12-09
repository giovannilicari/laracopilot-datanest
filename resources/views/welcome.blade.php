@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-purple-700 to-blue-800"></div>
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                Sistema Gestionale
                <span class="block bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent">
                    Uffici Pubblici
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 mb-8 max-w-3xl mx-auto leading-relaxed">
                Piattaforma digitale avanzata per la gestione efficiente delle pratiche amministrative, 
                il controllo delle spese e la trasparenza dei processi pubblici.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('admin.login') }}" class="btn-primary px-8 py-4 rounded-xl text-lg font-semibold text-white shadow-2xl hover:shadow-3xl transition-all duration-300 inline-flex items-center">
                    <i class="fas fa-sign-in-alt mr-3"></i>
                    Accedi al Sistema
                </a>
                <a href="#features" class="bg-white/20 backdrop-blur-sm border border-white/30 px-8 py-4 rounded-xl text-lg font-semibold text-white hover:bg-white/30 transition-all duration-300 inline-flex items-center">
                    <i class="fas fa-info-circle mr-3"></i>
                    Scopri di Più
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Funzionalità <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Avanzate</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Un sistema completo per modernizzare la gestione amministrativa degli enti pubblici
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-file-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Gestione Pratiche</h3>
                <p class="text-gray-600 leading-relaxed">
                    Sistema completo per la creazione, modifica e tracciamento delle pratiche amministrative con protocollo digitale integrato.
                </p>
            </div>

            <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-euro-sign text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Controllo Spese</h3>
                <p class="text-gray-600 leading-relaxed">
                    Monitoraggio in tempo reale delle spese previste e sostenute, con reportistica dettagliata e controlli automatici.
                </p>
            </div>

            <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-users text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Gestione Permessi</h3>
                <p class="text-gray-600 leading-relaxed">
                    Sistema avanzato di gestione utenti e permessi per garantire accesso sicuro e controllato alle funzionalità.
                </p>
            </div>

            <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-building text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Multi-Ufficio</h3>
                <p class="text-gray-600 leading-relaxed">
                    Gestione centralizzata di tutti gli uffici dell'ente con assegnazione automatica delle pratiche e workflow personalizzati.
                </p>
            </div>

            <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-chart-bar text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Reportistica</h3>
                <p class="text-gray-600 leading-relaxed">
                    Dashboard interattive e report personalizzabili per analisi dettagliate delle performance e dei trend amministrativi.
                </p>
            </div>

            <div class="card-hover bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-teal-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Sicurezza</h3>
                <p class="text-gray-600 leading-relaxed">
                    Protezione avanzata dei dati con crittografia, backup automatici e conformità alle normative sulla privacy.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Innovazione nella
                    <span class="block bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                        Pubblica Amministrazione
                    </span>
                </h2>
                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    Il nostro sistema rappresenta l'evoluzione digitale della gestione amministrativa pubblica, 
                    progettato per aumentare l'efficienza, garantire la trasparenza e migliorare i servizi ai cittadini.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="text-gray-300">Interfaccia intuitiva e user-friendly</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="text-gray-300">Conformità normative e standard di sicurezza</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="text-gray-300">Supporto tecnico specializzato 24/7</span>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-3xl transform rotate-3"></div>
                <div class="relative bg-white rounded-3xl p-8 shadow-2xl">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-indigo-600 mb-2">98%</div>
                            <div class="text-sm text-gray-600">Efficienza Operativa</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-green-600 mb-2">50+</div>
                            <div class="text-sm text-gray-600">Enti Serviti</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-purple-600 mb-2">24/7</div>
                            <div class="text-sm text-gray-600">Supporto Attivo</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-orange-600 mb-2">100%</div>
                            <div class="text-sm text-gray-600">Conformità</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="servizi" class="py-20 animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                I Nostri <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Servizi</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Soluzioni complete per la digitalizzazione e l'efficientamento della pubblica amministrazione
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="card-hover bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8 border border-blue-200">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-cogs text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Implementazione Sistema</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Installazione e configurazione completa del sistema presso il vostro ente, 
                            con personalizzazione in base alle specifiche esigenze organizzative.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-hover bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl p-8 border border-green-200">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Formazione Personale</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Programmi di formazione completi per tutto il personale, con corsi specializzati 
                            per amministratori e utenti finali del sistema.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-hover bg-gradient-to-br from-purple-50 to-violet-100 rounded-2xl p-8 border border-purple-200">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-headset text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Assistenza Tecnica</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Supporto tecnico continuo con team specializzato, helpdesk dedicato 
                            e interventi di manutenzione programmata e straordinaria.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card-hover bg-gradient-to-br from-orange-50 to-red-100 rounded-2xl p-8 border border-orange-200">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-sync-alt text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Aggiornamenti</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Aggiornamenti continui del sistema per garantire conformità normativa, 
                            nuove funzionalità e miglioramenti delle performance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contatti" class="py-20 bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Contattaci <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent">Oggi</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Siamo pronti ad aiutarti nella digitalizzazione del tuo ente pubblico
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="space-y-8">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-map-marker-alt text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Sede Principale</h3>
                        <p class="text-gray-300">Via Roma 123, 00100 Roma, Italia</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-teal-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-phone text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Telefono</h3>
                        <p class="text-gray-300">+39 06 1234567</p>
                        <p class="text-gray-300">Numero Verde: 800 123456</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-envelope text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Email</h3>
                        <p class="text-gray-300">info@sistemauffici.gov.it</p>
                        <p class="text-gray-300">supporto@sistemauffici.gov.it</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-pink-400 to-red-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Orari di Servizio</h3>
                        <p class="text-gray-300">Lunedì - Venerdì: 9:00 - 18:00</p>
                        <p class="text-gray-300">Supporto Urgenze: 24/7</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Nome</label>
                            <input type="text" class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Il tuo nome">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Cognome</label>
                            <input type="text" class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Il tuo cognome">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="La tua email">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Ente di Appartenenza</label>
                        <input type="text" class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Nome dell'ente">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Messaggio</label>
                        <textarea rows="4" class="w-full px-4 py-3 bg-white/20 border border-white/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Descrivi le tue esigenze..."></textarea>
                    </div>
                    <button type="submit" class="w-full btn-primary px-6 py-3 rounded-lg font-semibold text-white transition-all duration-300 hover:shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Invia Richiesta
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection