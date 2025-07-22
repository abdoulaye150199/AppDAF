<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Repository\CitoyenRepository;
use App\Repository\JournalRechercheRepository;

class CitoyenController extends AbstractController
{
    private CitoyenRepository $citoyenRepository;
    private JournalRechercheRepository $journalRepository;

    public function __construct(
        CitoyenRepository $citoyenRepository,
        JournalRechercheRepository $journalRepository
    ) {
        $this->citoyenRepository = $citoyenRepository;
        $this->journalRepository = $journalRepository;
    }

    public function getCitoyen(string $nci): void
    {
        try {
            $citoyen = $this->citoyenRepository->findByNci($nci);
            
            if (!$citoyen) {
                $this->renderError("Le numéro de carte d'identité non retrouvé");
                return;
            }

            // Log the search
            $journal = new \App\Models\JournalRecherche(
                date('Y-m-d'),
                date('H:i:s'),
                'Location', // You might want to get this from request
                $_SERVER['REMOTE_ADDR'],
                $nci,
                $citoyen ? 'Success' : 'Échec'
            );
            $this->journalRepository->save($journal);

            $this->renderJson($citoyen->toArray());
        } catch (\Exception $e) {
            $this->renderError($e->getMessage(), 500);
        }
    }
}