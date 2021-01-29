<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ApiResource(iri="http://schema.org/Product", normalizationContext={"groups"={"read"}}, denormalizationContext={"groups"={"write"}})
 * @Vich\Uploadable()
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ApiFilter(OrderFilter::class, properties={"id", "name"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(ExistsFilter::class, properties={"thumbnail_image"})
 * @ApiFilter (SearchFilter::class, properties={"id": "exact", "name":"partial", "description": "partial"})
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read","write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read","write"})
     */
    private $description;

    /**
     * @ORM\Column (type="string", length=100, nullable=true)
     * @Groups({"read","write"})
     */
    private $thumbnail_image;

    /**
     * @Vich\UploadableField(mapping="thumbnails", fileNameProperty="thumbnail_image")
     * @Groups({"read","write"})
     */
    private $thumbnailFile;

    /**
     * @ORM\Column (type="datetime")
     * @Groups({"read", "write"})
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="product", cascade={"remove", "persist"})
     * @Groups({"read","write"})
     * @ApiProperty(attributes={"fetchEager": false})
     */
    private $offers;

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
        $this->offers = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getThumbnailImage()
    {
        return $this->thumbnail_image;
    }

    /**
     * @param mixed $thumbnail_image
     */
    public function setThumbnailImage($thumbnail_image): void
    {
        $this->thumbnail_image = $thumbnail_image;

    }

    /**
     * @return mixed
     */
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * @param mixed $thumbnailFile
     */
    public function setThumbnailFile($thumbnailFile): void
    {
        $this->thumbnailFile = $thumbnailFile;

        if ($thumbnailFile) {
            $this->updatedAt = new \DateTime();
        }
    }

    /**
     * @return Collection|Offer[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setProduct($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getProduct() === $this) {
                $offer->setProduct(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

}
