<?php

namespace App\DTO\Parser;
use App\Entity\Category;
use App\Entity\ExtraField;
use App\Entity\ShopVendor;
use Doctrine\Common\Collections\Collection;

class ProductDTO implements DTOInterface {

    private ?int $id = null;

    private ?string $name = null;

    private ?string $brandName = null;

    private ?int $externalId = null;

    private ?int $FullPrice = null;

    private ?int $SalePrice = null;

    private ?Category $Category = null;

    private Collection $Property;

    private array $Extra = [];

    private ?\DateTimeImmutable $createdAt = null;

    private ?\DateTimeImmutable $updatedAt = null;

    private ?ShopVendor $ShopVendor = null;

    private ?string $link = null;

    public function __construct()
    {
        $this->Property = new \Doctrine\Common\Collections\ArrayCollection();
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
}