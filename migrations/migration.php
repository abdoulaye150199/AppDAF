<?php

use App\Core\Database;

class CreateTables
{
    private $database;

    public function __construct()
    {
        try {
            $this->database = Database::getInstance();
            echo "Connexion à la base de données établie\n";
        } catch (\Exception $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage() . "\n";
            exit(1);
        }
    }

    public function up(): void
    {
        echo "Démarrage des migrations...\n";
        
        try {
            $this->createCitoyenTable();
            $this->createJournalRechercheTable();
            
            echo "Toutes les migrations ont été exécutées avec succès\n";
        } catch (\Exception $e) {
            echo "Erreur lors des migrations : " . $e->getMessage() . "\n";
            exit(1);
        }
    }

    private function createCitoyenTable(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS citoyens (
            id SERIAL PRIMARY KEY,
            nci VARCHAR(20) UNIQUE NOT NULL,
            nom VARCHAR(100) NOT NULL,
            prenom VARCHAR(100) NOT NULL,
            date_naissance DATE NOT NULL,
            lieu_naissance VARCHAR(100) NOT NULL,
            url_copie_cni TEXT NOT NULL
        )";

        try {
            $this->database->getPdo()->exec($sql);
            echo "Table citoyens créée avec succès\n";
        } catch (\PDOException $e) {
            echo "Erreur lors de la création de la table citoyens: " . $e->getMessage() . "\n";
        }
    }

    private function createJournalRechercheTable(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS journal_recherches (
            id SERIAL PRIMARY KEY,
            date TIMESTAMP NOT NULL,
            heure TIME NOT NULL,
            localisation TEXT NOT NULL,
            adresse_ip VARCHAR(45) NOT NULL,
            nci_recherche VARCHAR(20) NOT NULL,
            statut VARCHAR(10) CHECK (statut IN ('Success', 'Échec'))
        )";

        try {
            $this->database->getPdo()->exec($sql);
            echo "Table journal_recherches créée avec succès\n";
        } catch (\PDOException $e) {
            echo "Erreur lors de la création de la table journal_recherches: " . $e->getMessage() . "\n";
        }
    }

    public function down(): void
    {
        $this->database->getPdo()->exec("DROP TABLE IF EXISTS journal_recherches");
        $this->database->getPdo()->exec("DROP TABLE IF EXISTS citoyens");
        echo "Tables supprimées avec succès\n";
    }
}