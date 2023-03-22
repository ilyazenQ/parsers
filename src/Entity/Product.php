<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $brandName = null;

    #[ORM\Column]
    private ?int $externalId = null;

    #[ORM\Column]
    private ?int $FullPrice = null;

    #[ORM\Column]
    private ?int $SalePrice = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Category $Category = null;

    #[ORM\ManyToMany(targetEntity: ExtraField::class, inversedBy: 'products')]
    private Collection $Property;

    #[ORM\Column]
    private array $Extra = [];

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?ShopVendor $ShopVendor = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\Column]
    private ?int $diffPrice = null;

    public function __construct()
    {
        $this->Property = new ArrayCollection();
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

    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    public function setBrandName(?string $brandName): self
    {
        $this->brandName = $brandName;

        return $this;
    }

    public function getExternalId(): ?int
    {
        return $this->externalId;
    }

    public function setExternalId(int $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getFullPrice(): ?int
    {
        return $this->FullPrice;
    }

    public function setFullPrice(int $FullPrice): self
    {
        $this->FullPrice = $FullPrice;

        return $this;
    }

    public function getSalePrice(): ?int
    {
        return $this->SalePrice;
    }

    public function setSalePrice(int $SalePrice): self
    {
        $this->SalePrice = $SalePrice;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    /**
     * @return Collection<int, ExtraField>
     */
    public function getProperty(): Collection
    {
        return $this->Property;
    }

    public function addProperty(ExtraField $property): self
    {
        if (!$this->Property->contains($property)) {
            $this->Property->add($property);
        }

        return $this;
    }

    public function removeProperty(ExtraField $property): self
    {
        $this->Property->removeElement($property);

        return $this;
    }

    public function getExtra(): array
    {
        return $this->Extra;
    }

    public function setExtra(array $Extra): self
    {
        $this->Extra = $Extra;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getShopVendor(): ?ShopVendor
    {
        return $this->ShopVendor;
    }

    public function setShopVendor(?ShopVendor $ShopVendor): self
    {
        $this->ShopVendor = $ShopVendor;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getDiffPrice(): ?int
    {
        return $this->diffPrice;
    }

    public function setDiffPrice(int $diffPrice): self
    {
        $this->diffPrice = $diffPrice;

        return $this;
    }
}
