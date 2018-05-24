<?php

namespace App\Command\Framework;

use App\Command\BaseCommand;
use App\Entity\Framework\LsAssociation;
use App\Entity\Framework\LsItem;
use Symfony\Component\Validator\Constraints as Assert;

class AddExemplarToItemCommand extends BaseCommand
{
    /**
     * @var LsItem
     *
     * @Assert\Type(LsItem::class)
     * @Assert\NotNull()
     */
    private $item;

    /**
     * @var string
     *
     * @Assert\Type("string")
     * @Assert\NotNull()
     * @Assert\Length(max="300")
     */
    private $url;
    
    /**
     *@var string
     *
     * @Assert\Type("string")
     * @Assert\NotNull()
     * @Assert\Length(max="300")
     */
    private $file;

    /**
     * @var LsAssociation|null
     *
     * @Assert\Type(LsAssociation::class)
     */
    private $association;

    /**
     * Constructor.
     */
    public function __construct(LsItem $item, string $url, string $file, ?LsAssociation $association = null)
    {
        $this->item = $item;
        $this->url = $url;
        $this->file = $file;
        $this->association = $association;
    }

    public function getItem(): LsItem
    {
        return $this->item;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
    
    public function getFile(): string
    {
        return $this->file;
    }

    public function getAssociation(): ?LsAssociation
    {
        return $this->association;
    }

    public function setAssociation(?LsAssociation $association): void
    {
        $this->association = $association;
    }
}
