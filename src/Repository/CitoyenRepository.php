<?php

namespace App\Repository;

use App\Core\Database;
use App\Models\Citoyen;

class CitoyenRepository
{
    private $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function findByNci(string $nci): ?Citoyen
    {
        $sql = "SELECT * FROM citoyens WHERE nci = :nci";
        
        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            $stmt->execute(['nci' => $nci]);
            
            if ($row = $stmt->fetch()) {
                return new Citoyen(
                    $row['nci'],
                    $row['nom'],
                    $row['prenom'],
                    $row['date_naissance'],
                    $row['lieu_naissance'],
                    $row['url_copie_cni']
                );
            }
            
            return null;
        } catch (\PDOException $e) {
            throw new \RuntimeException("Erreur lors de la recherche du citoyen: " . $e->getMessage());
        }
    }

    public function save(Citoyen $citoyen): void
    {
        $sql = "INSERT INTO citoyens (nci, nom, prenom, date_naissance, lieu_naissance, url_copie_cni) 
                VALUES (:nci, :nom, :prenom, :date_naissance, :lieu_naissance, :url_copie_cni)";

        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            $stmt->execute($citoyen->toArray());
        } catch (\PDOException $e) {
            throw new \RuntimeException("Erreur lors de l'enregistrement du citoyen: " . $e->getMessage());
        }
    }
}