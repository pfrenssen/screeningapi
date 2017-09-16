<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An event happening at a certain time and location, such as a concert, lecture, or festival. Ticketing information may be added via the \[\[offers\]\] property. Repeated events may be structured as separate Event objects.
 *
 * @see http://schema.org/Event Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/Event")
 */
abstract class Event extends Thing
{
    /**
     * @var string|null The language of the content or performance or used in an action. Please use one of the language codes from the \[IETF BCP 47 standard\](http://tools.ietf.org/html/bcp47). See also \[\[availableLanguage\]\].
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/inLanguage")
     */
    protected $inLanguage;

    /**
     * @var Place|null the location of for example where the event is happening, an organization is located, or where an action takes place
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Place")
     * @ApiProperty(iri="http://schema.org/location")
     */
    protected $location;

    /**
     * @var \DateTimeInterface|null The start date and time of the item (in \[ISO 8601 date format\](http://en.wikipedia.org/wiki/ISO\_8601)).
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/startDate")
     * @Assert\DateTime
     */
    protected $startDate;

    public function setInLanguage(?string $inLanguage): self
    {
        $this->inLanguage = $inLanguage;

        return $this;
    }

    public function getInLanguage(): ?string
    {
        return $this->inLanguage;
    }

    public function setLocation(?Place $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getLocation(): ?Place
    {
        return $this->location;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }
}
