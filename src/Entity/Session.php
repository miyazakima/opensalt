<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="auth_session")
 * @ORM\Entity(repositoryClass="App\Repository\SessionRepository")
 */
class Session
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="binary", length=128)
     * @ORM\Id()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sess_data", type="blob")
     */
    private $data;

    /**
     * @var int
     *
     * @ORM\Column(name="sess_time", type="integer")
     */
    private $lastUsed;

    /**
     * @var int
     *
     * @ORM\Column(name="sess_lifetime", type="integer")
     */
    private $lifetime;

    /**
     * @return string
     */
    public function getId()
    {
        if (is_resource($this->id)) {
            $this->id = stream_get_contents($this->id);
        }

        return $this->id;
    }

    /**
     * @return int
     */
    public function getLastUsed(): int
    {
        return $this->lastUsed;
    }

    public function getLastUsedTime(): \DateTimeImmutable
    {
        return \DateTimeImmutable::createFromFormat('U', $this->getLastUsed());
    }

    /**
     * @return int
     */
    public function getLifetime(): int
    {
        return $this->lifetime;
    }
}
