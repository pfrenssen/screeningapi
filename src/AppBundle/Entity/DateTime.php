<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A combination of date and time of day in the form \[-\]CCYY-MM-DDThh:mm:ss\[Z|(+|-)hh:mm\] (see Chapter 5.4 of ISO 8601).
 *
 * @see http://schema.org/DateTime Documentation on Schema.org
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/DateTime")
 */
class DateTime
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
