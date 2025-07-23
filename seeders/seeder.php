<?php

use App\Core\Database;
use Cloudinary\Cloudinary;

class DatabaseSeeder
{
    private $database;
    private Cloudinary $cloudinary;

    public function __construct()
    {

    $this->cloudinary = new Cloudinary([
      'cloud' => [
        'cloud_name' => CLOUD_NAME,
        'api_key'    => PUBLIC_KEY,
        'api_secret' => PRIVATE_KEY
      ]
    ]);


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
        $uploadPath = __DIR__ . '/../public/images/upload/';

        $citoyens = [
            [
                'nci' => '1234567890123',
                'nom' => 'DIALLO',
                'prenom' => 'Abdoulaye', 
                'date_naissance' => '1990-01-15',
                'lieu_naissance' => 'Dakar',
                'url_copie_cni' => 'cni1.png'
            ]
        ];

        $sql = "INSERT INTO citoyens (nci, nom, prenom, date_naissance, lieu_naissance, url_copie_cni) 
                VALUES (:nci, :nom, :prenom, :date_naissance, :lieu_naissance, :url_copie_cni)";

        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            foreach ($citoyens as $citoyen) {
                $filename = $citoyen['url_copie_cni']; // Change here: use associative key
                $localPath = $uploadPath . $filename;
                
                if ($filename && file_exists($localPath)) {
                    $upload = $this->cloudinary->uploadApi()->upload($localPath, [
                        'folder' => 'appdaf/cni'
                    ]);
                    $citoyen['url_copie_cni'] = $upload['secure_url']; //     Change here: use associative key
                } else {
                    if ($filename) {
                        echo "❌ Image introuvable : $filename\n";
                    }
                    $citoyen['url_copie_cni'] = null; // Change here: use associative key
                }

                $stmt->execute($citoyen);
                echo "✅ Citoyen inséré : {$citoyen['nom']} {$citoyen['prenom']}\n";
            }
            echo "✅ Données insérées dans la table citoyens avec succès\n";
        } catch (\PDOException $e) {
            echo "❌ Erreur lors de l'insertion des données citoyens: " . $e->getMessage() . "\n";
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