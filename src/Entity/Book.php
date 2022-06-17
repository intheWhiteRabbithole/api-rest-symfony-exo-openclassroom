<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["getBooks"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["getBooks"])]
    private $title;

    #[ORM\Column(type: 'text')]
    #[Groups(["getBooks"])]
    private $coverText;

    #[ORM\ManyToOne(targetEntity: Authors::class, inversedBy: 'book')]
    #[Groups(["getBooks"])]
    private $authors;

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

    public function getCoverText(): ?string
    {
        return $this->coverText;
    }

    public function setCoverText(string $coverText): self
    {
        $this->coverText = $coverText;

        return $this;
    }

    public function getAuthors(): ?Authors
    {
        return $this->authors;
    }

    public function setAuthors(?Authors $authors): self
    {
        $this->authors = $authors;

        return $this;
    }
}
