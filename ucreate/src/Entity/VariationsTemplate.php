<?php

namespace App\Entity;

use App\Repository\VariationsTemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VariationsTemplateRepository::class)]
class VariationsTemplate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'var_templates', targetEntity: DomainTemplate::class)]
    private Collection $domainTemplate;

    public function __construct()
    {
        $this->domainTemplate = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, DomainTemplate>
     */
    public function getDomainTemplate(): Collection
    {
        return $this->domainTemplate;
    }

    public function addDomainTemplate(DomainTemplate $domainTemplate): static
    {
        if (!$this->domainTemplate->contains($domainTemplate)) {
            $this->domainTemplate->add($domainTemplate);
            $domainTemplate->setVarTemplates($this);
        }

        return $this;
    }

    public function removeDomainTemplate(DomainTemplate $domainTemplate): static
    {
        if ($this->domainTemplate->removeElement($domainTemplate)) {
            // set the owning side to null (unless already changed)
            if ($domainTemplate->getVarTemplates() === $this) {
                $domainTemplate->setVarTemplates(null);
            }
        }

        return $this;
    }
}
