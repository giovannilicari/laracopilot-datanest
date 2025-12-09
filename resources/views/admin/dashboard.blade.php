@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('page-description', 'Panoramica generale del sistema')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
    <div class="card-hover bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium">Pratiche Totali</p>
                <p class="text-2xl font-bold">{{ $stats['total_entries'] }}</p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-file-alt text-xl"></i>
            </div>
        </div>
    </div>

    <div class="card-hover bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm font-medium">In Attesa</p>
                <p class="text-2xl font-bold">{{ $stats['pending_entries'] }}</p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-clock text-xl"></i>
            </div>
        </div>
    </div>

    <div class="card-hover bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm font-medium">Uffici Attivi</p>
                <p class="text-2xl font-bold">{{ $stats['total_offices'] }}</p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-building text-xl"></i>
            </div>
        </div>
    </div>

    <div class="card-hover bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium">Utenti Attivi</p>
                <p class="text-2xl font-bold">{{ $stats['active_users'] }}</p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-xl"></i>
            </div>
        </div>
    </div>

    <div class="card-hover bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-indigo-100 text-sm font-medium">Budget Totale</p>
                <p class="text-2xl font-bold">{{ $stats['total_budget'] }}</p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-euro-sign text-xl"></i>
            </div>
        </div>
    </div>

    <div class="card-hover bg-gradient-to-r from-teal-500 to-teal-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-teal-100 text-sm font-medium">Questo Mese</p>
                <p class="text-2xl font-bold">{{ $stats['monthly_entries'] }}</p>
            </div>
            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-chart-line text-xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Entries -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-900">Pratiche Recenti</h3>
            <a href="{{ route('admin.entries') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                Vedi tutte <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <div class="space-y-4">
            @foreach($recentEntries as $entry)
            <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-file-alt text-white text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ $entry['oggetto'] }}</p>
                    <p class="text-sm text-gray-500">{{ $entry['office'] }} • {{ $entry['date'] }}</p>
                </div>
                <div class="text-sm font-semibold text-green-600">{{ $entry['spesa'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Azioni Rapide</h3>
        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('admin.entries.create') }}" class="group p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200 hover:from-blue-100 hover:to-indigo-100 transition-all duration-200">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-plus text-white"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-1">Nuova Pratica</h4>
                <p class="text-sm text-gray-600">Crea una nuova pratica</p>
            </a>

            <a href="{{ route('admin.users') }}" class="group p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200 hover:from-green-100 hover:to-emerald-100 transition-all duration-200">
                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-user-plus text-white"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-1">Gestione Utenti</h4>
                <p class="text-sm text-gray-600">Amministra utenti</p>
            </a>

            <a href="{{ route('admin.reports') }}" class="group p-4 bg-gradient-to-r from-purple-50 to-violet-50 rounded-lg border border-purple-200 hover:from-purple-100 hover:to-violet-100 transition-all duration-200">
                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-violet-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-chart-bar text-white"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-1">Report</h4>
                <p class="text-sm text-gray-600">Visualizza statistiche</p>
            </a>

            <a href="{{ route('admin.settings') }}" class="group p-4 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg border border-orange-200 hover:from-orange-100 hover:to-red-100 transition-all duration-200">
                <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-200">
                    <i class="fas fa-cog text-white"></i>
                </div>
                <h4 class="font-semibold text-gray-900 mb-1">Impostazioni</h4>
                <p class="text-sm text-gray-600">Configura sistema</p>
            </a>
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Pratiche per Mese</h3>
        <div style="width: 100%; height: 300px;">
            <canvas id="monthlyChart" width="400" height="300"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Distribuzione per Ufficio</h3>
        <div style="width: 100%; height: 300px;">
            <canvas id="officeChart" width="400" height="300"></canvas>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Monthly Chart
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu'],
            datasets: [{
                label: 'Pratiche',
                data: [67, 54, 71, 63, 58, 45],
                borderColor: 'rgb(99, 102, 241)',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Office Chart
    const officeCtx = document.getElementById('officeChart').getContext('2d');
    new Chart(officeCtx, {
        type: 'doughnut',
        data: {
            labels: ['Uff. Tecnico', 'Uff. Amministrativo', 'Uff. Urbanistica', 'Uff. Ragioneria', 'Altri'],
            datasets: [{
                data: [89, 76, 45, 67, 34],
                backgroundColor: [
                    'rgb(59, 130, 246)',
                    'rgb(16, 185, 129)',
                    'rgb(245, 158, 11)',
                    'rgb(139, 92, 246)',
                    'rgb(239, 68, 68)'
                ]
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endsection