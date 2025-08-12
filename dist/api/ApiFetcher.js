export class ApiFetcher {
    async fetchData() {
        try {
            const response = await fetch(this.endpoint);
            if (!response.ok) {
                console.error("Réponse API non ok:", response.status, response.statusText);
                throw new Error("Erreur API");
            }
            const data = await response.json();
            console.log("Données reçues:", data);
            return data;
        }
        catch (error) {
            console.error("Erreur détaillée lors du fetch:", error);
            return [];
        }
    }
}
