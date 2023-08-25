<?php

namespace App\Entity;

use App\Repository\TemplateSiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemplateSiteRepository::class)]
class TemplateSite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'template', targetEntity: Project::class)]
    private Collection $projects;

    #[ORM\OneToMany(mappedBy: 'templateSite', targetEntity: Section::class)]
    private Collection $sections;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'template', targetEntity: TemplateUser::class)]
    private Collection $templateUsers;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
        $this->sections = new ArrayCollection();
        $this->templateUsers = new ArrayCollection();
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
     * @return Collection<int, Project>
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): static
    {
        if (!$this->projects->contains($project)) {
            $this->projects->add($project);
            $project->setTemplate($this);
        }

        return $this;
    }

    public function removeProject(Project $project): static
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getTemplate() === $this) {
                $project->setTemplate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Section>
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): static
    {
        if (!$this->sections->contains($section)) {
            $this->sections->add($section);
            $section->setTemplate($this);
        }

        return $this;
    }

    public function removeSection(Section $section): static
    {
        if ($this->sections->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getTemplate() === $this) {
                $section->setTemplate(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, TemplateUser>
     */
    public function getTemplateUsers(): Collection
    {
        return $this->templateUsers;
    }

    public function addTemplateUser(TemplateUser $templateUser): static
    {
        if (!$this->templateUsers->contains($templateUser)) {
            $this->templateUsers->add($templateUser);
            $templateUser->setTemplate($this);
        }

        return $this;
    }

    public function removeTemplateUser(TemplateUser $templateUser): static
    {
        if ($this->templateUsers->removeElement($templateUser)) {
            // set the owning side to null (unless already changed)
            if ($templateUser->getTemplate() === $this) {
                $templateUser->setTemplate(null);
            }
        }

        return $this;
    }
}
