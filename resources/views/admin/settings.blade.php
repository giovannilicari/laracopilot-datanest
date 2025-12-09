@extends('layouts.admin')

@section('page-title', 'Impostazioni Sistema')
@section('page-description', 'Configura le impostazioni generali del sistema')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-8">
        <!-- General Settings -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Impostazioni Generali</h3>
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nome Sistema</label>
                        <input type="text" value="{{ $settings['system_name'] }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Amministratore</label>
                        <input type="email" value="{{ $settings['admin_email'] }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Timeout Sessione</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="15">15 minuti</option>
                            <option value="30" selected>30 minuti</option>
                            <option value="60">1 ora</option>
                            <option value="120">2 ore</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Frequenza Backup</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="daily" selected>Giornaliero</option>
                            <option value="weekly">Settimanale</option>
                            <option value="monthly">Mensile</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" onclick="showLoading(this)" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold transition-all duration-200 shadow-md hover:shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        Salva Impostazioni
                    </button>
                </div>
            </form>
        </div>

        <!-- File Settings -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Impostazioni File</h3>
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Dimensione Massima File</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="5">5 MB</option>
                            <option value="10" selected>10 MB</option>
                            <option value="25">25 MB</option>
                            <option value="50">50 MB</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Estensioni Consentite</label>
                        <input type="text" value="{{ $settings['allowed_extensions'] }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    </div>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-500 text-lg mt-0.5"></i>
                        <div class="ml-3">
                            <h4 class="text-sm font-semibold text-blue-800">Informazioni</h4>
                            <p class="text-sm text-blue-700 mt-1">
                                Le estensioni devono essere separate da virgole. Esempio: pdf, doc, docx, xls, xlsx
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" onclick="showLoading(this)" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold transition-all duration-200 shadow-md hover:shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        Salva Impostazioni
                    </button>
                </div>
            </form>
        </div>

        <!-- Security Settings -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Impostazioni Sicurezza</h3>
            <div class="space-y-6">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Autenticazione a Due Fattori</h4>
                        <p class="text-sm text-gray-600">Richiedi verifica aggiuntiva per il login</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Log Attività</h4>
                        <p class="text-sm text-gray-600">Registra tutte le azioni degli utenti</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                    </label>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Backup Automatico</h4>
                        <p class="text-sm text-gray-600">Backup automatico dei dati del sistema</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-8">
        <!-- System Status -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Stato Sistema</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Versione Sistema</span>
                    <span class="text-sm font-semibold text-gray-900">v2.1.4</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Ultimo Backup</span>
                    <span class="text-sm font-semibold text-green-600">Oggi, 03:00</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Spazio Utilizzato</span>
                    <span class="text-sm font-semibold text-gray-900">2.8 GB / 10 GB</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Utenti Online</span>
                    <span class="text-sm font-semibold text-indigo-600">12</span>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-gray-200">
                <div class="text-sm text-gray-600 mb-2">Utilizzo Spazio</div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-indigo-600 h-2 rounded-full" style="width: 28%"></div>
                </div>
                <div class="text-xs text-gray-500 mt-1">28% utilizzato</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Azioni Rapide</h3>
            <div class="space-y-3">
                <button onclick="alert('Backup in corso...')" class="w-full p-3 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg hover:from-green-100 hover:to-emerald-100 transition-all duration-200 text-left">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-download text-white text-sm"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Backup Manuale</span>
                    </div>
                </button>

                <button onclick="alert('Pulizia in corso...')" class="w-full p-3 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg hover:from-blue-100 hover:to-indigo-100 transition-all duration-200 text-left">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-broom text-white text-sm"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Pulisci Cache</span>
                    </div>
                </button>

                <button onclick="alert('Controllo in corso...')" class="w-full p-3 bg-gradient-to-r from-purple-50 to-violet-50 border border-purple-200 rounded-lg hover:from-purple-100 hover:to-violet-100 transition-all duration-200 text-left">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shield-alt text-white text-sm"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Controllo Sicurezza</span>
                    </div>
                </button>

                <button onclick="alert('Log esportati!')" class="w-full p-3 bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-lg hover:from-orange-100 hover:to-red-100 transition-all duration-200 text-left">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-export text-white text-sm"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Esporta Log</span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Support -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">Supporto</h3>
            <div class="space-y-3">
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-envelope mr-3 text-indigo-500"></i>
                    <span>supporto@sistemauffici.gov.it</span>
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-phone mr-3 text-green-500"></i>
                    <span>+39 06 1234567</span>
                </div>
                <div class="flex items-center text-sm text-gray-600">
                    <i class="fas fa-clock mr-3 text-orange-500"></i>
                    <span>Lun-Ven 9:00-18:00</span>
                </div>
            </div>
            <button onclick="alert('Apertura ticket di supporto...')" class="w-full mt-4 btn-primary py-2 px-4 rounded-lg text-white font-medium transition-all duration-200">
                <i class="fas fa-headset mr-2"></i>
                Contatta Supporto
            </button>
        </div>
    </div>
</div>

<script>
// Form submission handlers
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const button = this.querySelector('button[type="submit"]');
        showLoading(button);
        
        setTimeout(() => {
            alert('Impostazioni salvate con successo!');
            button.innerHTML = '<i class="fas fa-save mr-2"></i>Salva Impostazioni';
            button.disabled = false;
        }, 2000);
    });
});
</script>
@endsection