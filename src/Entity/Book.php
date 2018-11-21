<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"book"}, "enable_max_depth"=true},
 *     "denormalization_context"={"groups"={"book"}, "enable_max_depth"=true}
 * })
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"book", "author"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"book", "author"})
     * @MaxDepth(3)
     */
    private $author;

    public function getId() : ? int
    {
        return $this->id;
    }

    public function getAuthor() : ? Author
    {
        return $this->author;
    }

    public function setAuthor(? Author $author) : self
    {
        $this->author = $author;

        return $this;
    }
}
