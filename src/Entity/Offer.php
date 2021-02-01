<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OfferRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(iri="http://schema.org/Offer", normalizationContext={"groups"={"read"}}, denormalizationContext={"groups"={"write"}}, attributes={"pagination_enabled=false})
 * @ORM\Entity(repositoryClass="App\Repository\OfferRepository", repositoryClass=OfferRepository::class)
 */
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read","write"})
     * @Assert\Url
     * @Assert\NotNull
     * @ApiProperty(iri="http://schema.org/url")
     */
    private $url;

    /**
     * @var float
     * @ORM\Column(type="float")
     * @ApiProperty(iri="http://schema.org/price")
     * @Assert\NotNull
     * @Groups({"read","write"})
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read","write"})
     */
    private $priceCurrency;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="offers")
     * @Groups({"write"})
     * @ApiProperty(attributes={"fetchEager"= false})
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceCurrency(): ?string
    {
        return $this->priceCurrency;
    }

    public function setPriceCurrency(string $priceCurrency): self
    {
        $this->priceCurrency = $priceCurrency;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function __toString()
    {
        return $this->url;
    }

}
