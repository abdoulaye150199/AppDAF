<?php

use App\Core\Database;

class DatabaseSeeder
{
    private $database;

    public function __construct()
    {
        try {
            $this->database = Database::getInstance();
            echo "Connexion à la base de données établie\n";
        } catch (\Exception $e) {
            echo "Erreur de connexion : " . $e->getMessage() . "\n";
            exit(1);
        }
    }

    public function run(): void
    {
        echo "Démarrage du seeding...\n";
        $this->seedCitoyens();
        $this->seedJournalRecherches();
        echo "Seeding terminé!\n";
    }

    private function seedCitoyens(): void
    {
        $citoyens = [
            [
                'nci' => '1234567890123',
                'nom' => 'DIALLO',
                'prenom' => 'Abdoulaye', 
                'date_naissance' => '1990-01-15',
                'lieu_naissance' => 'Dakar',
                'url_copie_cni' => 'https://storage.cloud.example.com/cni/1234567890123.jpg'
            ],
            [
                'nci' => '9876543210987',
                'nom' => 'SOW',
                'prenom' => 'Fatou',
                'date_naissance' => '1995-06-20',
                'lieu_naissance' => 'Saint-Louis',
                'url_copie_cni' => 'https://storage.cloud.example.com/cni/9876543210987.jpg'
            ]
        ];

        $sql = "INSERT INTO citoyens (nci, nom, prenom, date_naissance, lieu_naissance, url_copie_cni) 
                VALUES (:nci, :nom, :prenom, :date_naissance, :lieu_naissance, :url_copie_cni)";
        
        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            foreach ($citoyens as $citoyen) {
                $stmt->execute($citoyen);
            }
            echo "Données insérées dans la table citoyens avec succès\n";
        } catch (\PDOException $e) {
            echo "Erreur lors de l'insertion des données citoyens: " . $e->getMessage() . "\n";
        }
    }

    private function seedJournalRecherches(): void
    {
        $recherches = [
            [
                'date' => date('Y-m-d'),
                'heure' => date('H:i:s'),
                'localisation' => 'Dakar, Sénégal',
                'adresse_ip' => '192.168.1.1',
                'nci_recherche' => '1234567890123',
                'statut' => 'Success'
            ],
            [
                'date' => date('Y-m-d'),
                'heure' => date('H:i:s', strtotime('-1 hour')),
                'localisation' => 'Thiès, Sénégal',
                'adresse_ip' => '192.168.1.2',
                'nci_recherche' => '9876543210987',
                'statut' => 'Success'
            ]
        ];

        $sql = "INSERT INTO journal_recherches (date, heure, localisation, adresse_ip, nci_recherche, statut) 
                VALUES (:date, :heure, :localisation, :adresse_ip, :nci_recherche, :statut)";
        
        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            foreach ($recherches as $recherche) {
                $stmt->execute($recherche);
            }
            echo "Données insérées dans la table journal_recherches avec succès\n";
        } catch (\PDOException $e) {
            echo "Erreur lors de l'insertion des données journal: " . $e->getMessage() . "\n";
        }
    }
}