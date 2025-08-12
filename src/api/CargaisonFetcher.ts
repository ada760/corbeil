import { ApiFetcher } from "./ApiFetcher";

// On définit une interface minimale pour le JSON
interface CargaisonJSON {
    etatGlobal: string;
}

export class CargaisonFetcher extends ApiFetcher<CargaisonJSON> {
    protected endpoint = "http://localhost:3000/cargaisons";

    async getOuverte(): Promise<CargaisonJSON[]> {
        const recupAll = await this.fetchData();
        return recupAll.filter(c => c.etatGlobal === "OUVERT");
    }
}




