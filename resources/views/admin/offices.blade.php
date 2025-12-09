@extends('layouts.admin')

@section('page-title', 'Gestione Uffici')
@section('page-description', 'Visualizza e gestisci tutti gli uffici dell\'ente')

@section('content')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
    <div class="flex-1">
        <div class="relative">
            <input type="text" placeholder="Cerca uffici..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
        </div>
    </div>
    <div class="mt-4 lg:mt-0 lg:ml-6">
        <button onclick="alert('Funzionalità in sviluppo')" class="btn-primary px-6 py-2 rounded-lg text-white font-semibold inline-flex items-center transition-all duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-plus mr-2"></i>
            Nuovo Ufficio
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($offices as $office)
    <div class="card-hover bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-building text-white text-lg"></i>
            </div>
            <div class="flex space-x-2">
                <button onclick="alert('Funzionalità in sviluppo')" class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200" title="Modifica">
                    <i class="fas fa-edit"></i>
                </button>
                <button onclick="if(confirmDelete()) alert('Funzionalità in sviluppo')" class="text-red-600 hover:text-red-800 transition-colors duration-200" title="Elimina">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        
        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $office['name'] }}</h3>
        
        <div class="space-y-3">
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-user-tie mr-2 text-indigo-500"></i>
                <span><strong>Responsabile:</strong> {{ $office['manager'] }}</span>
            </div>
            
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-users mr-2 text-green-500"></i>
                <span><strong>Dipendenti:</strong> {{ $office['employees'] }}</span>
            </div>
            
            <div class="flex items-center text-sm text-gray-600">
                <i class="fas fa-euro-sign mr-2 text-orange-500"></i>
                <span><strong>Budget:</strong> {{ $office['budget'] }}</span>
            </div>
        </div>
        
        <div class="mt-6 pt-4 border-t border-gray-200">
            <div class="flex space-x-2">
                <button onclick="alert('Funzionalità in sviluppo')" class="flex-1 bg-indigo-50 text-indigo-600 py-2 px-4 rounded-lg text-sm font-medium hover:bg-indigo-100 transition-colors duration-200">
                    <i class="fas fa-eye mr-2"></i>
                    Dettagli
                </button>
                <button onclick="alert('Funzionalità in sviluppo')" class="flex-1 bg-green-50 text-green-600 py-2 px-4 rounded-lg text-sm font-medium hover:bg-green-100 transition-colors duration-200">
                    <i class="fas fa-chart-line mr-2"></i>
                    Report
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-8 bg-white rounded-xl shadow-lg border border-gray-100 p-6">
    <h3 class="text-xl font-bold text-gray-900 mb-6">Statistiche Uffici</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-building text-white text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ count($offices) }}</div>
            <div class="text-sm text-gray-600">Uffici Totali</div>
        </div>
        
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-users text-white text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-900">{{ array_sum(array_column($offices, 'employees')) }}</div>
            <div class="text-sm text-gray-600">Dipendenti Totali</div>
        </div>
        
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-euro-sign text-white text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-900">€1.6M</div>
            <div class="text-sm text-gray-600">Budget Totale</div>
        </div>
        
        <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-chart-line text-white text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-gray-900">95%</div>
            <div class="text-sm text-gray-600">Efficienza Media</div>
        </div>
    </div>
</div>
@endsection