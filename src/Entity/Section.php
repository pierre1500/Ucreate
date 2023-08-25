<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $orderr = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'sections', targetEntity: Component::class)]
    private Collection $components;

    #[ORM\ManyToOne(inversedBy: 'section')]
    private ?TemplateUser $templateUser = null;

    #[ORM\ManyToOne(inversedBy: 'sections')]
    private ?TemplateSite $templateSite = null;

    public function __construct()
    {
        $this->components = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderr(): ?int
    {
        return $this->orderr;
    }

    public function setOrderr(int $orderr): static
    {
        $this->orderr = $orderr;

        return $this;
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
     * @return Collection<int, Component>
     */
    public function getComponents(): Collection
    {
        return $this->components;
    }

    public function addComponent(Component $component): static
    {
        if (!$this->components->contains($component)) {
            $this->components->add($component);
            $component->setSection($this);
        }

        return $this;
    }

    public function removeComponent(Component $component): static
    {
        if ($this->components->removeElement($component)) {
            // set the owning side to null (unless already changed)
            if ($component->getSection() === $this) {
                $component->setSection(null);
            }
        }

        return $this;
    }

    public function getTemplateUser(): ?TemplateUser
    {
        return $this->templateUser;
    }

    public function setTemplateUser(?TemplateUser $templateUser): static
    {
        $this->templateUser = $templateUser;

        return $this;
    }
}
