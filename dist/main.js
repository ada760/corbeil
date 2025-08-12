import { CargaisonFetcher } from "./api/CargaisonFetcher";
document.addEventListener("DOMContentLoaded", async () => {
    const fetcher = new CargaisonFetcher();
    try {
        console.log("Début récupération cargaisons");
        const cargaisonsOuvertes = await fetcher.getOuverte();
        console.log("Cargaisons récupérées:", cargaisonsOuvertes);
        const nbrCargaisonsEl = document.querySelector("#nombre-cargaisons");
        if (nbrCargaisonsEl) {
            nbrCargaisonsEl.textContent = cargaisonsOuvertes.length.toString();
        }
    }
    catch (error) {
        console.error("Erreur:", error);
    }
});
