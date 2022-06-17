<?php

namespace App\Entity;

use App\Repository\AuthorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorsRepository::class)]
class Authors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["getBooks"])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["getBooks"])]
    private $lastName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["getBooks"])]
    private $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["getBooks"])]
    private $Relation;

    #[ORM\OneToMany(mappedBy: 'authors', targetEntity: Book::class)]
    private $book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->Relation;
    }

    public function setRelation(string $Relation): self
    {
        $this->Relation = $Relation;

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    public function addBook(Book $book): self
    {
        if (!$this->book->contains($book)) {
            $this->book[] = $book;
            $book->setAuthors($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->book->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getAuthors() === $this) {
                $book->setAuthors(null);
            }
        }

        return $this;
    }
}
