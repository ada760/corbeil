import { ApiFetcher } from "./ApiFetcher";
export class CargaisonFetcher extends ApiFetcher {
    constructor() {
        super(...arguments);
        this.endpoint = "http://localhost:3000/cargaisons";
    }
    async getOuverte() {
        const recupAll = await this.fetchData();
        return recupAll.filter(c => c.etatGlobal === "OUVERT");
    }
}
