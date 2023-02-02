<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Repuesto::class, orphanRemoval: true)]
    private Collection $repuestos;

    public function __construct()
    {
        $this->repuestos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Repuesto>
     */
    public function getRepuestos(): Collection
    {
        return $this->repuestos;
    }

    public function addRepuesto(Repuesto $repuesto): self
    {
        if (!$this->repuestos->contains($repuesto)) {
            $this->repuestos->add($repuesto);
            $repuesto->setCategory($this);
        }

        return $this;
    }

    public function removeRepuesto(Repuesto $repuesto): self
    {
        if ($this->repuestos->removeElement($repuesto)) {
            // set the owning side to null (unless already changed)
            if ($repuesto->getCategory() === $this) {
                $repuesto->setCategory(null);
            }
        }

        return $this;
    }
}
