@extends('layouts.admin')

@section('page-title', 'Report e Statistiche')
@section('page-description', 'Analisi dettagliate e report del sistema')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Trend Mensile Pratiche</h3>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                    <option>Ultimi 6 mesi</option>
                    <option>Anno corrente</option>
                    <option>Anno precedente</option>
                </select>
            </div>
            <div style="width: 100%; height: 400px;">
                <canvas id="monthlyTrendChart" width="600" height="400"></canvas>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">KPI Principali</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-sm"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Pratiche Totali</span>
                    </div>
                    <span class="text-lg font-bold text-blue-600">311</span>
                </div>

                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Completate</span>
                    </div>
                    <span class="text-lg font-bold text-green-600">267</span>
                </div>

                <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-white text-sm"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900">In Lavorazione</span>
                    </div>
                    <span class="text-lg font-bold text-yellow-600">44</span>
                </div>

                <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Scadute</span>
                    </div>
                    <span class="text-lg font-bold text-red-600">7</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Efficienza Uffici</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Uff. Tecnico</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-20 bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 95%"></div>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">95%</span>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Uff. Amministrativo</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-20 bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 88%"></div>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">88%</span>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Uff. Urbanistica</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-20 bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 76%"></div>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">76%</span>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Uff. Ragioneria</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-20 bg-gray-200 rounded-full h-2">
                            <div class="bg-indigo-500 h-2 rounded-full" style="width: 92%"></div>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">92%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Distribuzione per Ufficio</h3>
        <div style="width: 100%; height: 300px;">
            <canvas id="officeDistributionChart" width="400" height="300"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Budget vs Spesa</h3>
        <div style="width: 100%; height: 300px;">
            <canvas id="budgetChart" width="400" height="300"></canvas>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-bold text-gray-900">Report Personalizzati</h3>
        <button onclick="alert('Funzionalità in sviluppo')" class="btn-primary px-6 py-2 rounded-lg text-white font-semibold inline-flex items-center transition-all duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-plus mr-2"></i>
            Nuovo Report
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 border border-gray-200 rounded-xl hover:border-indigo-300 transition-colors duration-200 cursor-pointer" onclick="alert('Generazione report in corso...')">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-chart-line text-white text-lg"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Report Mensile</h4>
            <p class="text-sm text-gray-600 mb-4">Analisi completa delle attività mensili</p>
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-calendar mr-2"></i>
                Ultimo aggiornamento: Oggi
            </div>
        </div>

        <div class="p-6 border border-gray-200 rounded-xl hover:border-indigo-300 transition-colors duration-200 cursor-pointer" onclick="alert('Generazione report in corso...')">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-euro-sign text-white text-lg"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Report Finanziario</h4>
            <p class="text-sm text-gray-600 mb-4">Analisi delle spese e budget</p>
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-calendar mr-2"></i>
                Ultimo aggiornamento: Ieri
            </div>
        </div>

        <div class="p-6 border border-gray-200 rounded-xl hover:border-indigo-300 transition-colors duration-200 cursor-pointer" onclick="alert('Generazione report in corso...')">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-users text-white text-lg"></i>
            </div>
            <h4 class="font-semibold text-gray-900 mb-2">Report Produttività</h4>
            <p class="text-sm text-gray-600 mb-4">Performance degli uffici e utenti</p>
            <div class="flex items-center text-sm text-gray-500">
                <i class="fas fa-calendar mr-2"></i>
                Ultimo aggiornamento: 2 giorni fa
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Monthly Trend Chart
    const monthlyCtx = document.getElementById('monthlyTrendChart').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno'],
            datasets: [{
                label: 'Pratiche',
                data: [67, 54, 71, 63, 58, 45],
                borderColor: 'rgb(99, 102, 241)',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Budget (migliaia €)',
                data: [245, 198, 287, 234, 211, 189],
                borderColor: 'rgb(16, 185, 129)',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Office Distribution Chart
    const officeCtx = document.getElementById('officeDistributionChart').getContext('2d');
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

    // Budget Chart
    const budgetCtx = document.getElementById('budgetChart').getContext('2d');
    new Chart(budgetCtx, {
        type: 'bar',
        data: {
            labels: ['Uff. Tecnico', 'Uff. Amministrativo', 'Uff. Urbanistica', 'Uff. Ragioneria'],
            datasets: [{
                label: 'Budget Assegnato',
                data: [500000, 300000, 400000, 250000],
                backgroundColor: 'rgba(99, 102, 241, 0.8)'
            }, {
                label: 'Spesa Effettiva',
                data: [450000, 280000, 380000, 230000],
                backgroundColor: 'rgba(16, 185, 129, 0.8)'
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '€' + (value / 1000) + 'k';
                        }
                    }
                }
            }
        }
    });
});
</script>
@endsection