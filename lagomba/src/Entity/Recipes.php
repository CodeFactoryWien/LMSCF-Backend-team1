<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recipes
 *
 * @ORM\Table(name="recipes")
 * @ORM\Entity
 */
class Recipes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="steps", type="string", length=255, nullable=false)
     */
    private $steps;

    /**
     * @var string
     *
     * @ORM\Column(name="requires", type="string", length=255, nullable=false)
     */
    private $requires;

    /**
     * @var string
     *
     * @ORM\Column(name="prep_time", type="string", length=255, nullable=false)
     */
    private $prepTime;

    /**
     * @var string
     *
     * @ORM\Column(name="prep_level", type="string", length=255, nullable=false)
     */
    private $prepLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSteps(): ?string
    {
        return $this->steps;
    }

    public function setSteps(string $steps): self
    {
        $this->steps = $steps;

        return $this;
    }

    public function getRequires(): ?string
    {
        return $this->requires;
    }

    public function setRequires(string $requires): self
    {
        $this->requires = $requires;

        return $this;
    }

    public function getPrepTime(): ?string
    {
        return $this->prepTime;
    }

    public function setPrepTime(string $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getPrepLevel(): ?string
    {
        return $this->prepLevel;
    }

    public function setPrepLevel(string $prepLevel): self
    {
        $this->prepLevel = $prepLevel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }


}
