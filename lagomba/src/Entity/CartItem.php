<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartItemRepository")
 */
class CartItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cart", inversedBy="cartItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cart_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mushroom", inversedBy="cartItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mushroom_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     * @ORM\Column(type="integer")
     */
    private $unit_price;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCartId(): ?Cart
    {
        return $this->cart_id;
    }

    public function setCartId(?Cart $cart_id): self
    {
        $this->cart_id = $cart_id;

        return $this;
    }

    public function getMushroomId(): ?mushroom
    {
        return $this->mushroom_id;
    }

    public function setMushroomId(?mushroom $mushroom_id): self
    {
        $this->mushroom_id = $mushroom_id;

        return $this;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getUnitPrice(): ?int
    {
        return $this->unit_price;
    }

    public function setUnitPrice(int $unit_price): self
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
