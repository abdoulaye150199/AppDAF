<?php

namespace App\Models;

class JournalRecherche
{
    private int $id;
    private string $date;
    private string $heure;
    private string $localisation;
    private string $adresseIp;
    private string $nciRecherche;
    private string $statut;

      public function __construct(
        ?string $date = null,
        ?string $heure = null,
        ?string $localisation = null,
        ?string $adresseIp = null,
        ?string $nciRecherche = null,
        ?string $statut = null
    ) {
        $this->date = $date ?? date('Y-m-d');
        $this->heure = $heure ?? date('H:i:s');
        $this->localisation = $localisation ?? '';
        $this->adresseIp = $adresseIp ?? '';
        $this->nciRecherche = $nciRecherche ?? '';
        $this->statut = $statut ?? 'Success';
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
    public function getHeure()
    {
        return $this->heure;
    }

    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    public function getLocalisation()
    {
        return $this->localisation;
    }

    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getAdresseIp()
    {
        return $this->adresseIp;
    }

    public function setAdresseIp($adresseIp)
    {
        $this->adresseIp = $adresseIp;

        return $this;
    }

    public function getNciRecherche()
    {
        return $this->nciRecherche;
    }

    public function setNciRecherche($nciRecherche)
    {
        $this->nciRecherche = $nciRecherche;

        return $this;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }
}