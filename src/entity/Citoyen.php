<?php

namespace App\Models;

class Citoyen
{
    private int $id;
    private string $nci;
    private string $nom;
    private string $prenom;
    private string $dateNaissance;
    private string $lieuNaissance;
    private string $urlCopieCni;

    public function __construct(
        ?string $nci = null,
        ?string $nom = null,
        ?string $prenom = null,
        ?string $dateNaissance = null,
        ?string $lieuNaissance = null,
        ?string $urlCopieCni = null
    ) {
        $this->nci = $nci ?? '';
        $this->nom = $nom ?? '';
        $this->prenom = $prenom ?? '';
        $this->dateNaissance = $dateNaissance ?? '';
        $this->lieuNaissance = $lieuNaissance ?? '';
        $this->urlCopieCni = $urlCopieCni ?? '';
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

    public function getNci()
    {
        return $this->nci;
    }

    public function setNci($nci)
    {
        $this->nci = $nci;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getUrlCopieCni()
    {
        return $this->urlCopieCni;
    }

    public function setUrlCopieCni($urlCopieCni)
    {
        $this->urlCopieCni = $urlCopieCni;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'nci' => $this->nci,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_naissance' => $this->dateNaissance,
            'lieu_naissance' => $this->lieuNaissance,
            'url_copie_cni' => $this->urlCopieCni
        ];
    }
}