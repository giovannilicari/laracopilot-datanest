@extends('layouts.admin')

@section('page-title', 'Gestione Documenti')
@section('page-description', 'Visualizza e gestisci tutti i documenti del sistema')

@section('content')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
    <div class="flex-1">
        <div class="flex items-center space-x-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" placeholder="Cerca documenti..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Tutti gli Uffici</option>
                <option value="tecnico">Ufficio Tecnico</option>
                <option value="amministrativo">Ufficio Amministrativo</option>
                <option value="urbanistica">Ufficio Urbanistica</option>
                <option value="ragioneria">Ufficio Ragioneria</option>
                <option value="personale">Ufficio Personale</option>
            </select>
        </div>
    </div>
    <div class="mt-4 lg:mt-0 lg:ml-6">
        <button onclick="alert('Funzionalità in sviluppo')" class="btn-primary px-6 py-2 rounded-lg text-white font-semibold inline-flex items-center transition-all duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-upload mr-2"></i>
            Carica Documento
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
    @foreach($documents as $document)
    <div class="card-hover bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-file-pdf text-white text-lg"></i>
            </div>
            <div class="flex space-x-2">
                <button onclick="alert('Download: {{ $document['name'] }}')" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200" title="Download">
                    <i class="fas fa-download"></i>
                </button>
                <button onclick="if(confirmDelete()) alert('Funzionalità in sviluppo')" class="text-red-600 hover:text-red-800 transition-colors duration-200" title="Elimina">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        
        <h3 class="text-sm font-bold text-gray-900 mb-2 truncate" title="{{ $document['name'] }}">{{ $document['name'] }}</h3>
        
        <div class="space-y-2">
            <div class="flex items-center text-xs text-gray-600">
                <i class="fas fa-building mr-2 text-indigo-500"></i>
                <span>{{ $document['office'] }}</span>
            </div>
            
            <div class="flex items-center text-xs text-gray-600">
                <i class="fas fa-weight mr-2 text-green-500"></i>
                <span>{{ $document['size'] }}</span>
            </div>
            
            <div class="flex items-center text-xs text-gray-600">
                <i class="fas fa-calendar mr-2 text-orange-500"></i>
                <span>{{ $document['uploaded'] }}</span>
            </div>
            
            <div class="flex items-center text-xs text-gray-600">
                <i class="fas fa-link mr-2 text-purple-500"></i>
                <span>Pratica #{{ $document['entry_id'] }}</span>
            </div>
        </div>
        
        <div class="mt-4 pt-4 border-t border-gray-200">
            <button onclick="alert('Anteprima: {{ $document['name'] }}')" class="w-full bg-indigo-50 text-indigo-600 py-2 px-4 rounded-lg text-sm font-medium hover:bg-indigo-100 transition-colors duration-200">
                <i class="fas fa-eye mr-2"></i>
                Anteprima
            </button>
        </div>
    </div>
    @endforeach
</div>

<div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
    <h3 class="text-xl font-bold text-gray-900 mb-6">Statistiche Documenti</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-file text-white text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ count($documents) }}</div>
            <div class="text-sm text-gray-600">Documenti Totali</div>
        </div>
        
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-file-pdf text-white text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ count($documents) }}</div>
            <div class="text-sm text-gray-600">File PDF</div>
        </div>
        
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-hdd text-white text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-900">47.8 MB</div>
            <div class="text-sm text-gray-600">Spazio Utilizzato</div>
        </div>
        
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-calendar text-white text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-900">3</div>
            <div class="text-sm text-gray-600">Questo Mese</div>
        </div>
    </div>
</div>

<div class="mt-8 bg-white rounded-xl shadow-lg border border-gray-100 p-6">
    <h3 class="text-xl font-bold text-gray-900 mb-6">Azioni Rapide</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <button onclick="alert('Funzionalità in sviluppo')" class="p-6 bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-200 rounded-xl hover:from-indigo-100 hover:to-purple-100 transition-all duration-200">
            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-cloud-upload-alt text-white text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Upload Multiplo</h4>
            <p class="text-sm text-gray-600">Carica più documenti contemporaneamente</p>
        </button>

        <button onclick="alert('Funzionalità in sviluppo')" class="p-6 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl hover:from-green-100 hover:to-emerald-100 transition-all duration-200">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-archive text-white text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Archiviazione</h4>
            <p class="text-sm text-gray-600">Gestisci l'archivio documenti</p>
        </button>

        <button onclick="alert('Funzionalità in sviluppo')" class="p-6 bg-gradient-to-r from-orange-50 to-red-50 border border-orange-200 rounded-xl hover:from-orange-100 hover:to-red-100 transition-all duration-200">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-search text-white text-xl"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Ricerca Avanzata</h4>
            <p class="text-sm text-gray-600">Trova documenti con filtri specifici</p>
        </button>
    </div>
</div>
@endsection