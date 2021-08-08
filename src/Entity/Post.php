<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

//itemOpération limite les opérations d'api a GET

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 * * @ApiResource(
 *      normalizationContext={"groups"={"read:collection"}},
 *      itemOperations={"delete",
 *                      "put"={"denormalization_context"={"groups"={"put:post"}},
 *                      "get"={
 *                          "method=GET","requirements"={"id"="\d+"},
 *                          "normalization_context"={"groups"={"read:collection","read:item","read:Post"}}
 *      }
 *    }
 * }
 * )
 *
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:collection"})
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $uptdateAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:collection"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:collection"})
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="posts")
     * @Groups({"read:collection"})
     */
    private $Category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getUptdateAt(): ?\DateTimeImmutable
    {
        return $this->uptdateAt;
    }

    public function setUptdateAt(\DateTimeImmutable $uptdateAt): self
    {
        $this->uptdateAt = $uptdateAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
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

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }
}
