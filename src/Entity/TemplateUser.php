<?php

namespace App\Entity;

use App\Repository\TemplateUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemplateUserRepository::class)]
class TemplateUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'templateUser', targetEntity: Section::class)]
    private Collection $section;

    #[ORM\OneToOne(mappedBy: 'templateUser', cascade: ['persist', 'remove'])]
    private ?Project $project = null;

    #[ORM\ManyToOne(inversedBy: 'templateUsers')]
    private ?TemplateSite $template = null;

    public function __construct()
    {
        $this->section = new ArrayCollection();
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
     * @return Collection<int, Section>
     */
    public function getSection(): Collection
    {
        return $this->section;
    }

    public function addSection(Section $section): static
    {
        if (!$this->section->contains($section)) {
            $this->section->add($section);
            $section->setTemplateUser($this);
        }

        return $this;
    }

    public function removeSection(Section $section): static
    {
        if ($this->section->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getTemplateUser() === $this) {
                $section->setTemplateUser(null);
            }
        }

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): static
    {
        // unset the owning side of the relation if necessary
        if ($project === null && $this->project !== null) {
            $this->project->setTemplateUser(null);
        }

        // set the owning side of the relation if necessary
        if ($project !== null && $project->getTemplateUser() !== $this) {
            $project->setTemplateUser($this);
        }

        $this->project = $project;

        return $this;
    }

    public function getTemplate(): ?TemplateSite
    {
        return $this->template;
    }

    public function setTemplate(?TemplateSite $template): static
    {
        $this->template = $template;

        return $this;
    }

}
