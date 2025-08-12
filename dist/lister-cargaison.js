import { CargaisonFetcher } from "./api/CargaisonFetcher";
document.addEventListener("DOMContentLoaded", async () => {
    console.log("Script lister-cargaison chargé");
    const fetcher = new CargaisonFetcher();
    try {
        console.log("Début récupération cargaisons pour la liste");
        const cargaisonsOuvertes = await fetcher.getOuverte();
        console.log("Cargaisons ouvertes récupérées:", cargaisonsOuvertes);
        // Mettre à jour le compteur dans les statistiques
        const nbrCargaisonsEl = document.querySelector("#nombre-cargaisons");
        if (nbrCargaisonsEl) {
            nbrCargaisonsEl.textContent = cargaisonsOuvertes.length.toString();
            console.log("Nombre de cargaisons ouvertes affiché:", cargaisonsOuvertes.length);
        }
        else {
            console.error("Élément #nombre-cargaisons non trouvé");
        }
        // Optionnel : Remplir le tableau avec les vraies données
        await remplirTableauCargaisons(cargaisonsOuvertes);
    }
    catch (error) {
        console.error("Erreur lors de la récupération des cargaisons:", error);
        // Afficher un message d'erreur à l'utilisateur
        const nbrCargaisonsEl = document.querySelector("#nombre-cargaisons");
        if (nbrCargaisonsEl) {
            nbrCargaisonsEl.textContent = "Erreur";
            nbrCargaisonsEl.style.color = "#ef4444";
        }
    }
});
// Fonction pour remplir le tableau avec les vraies données
async function remplirTableauCargaisons(cargaisons) {
    const tableBody = document.querySelector("#cargo-table-body");
    if (!tableBody) {
        console.error("Corps du tableau non trouvé");
        return;
    }
    // Vider le tableau existant
    tableBody.innerHTML = "";
    if (cargaisons.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="7" class="p-8 text-center text-gray-400">
                    <i class="fas fa-inbox text-4xl mb-4 opacity-50"></i>
                    <p>Aucune cargaison trouvée</p>
                </td>
            </tr>
        `;
        return;
    }
    // Remplir avec les vraies données
    cargaisons.forEach(cargaison => {
        const row = creerLigneCargaison(cargaison);
        tableBody.appendChild(row);
    });
}
// Fonction pour créer une ligne de tableau pour une cargaison
function creerLigneCargaison(cargaison) {
    const tr = document.createElement("tr");
    tr.className = "border-b border-gray-700/30 hover:bg-gray-700/30 transition-all group";
    // Déterminer l'icône et la couleur selon le type
    let typeIcon = "fas fa-box";
    let typeColor = "gray";
    switch (cargaison.type) {
        case "MARITIME":
            typeIcon = "fas fa-ship";
            typeColor = "cyan";
            break;
        case "AERIEN":
            typeIcon = "fas fa-plane";
            typeColor = "blue";
            break;
        case "ROUTIER":
            typeIcon = "fas fa-truck";
            typeColor = "green";
            break;
    }
    // Déterminer les couleurs des états
    const etatAvancementClass = getEtatAvancementClass(cargaison.etatAvancement);
    const etatGlobalClass = getEtatGlobalClass(cargaison.etatGlobal);
    tr.innerHTML = `
        <td class="p-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-${typeColor}-500/20 to-${typeColor}-600/20 rounded-lg flex items-center justify-center">
                    <i class="${typeIcon} text-${typeColor}-400"></i>
                </div>
                <div>
                    <span class="text-white font-mono font-semibold">${cargaison.numero}</span>
                    <p class="text-gray-400 text-xs">ID: ${cargaison.id}</p>
                </div>
            </div>
        </td>
        <td class="p-4">
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-${typeColor}-400 rounded-full"></div>
                <span class="text-${typeColor}-400 font-medium">${cargaison.type}</span>
            </div>
        </td>
        <td class="p-4">
            <div class="flex items-center space-x-2">
                <span class="text-gray-300">${cargaison.lieuDepart?.nom || 'Non défini'}</span>
                <i class="fas fa-arrow-right text-gray-500 text-xs"></i>
                <span class="text-gray-300">${cargaison.lieuArrivee?.nom || 'Non défini'}</span>
            </div>
            <p class="text-gray-500 text-xs">${cargaison.distance || 0} km</p>
        </td>
        <td class="p-4">
            <div class="text-gray-300">
                <span class="font-semibold">0</span> / ${cargaison.poidsMax || 0} kg
            </div>
            <div class="w-full bg-gray-600 rounded-full h-2 mt-1">
                <div class="bg-gradient-to-r from-${typeColor}-500 to-${typeColor}-600 h-2 rounded-full" style="width: 0%"></div>
            </div>
        </td>
        <td class="p-4">
            <span class="inline-flex items-center px-3 py-1 ${etatAvancementClass.bg} ${etatAvancementClass.text} ${etatAvancementClass.border} rounded-full text-xs font-semibold">
                <div class="w-2 h-2 ${etatAvancementClass.dot} rounded-full mr-2 ${etatAvancementClass.animate}"></div>
                ${getEtatAvancementText(cargaison.etatAvancement)}
            </span>
        </td>
        <td class="p-4">
            <span class="inline-flex items-center px-3 py-1 ${etatGlobalClass.bg} ${etatGlobalClass.text} ${etatGlobalClass.border} rounded-full text-xs font-semibold">
                <div class="w-2 h-2 ${etatGlobalClass.dot} rounded-full mr-2"></div>
                ${getEtatGlobalText(cargaison.etatGlobal)}
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
                <button class="p-2 text-cyan-400 hover:bg-cyan-500/20 rounded-lg transition-all" title="${cargaison.etatGlobal === 'OUVERT' ? 'Fermer' : 'Ouvrir'}">
                    <i class="fas fa-${cargaison.etatGlobal === 'OUVERT' ? 'lock-open' : 'lock'}"></i>
                </button>
                <button class="p-2 text-red-400 hover:bg-red-500/20 rounded-lg transition-all" title="Supprimer">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </td>
    `;
    return tr;
}
// Fonctions utilitaires pour les classes CSS des états
function getEtatAvancementClass(etat) {
    switch (etat) {
        case "EN_ATTENTE":
            return {
                bg: "bg-gray-600/20",
                text: "text-gray-300",
                border: "border-gray-500/30",
                dot: "bg-gray-400",
                animate: "animate-pulse"
            };
        case "EN_COURS":
            return {
                bg: "bg-cyan-500/20",
                text: "text-cyan-400",
                border: "border-cyan-400/30",
                dot: "bg-cyan-400",
                animate: "animate-pulse"
            };
        case "ARRIVE":
            return {
                bg: "bg-green-600/20",
                text: "text-green-300",
                border: "border-green-500/30",
                dot: "bg-green-300",
                animate: ""
            };
        default:
            return {
                bg: "bg-gray-600/20",
                text: "text-gray-300",
                border: "border-gray-500/30",
                dot: "bg-gray-400",
                animate: ""
            };
    }
}
function getEtatGlobalClass(etat) {
    switch (etat) {
        case "OUVERT":
            return {
                bg: "bg-cyan-500/20",
                text: "text-cyan-400",
                border: "border-cyan-400/30",
                dot: "bg-cyan-400"
            };
        case "FERME":
            return {
                bg: "bg-gray-600/20",
                text: "text-gray-400",
                border: "border-gray-500/30",
                dot: "bg-gray-400"
            };
        default:
            return {
                bg: "bg-gray-600/20",
                text: "text-gray-400",
                border: "border-gray-500/30",
                dot: "bg-gray-400"
            };
    }
}
function getEtatAvancementText(etat) {
    switch (etat) {
        case "EN_ATTENTE": return "En attente";
        case "EN_COURS": return "En cours";
        case "ARRIVE": return "Arrivé";
        default: return etat;
    }
}
function getEtatGlobalText(etat) {
    switch (etat) {
        case "OUVERT": return "Ouvert";
        case "FERME": return "Fermé";
        default: return etat;
    }
}
