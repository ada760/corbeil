<?php include __DIR__ . '/../templates/navigation.php';?>




<!-- Filtres et Recherche -->
<div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 border border-cyan-500/20 mb-8 mt-12">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <select id="type-filter" class="p-3 bg-gray-700/80 border border-gray-600/50 rounded-xl text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/30 transition-all">
                <option value="">Tous les types</option>
                <option value="MARITIME">Maritime</option>
                <option value="AERIENNE">Aérienne</option>
                <option value="ROUTIERE">Routière</option>
            </select>
            <select id="etat-filter" class="p-3 bg-gray-700/80 border border-gray-600/50 rounded-xl text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/30 transition-all">
                <option value="">Tous les états d'avancement</option>
                <option value="EN_ATTENTE">En attente</option>
                <option value="EN_COURS">En cours</option>
                <option value="ARRIVE">Arrivé</option>
            </select>
            <select id="global-filter" class="p-3 bg-gray-700/80 border border-gray-600/50 rounded-xl text-white focus:border-cyan-400 focus:outline-none focus:ring-2 focus:ring-cyan-400/30 transition-all">
                <option value="">Tous les états globaux</option>
                <option value="OUVERT">Ouvert</option>
                <option value="FERME">Fermé</option>
            </select>
        </div>

    </div>
</div>

<!-- Statistiques Rapides -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-cyan-500/20 to-cyan-600/10 border border-cyan-400/30 rounded-2xl p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-cyan-300 text-sm font-medium">Total Cargaisons</p>
                <p class="text-white text-2xl font-bold">47</p>
            </div>
            <div class="w-12 h-12 bg-cyan-500/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-boxes text-cyan-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-gradient-to-br from-gray-600/20 to-gray-700/10 border border-gray-500/30 rounded-2xl p-6">
        <div class="flex items-center justify-between">
            <div>
                <p id="cargaison-en-cours" class="text-gray-300 text-sm font-medium">Ouvertes</p>
                <p id="nombre-cargaisons" class="text-white text-2xl font-bold"></p>
            </div>
            <div class="w-12 h-12 bg-gray-500/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-unlock text-gray-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-gradient-to-br from-cyan-400/20 to-cyan-500/10 border border-cyan-400/30 rounded-2xl p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-cyan-300 text-sm font-medium">En Cours</p>
                <p class="text-white text-2xl font-bold">18</p>
            </div>
            <div class="w-12 h-12 bg-cyan-500/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-shipping-fast text-cyan-400 text-xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-gradient-to-br from-gray-500/20 to-gray-600/10 border border-gray-400/30 rounded-2xl p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-300 text-sm font-medium">Fermées</p>
                <p class="text-white text-2xl font-bold">24</p>
            </div>
            <div class="w-12 h-12 bg-gray-500/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-lock text-gray-400 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Table des Cargaisons -->
