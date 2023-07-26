<?php

namespace App\Entity;

use App\Repository\TemplateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemplateRepository::class)]
class Template
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\OneToMany(mappedBy: 'template', targetEntity: DomainTemplate::class)]
    private Collection $domainTemplates;

    public function __construct()
    {
        $this->domainTemplates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

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
            $domainTemplate->setTemplate($this);
        }

        return $this;
    }

    public function removeDomainTemplate(DomainTemplate $domainTemplate): static
    {
        if ($this->domainTemplates->removeElement($domainTemplate)) {
            // set the owning side to null (unless already changed)
            if ($domainTemplate->getTemplate() === $this) {
                $domainTemplate->setTemplate(null);
            }
        }

        return $this;
    }
}
