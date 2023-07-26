<?php

namespace App\Entity;

use App\Repository\DomainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomainRepository::class)]
class Domain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'domain', targetEntity: DomainTemplate::class)]
    private Collection $domainTemplates;

    #[ORM\ManyToOne(inversedBy: 'domains')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $id_user = null;

    public function __construct()
    {
        $this->domainTemplates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, DomainTemplate>
     */
    public function getDomainTemplates(): Collection
    {
        return $this->domainTemplates;
    }

    public function addDomainTemplate(DomainTemplate $domainTemplate): static
    {
        if (!$this->domainTemplates->contains($domainTemplate)) {
            $this->domainTemplates->add($domainTemplate);
            $domainTemplate->setDomain($this);
        }

        return $this;
    }

    public function removeDomainTemplate(DomainTemplate $domainTemplate): static
    {
        if ($this->domainTemplates->removeElement($domainTemplate)) {
            // set the owning side to null (unless already changed)
            if ($domainTemplate->getDomain() === $this) {
                $domainTemplate->setDomain(null);
            }
        }

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }
}
