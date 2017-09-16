<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A screening of a movie or other video.
 *
 * @see http://schema.org/ScreeningEvent Documentation on Schema.org
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/ScreeningEvent")
 */
class ScreeningEvent extends Event
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
     * @var string[]|null Languages in which subtitles/captions are available, in \[IETF BCP 47 standard format\](http://tools.ietf.org/html/bcp47).
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/subtitleLanguage")
     */
    protected $subtitleLanguages;

    /**
     * @var string|null The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD, etc.).
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/videoFormat")
     */
    protected $videoFormat;

    /**
     * @var Movie the movie presented during this event
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Movie")
     * @ApiProperty(iri="http://schema.org/workPresented")
     * @Assert\NotNull
     */
    protected $workPresented;

    public function __construct()
    {
        $this->subtitleLanguages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addSubtitleLanguage(string $subtitleLanguage): self
    {
        $this->subtitleLanguages[] = $subtitleLanguage;

        return $this;
    }

    public function removeSubtitleLanguage(string $subtitleLanguage): self
    {
        $this->subtitleLanguages->removeElement($subtitleLanguage);

        return $this;
    }

    public function getSubtitleLanguages(): Collection
    {
        return $this->subtitleLanguages;
    }

    public function setVideoFormat(?string $videoFormat): self
    {
        $this->videoFormat = $videoFormat;

        return $this;
    }

    public function getVideoFormat(): ?string
    {
        return $this->videoFormat;
    }

    public function setWorkPresented(Movie $workPresented): self
    {
        $this->workPresented = $workPresented;

        return $this;
    }

    public function getWorkPresented(): Movie
    {
        return $this->workPresented;
    }
}
