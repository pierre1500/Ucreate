<?php

namespace App\Entity;

use App\Repository\DomainTemplateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomainTemplateRepository::class)]
class DomainTemplate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code_html = null;

    #[ORM\Column(length: 255)]
    private ?string $code_css = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color3 = null;

    #[ORM\Column(length: 255)]
    private ?string $title_site = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $header_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hero_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hero_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hero_text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $button = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $button_link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $first_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $first_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $first_text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $second_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $second_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $second_text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $third_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $third_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $third_text = null;

    #[ORM\ManyToOne(inversedBy: 'domainTemplates')]
    private ?Template $template = null;

    #[ORM\ManyToOne(inversedBy: 'domainTemplates')]
    private ?Domain $domain = null;

    #[ORM\ManyToOne(inversedBy: 'domainTemplates')]
    private ?VariationsTemplate $var_templates = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeHtml(): ?string
    {
        return $this->code_html;
    }

    public function setCodeHtml(string $code_html): static
    {
        $this->code_html = $code_html;

        return $this;
    }

    public function getCodeCss(): ?string
    {
        return $this->code_css;
    }

    public function setCodeCss(string $code_css): static
    {
        $this->code_css = $code_css;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getTitleSite(): ?string
    {
        return $this->title_site;
    }

    public function setTitleSite(string $title_site): static
    {
        $this->title_site = $title_site;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getHeaderImage(): ?string
    {
        return $this->header_image;
    }

    public function setHeaderImage(?string $header_image): static
    {
        $this->header_image = $header_image;

        return $this;
    }

    public function getHeroImage(): ?string
    {
        return $this->hero_image;
    }

    public function setHeroImage(?string $hero_image): static
    {
        $this->hero_image = $hero_image;

        return $this;
    }

    public function getHeroTitle(): ?string
    {
        return $this->hero_title;
    }

    public function setHeroTitle(?string $hero_title): static
    {
        $this->hero_title = $hero_title;

        return $this;
    }

    public function getHeroText(): ?string
    {
        return $this->hero_text;
    }

    public function setHeroText(?string $hero_text): static
    {
        $this->hero_text = $hero_text;

        return $this;
    }

    public function getButton(): ?string
    {
        return $this->button;
    }

    public function setButton(?string $button): static
    {
        $this->button = $button;

        return $this;
    }

    public function getButtonLink(): ?string
    {
        return $this->button_link;
    }

    public function setButtonLink(?string $button_link): static
    {
        $this->button_link = $button_link;

        return $this;
    }

    public function getFirstImage(): ?string
    {
        return $this->first_image;
    }

    public function setFirstImage(?string $first_image): static
    {
        $this->first_image = $first_image;

        return $this;
    }

    public function getFirstTitle(): ?string
    {
        return $this->first_title;
    }

    public function setFirstTitle(?string $first_title): static
    {
        $this->first_title = $first_title;

        return $this;
    }

    public function getFirstText(): ?string
    {
        return $this->first_text;
    }

    public function setFirstText(?string $first_text): static
    {
        $this->first_text = $first_text;

        return $this;
    }

    public function getSecondImage(): ?string
    {
        return $this->second_image;
    }

    public function setSecondImage(?string $second_image): static
    {
        $this->second_image = $second_image;

        return $this;
    }

    public function getSecondTitle(): ?string
    {
        return $this->second_title;
    }

    public function setSecondTitle(?string $second_title): static
    {
        $this->second_title = $second_title;

        return $this;
    }

    public function getSecondText(): ?string
    {
        return $this->second_text;
    }

    public function setSecondText(?string $second_text): static
    {
        $this->second_text = $second_text;

        return $this;
    }

    public function getThirdImage(): ?string
    {
        return $this->third_image;
    }

    public function setThirdImage(?string $third_image): static
    {
        $this->third_image = $third_image;

        return $this;
    }

    public function getThirdTitle(): ?string
    {
        return $this->third_title;
    }

    public function setThirdTitle(?string $third_title): static
    {
        $this->third_title = $third_title;

        return $this;
    }

    public function getThirdText(): ?string
    {
        return $this->third_text;
    }

    public function setThirdText(?string $third_text): static
    {
        $this->third_text = $third_text;

        return $this;
    }

    public function getTemplate(): ?Template
    {
        return $this->template;
    }

    public function setTemplate(?Template $template): static
    {
        $this->template = $template;

        return $this;
    }

    public function getDomain(): ?Domain
    {
        return $this->domain;
    }

    public function setDomain(?Domain $domain): static
    {
        $this->domain = $domain;

        return $this;
    }

    public function getVarTemplates(): ?VariationsTemplate
    {
        return $this->var_templates;
    }

    public function setVarTemplates(?VariationsTemplate $var_templates): static
    {
        $this->var_templates = $var_templates;

        return $this;
    }
}