<div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-cyan-500/20 overflow-hidden shadow-2xl">
    <div class="p-6 border-b border-gray-700/50 bg-gradient-to-r from-gray-800/80 to-gray-700/50">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-white">Cargaisons Récentes</h3>
                <p class="text-gray-400 text-sm mt-1">Gestion et suivi des cargaisons</p>
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-4 py-2 bg-cyan-500/20 text-cyan-400 border border-cyan-400/30 rounded-lg hover:bg-cyan-500/30 transition-all">
                    <i class="fas fa-download mr-2"></i>Exporter
                </button>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-700/50">
                <tr>
                    <th class="text-left p-4 text-cyan-400 font-semibold border-b border-gray-600/30">
                        <div class="flex items-center space-x-2">
                            <span>Numéro</span>
                            <i class="fas fa-sort text-xs opacity-50"></i>
                        </div>
                    </th>
                    <th class="text-left p-4 text-cyan-400 font-semibold border-b border-gray-600/30">
                        <div class="flex items-center space-x-2">
                            <span>Type</span>
                            <i class="fas fa-sort text-xs opacity-50"></i>
                        </div>
                    </th>
                    <th class="text-left p-4 text-cyan-400 font-semibold border-b border-gray-600/30">Trajet</th>
                    <th class="text-left p-4 text-cyan-400 font-semibold border-b border-gray-600/30">Poids/Max</th>
                    <th class="text-left p-4 text-cyan-400 font-semibold border-b border-gray-600/30">État Avancement</th>
                    <th class="text-left p-4 text-cyan-400 font-semibold border-b border-gray-600/30">État Global</th>
                    <th class="text-center p-4 text-cyan-400 font-semibold border-b border-gray-600/30">Actions</th>
                </tr>
            </thead>
            <tbody id="cargo-table-body">
                <!-- Exemple de données -->
                <tr class="border-b border-gray-700/30 hover:bg-gray-700/30 transition-all group">
                    <td class="p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-cyan-500/20 to-cyan-600/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-ship text-cyan-400"></i>
                            </div>
                            <div>
                                <span class="text-white font-mono font-semibold">CARG-2024-001</span>
                                <p class="text-gray-400 text-xs">Créé le 10/08/2024</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-cyan-400 rounded-full"></div>
                            <span class="text-cyan-400 font-medium">Maritime</span>
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-300">Dakar</span>
                            <i class="fas fa-arrow-right text-gray-500 text-xs"></i>
                            <span class="text-gray-300">Marseille</span>
                        </div>
                        <p class="text-gray-500 text-xs">2,450 km</p>
                    </td>
                    <td class="p-4">
                        <div class="text-gray-300">
                            <span class="font-semibold">3,500</span> / 5,000 kg
                        </div>
                        <div class="w-full bg-gray-600 rounded-full h-2 mt-1">
                            <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-3 py-1 bg-gray-600/20 text-gray-300 border border-gray-500/30 rounded-full text-xs font-semibold">
                            <div class="w-2 h-2 bg-gray-400 rounded-full mr-2 animate-pulse"></div>
                            En attente
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-3 py-1 bg-cyan-500/20 text-cyan-400 border border-cyan-400/30 rounded-full text-xs font-semibold">
                            <div class="w-2 h-2 bg-cyan-400 rounded-full mr-2"></div>
                            Ouvert
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center justify-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 text-cyan-400 hover:bg-cyan-500/20 rounded-lg transition-all" title="Voir détails">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-2 text-gray-400 hover:bg-gray-500/20 rounded-lg transition-all" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-cyan-400 hover:bg-cyan-500/20 rounded-lg transition-all" title="Fermer/Ouvrir">
                                <i class="fas fa-lock-open"></i>
                            </button>
                            <button class="p-2 text-red-400 hover:bg-red-500/20 rounded-lg transition-all" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="border-b border-gray-700/30 hover:bg-gray-700/30 transition-all group">
                    <td class="p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-gray-600/20 to-gray-700/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-plane text-gray-400"></i>
                            </div>
                            <div>
                                <span class="text-white font-mono font-semibold">CARG-2024-002</span>
                                <p class="text-gray-400 text-xs">Créé le 09/08/2024</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                            <span class="text-gray-400 font-medium">Aérienne</span>
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-300">Paris</span>
                            <i class="fas fa-arrow-right text-gray-500 text-xs"></i>
                            <span class="text-gray-300">New York</span>
                        </div>
                        <p class="text-gray-500 text-xs">5,837 km</p>
                    </td>
                    <td class="p-4">
                        <div class="text-gray-300">
                            <span class="font-semibold">1,200</span> / 2,000 kg
                        </div>
                        <div class="w-full bg-gray-600 rounded-full h-2 mt-1">
                            <div class="bg-gradient-to-r from-gray-500 to-gray-600 h-2 rounded-full" style="width: 60%"></div>
                        </div>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-3 py-1 bg-cyan-500/20 text-cyan-400 border border-cyan-400/30 rounded-full text-xs font-semibold">
                            <div class="w-2 h-2 bg-cyan-400 rounded-full mr-2 animate-pulse"></div>
                            En cours
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-3 py-1 bg-gray-600/20 text-gray-400 border border-gray-500/30 rounded-full text-xs font-semibold">
                            <div class="w-2 h-2 bg-gray-400 rounded-full mr-2"></div>
                            Fermé
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center justify-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 text-cyan-400 hover:bg-cyan-500/20 rounded-lg transition-all" title="Voir détails">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-2 text-gray-400 hover:bg-gray-500/20 rounded-lg transition-all" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-gray-400 hover:bg-gray-500/20 rounded-lg transition-all" title="Rouvrir">
                                <i class="fas fa-lock"></i>
                            </button>
                            <button class="p-2 text-red-400 hover:bg-red-500/20 rounded-lg transition-all" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="border-b border-gray-700/30 hover:bg-gray-700/30 transition-all group">
                    <td class="p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-cyan-400/20 to-cyan-500/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-truck text-cyan-400"></i>
                            </div>
                            <div>
                                <span class="text-white font-mono font-semibold">CARG-2024-003</span>
                                <p class="text-gray-400 text-xs">Créé le 08/08/2024</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-cyan-400 rounded-full"></div>
                            <span class="text-cyan-400 font-medium">Routière</span>
                        </div>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-300">Casablanca</span>
                            <i class="fas fa-arrow-right text-gray-500 text-xs"></i>
                            <span class="text-gray-300">Alger</span>
                        </div>
                        <p class="text-gray-500 text-xs">1,255 km</p>
                    </td>
                    <td class="p-4">
                        <div class="text-gray-300">
                            <span class="font-semibold">8,750</span> / 10,000 kg
                        </div>
                        <div class="w-full bg-gray-600 rounded-full h-2 mt-1">
                            <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 h-2 rounded-full" style="width: 87%"></div>
                        </div>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-3 py-1 bg-cyan-600/20 text-cyan-300 border border-cyan-500/30 rounded-full text-xs font-semibold">
                            <div class="w-2 h-2 bg-cyan-300 rounded-full mr-2"></div>
                            Arrivé
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-3 py-1 bg-cyan-500/20 text-cyan-400 border border-cyan-400/30 rounded-full text-xs font-semibold">
                            <div class="w-2 h-2 bg-cyan-400 rounded-full mr-2"></div>
                            Ouvert
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center justify-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="p-2 text-cyan-400 hover:bg-cyan-500/20 rounded-lg transition-all" title="Voir détails">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-2 text-gray-400 hover:bg-gray-500/20 rounded-lg transition-all" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-cyan-400 hover:bg-cyan-500/20 rounded-lg transition-all" title="Fermer">
                                <i class="fas fa-lock-open"></i>
                            </button>
                            <button class="p-2 text-red-400 hover:bg-red-500/20 rounded-lg transition-all" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination améliorée -->
    <div class="p-6 border-t border-gray-700/50 bg-gray-800/30">
        <div class="flex items-center justify-between">
            <div class="text-gray-400 text-sm">
                Affichage de <span class="text-white font-semibold">1-10</span> sur <span class="text-white font-semibold">47</span> cargaisons
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-4 py-2 bg-gray-700/50 hover:bg-gray-600/50 rounded-lg text-white text-sm transition-all border border-gray-600/30">
                    <i class="fas fa-chevron-left mr-1"></i>Précédent
                </button>
                <button class="px-3 py-2 bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-lg text-white text-sm font-semibold shadow-lg">1</button>
                <button class="px-3 py-2 bg-gray-700/50 hover:bg-gray-600/50 rounded-lg text-white text-sm transition-all">2</button>
                <button class="px-3 py-2 bg-gray-700/50 hover:bg-gray-600/50 rounded-lg text-white text-sm transition-all">3</button>
                <span class="text-gray-500 px-2">...</span>
                <button class="px-3 py-2 bg-gray-700/50 hover:bg-gray-600/50 rounded-lg text-white text-sm transition-all">8</button>
                <button class="px-4 py-2 bg-gray-700/50 hover:bg-gray-600/50 rounded-lg text-white text-sm transition-all border border-gray-600/30">
                    Suivant<i class="fas fa-chevron-right ml-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script> 
<script type="module" src="../dist/main.js"></script>




