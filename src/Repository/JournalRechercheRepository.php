<?php

namespace App\Repository;

use App\Core\Database;
use App\Models\JournalRecherche;

class JournalRechercheRepository
{
    private $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function save(JournalRecherche $journal): void
    {
        $sql = "INSERT INTO journal_recherches (date, heure, localisation, adresse_ip, nci_recherche, statut) 
                VALUES (:date, :heure, :localisation, :adresse_ip, :nci_recherche, :statut)";

        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            $stmt->execute([
                'date' => $journal->getDate(),
                'heure' => $journal->getHeure(),
                'localisation' => $journal->getLocalisation(),
                'adresse_ip' => $journal->getAdresseIp(),
                'nci_recherche' => $journal->getNciRecherche(),
                'statut' => $journal->getStatut()
            ]);
        } catch (\PDOException $e) {
            throw new \RuntimeException("Erreur lors de l'enregistrement du journal: " . $e->getMessage());
        }
    }

    public function findByNci(string $nci): array
    {
        $sql = "SELECT * FROM journal_recherches WHERE nci_recherche = :nci ORDER BY date DESC, heure DESC";
        
        try {
            $stmt = $this->database->getPdo()->prepare($sql);
            $stmt->execute(['nci' => $nci]);
            
            $journals = [];
            while ($row = $stmt->fetch()) {
                $journal = new JournalRecherche(
                    $row['date'],
                    $row['heure'],
                    $row['localisation'],
                    $row['adresse_ip'],
                    $row['nci_recherche'],
                    $row['statut']
                );
                $journals[] = $journal;
            }
            
            return $journals;
        } catch (\PDOException $e) {
            throw new \RuntimeException("Erreur lors de la recherche des journaux: " . $e->getMessage());
        }
    }
}