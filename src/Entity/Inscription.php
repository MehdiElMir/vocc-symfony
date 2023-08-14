<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_et_prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $fonction = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $reseaux_sociaux = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $code_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255)]
    private ?string $formation = null;

    #[ORM\Column]
    private ?int $jour = null;

    #[ORM\Column(length: 255)]
    private ?string $mois = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_et_nom1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom_et_nom2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom_et_nom3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtPrenom(): ?string
    {
        return $this->nom_et_prenom;
    }

    public function setNomEtPrenom(string $nom_et_prenom): static
    {
        $this->nom_et_prenom = $nom_et_prenom;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): static
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getReseauxSociaux(): ?string
    {
        return $this->reseaux_sociaux;
    }

    public function setReseauxSociaux(string $reseaux_sociaux): static
    {
        $this->reseaux_sociaux = $reseaux_sociaux;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(string $formation): static
    {
        $this->formation = $formation;

        return $this;
    }

    public function getJour(): ?int
    {
        return $this->jour;
    }

    public function setJour(int $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): static
    {
        $this->mois = $mois;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getPrenomEtNom1(): ?string
    {
        return $this->prenom_et_nom1;
    }

    public function setPrenomEtNom1(string $prenom_et_nom1): static
    {
        $this->prenom_et_nom1 = $prenom_et_nom1;

        return $this;
    }

    public function getPrenomEtNom2(): ?string
    {
        return $this->prenom_et_nom2;
    }

    public function setPrenomEtNom2(?string $prenom_et_nom2): static
    {
        $this->prenom_et_nom2 = $prenom_et_nom2;

        return $this;
    }

    public function getPrenomEtNom3(): ?string
    {
        return $this->prenom_et_nom3;
    }

    public function setPrenomEtNom3(?string $prenom_et_nom3): static
    {
        $this->prenom_et_nom3 = $prenom_et_nom3;

        return $this;
    }
}
