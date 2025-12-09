@extends('layouts.admin')

@section('page-title', 'Nuova Pratica')
@section('page-description', 'Crea una nuova pratica amministrativa')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
        <form action="{{ route('admin.entries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-calendar mr-2 text-indigo-500"></i>Data
                    </label>
                    <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                </div>

                <div>
                    <label for="ufficio" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-building mr-2 text-indigo-500"></i>Ufficio
                    </label>
                    <select id="ufficio" name="ufficio" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                        <option value="">Seleziona Ufficio</option>
                        @foreach($offices as $office)
                            <option value="{{ $office }}">{{ $office }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="oggetto" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2 text-indigo-500"></i>Oggetto
                </label>
                <input type="text" id="oggetto" name="oggetto" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                       placeholder="Inserisci l'oggetto della pratica">
            </div>

            <div>
                <label for="contenuto" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-align-left mr-2 text-indigo-500"></i>Contenuto
                </label>
                <textarea id="contenuto" name="contenuto" rows="5" required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                          placeholder="Descrizione dettagliata della pratica"></textarea>
            </div>

            <div>
                <label for="spesa_prevista" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-euro-sign mr-2 text-indigo-500"></i>Spesa Prevista (€)
                </label>
                <input type="number" id="spesa_prevista" name="spesa_prevista" step="0.01" min="0" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                       placeholder="0.00">
            </div>

            <div>
                <label for="protocollo" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-barcode mr-2 text-indigo-500"></i>Numero Protocollo
                </label>
                <input type="text" id="protocollo" name="protocollo" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200"
                       placeholder="PROT-YYYY-XXX">
            </div>

            <div>
                <label for="document" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-indigo-500"></i>Documento Allegato
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-indigo-400 transition-colors duration-200">
                    <div class="space-y-1 text-center">
                        <div class="mx-auto w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cloud-upload-alt text-white text-xl"></i>
                        </div>
                        <div class="flex text-sm text-gray-600">
                            <label for="document" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                <span>Carica un file</span>
                                <input id="document" name="document" type="file" class="sr-only" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            </label>
                            <p class="pl-1">o trascina qui</p>
                        </div>
                        <p class="text-xs text-gray-500">PDF, DOC, DOCX, XLS, XLSX fino a 10MB</p>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-semibold text-blue-800">Informazioni Importanti</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Assicurati che tutti i campi obbligatori siano compilati</li>
                                <li>Il numero di protocollo deve essere univoco</li>
                                <li>I documenti allegati devono essere in formato PDF o Office</li>
                                <li>La spesa prevista verrà utilizzata per i controlli di budget</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <a href="{{ route('admin.entries') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all duration-200 inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Annulla
                </a>
                <button type="submit" onclick="showLoading(this)" class="btn-primary px-8 py-3 rounded-lg text-white font-semibold transition-all duration-200 shadow-md hover:shadow-lg inline-flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Salva Pratica
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Auto-generate protocol number
document.addEventListener('DOMContentLoaded', function() {
    const protocolInput = document.getElementById('protocollo');
    if (!protocolInput.value) {
        const year = new Date().getFullYear();
        const randomNum = Math.floor(Math.random() * 1000).toString().padStart(3, '0');
        protocolInput.value = `PROT-${year}-${randomNum}`;
    }
});

// File upload preview
document.getElementById('document').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const fileInfo = document.createElement('div');
        fileInfo.className = 'mt-2 text-sm text-gray-600';
        fileInfo.innerHTML = `<i class="fas fa-file mr-2"></i>File selezionato: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
        
        const existingInfo = e.target.closest('.border-dashed').querySelector('.mt-2.text-sm.text-gray-600');
        if (existingInfo) {
            existingInfo.remove();
        }
        
        e.target.closest('.border-dashed').appendChild(fileInfo);
    }
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const requiredFields = this.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('border-red-500');
            field.focus();
        } else {
            field.classList.remove('border-red-500');
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        alert('Per favore, compila tutti i campi obbligatori.');
    }
});
</script>
@endsection