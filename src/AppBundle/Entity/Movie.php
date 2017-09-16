<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A movie.
 *
 * @see http://schema.org/Movie Documentation on Schema.org
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Movie")
 */
class Movie extends Thing
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Duration|null The duration of the item (movie, audio recording, event, etc.) in \[ISO 8601 date format\](http://en.wikipedia.org/wiki/ISO\_8601).
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Duration")
     * @ApiProperty(iri="http://schema.org/duration")
     */
    protected $duration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setDuration(?Duration $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDuration(): ?Duration
    {
        return $this->duration;
    }
}
