<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 */
class Cart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qty;

    /**
     * @ORM\Column(type="integer")
     */
    private $sub_total;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CartItem", mappedBy="cart_id")
     */
    private $cartItems;

    public function __construct()
    {
        $this->cartItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSubTotal(): ?int
    {
        return $this->sub_total;
    }

    public function setSubTotal(int $sub_total): self
    {
        $this->sub_total = $sub_total;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return CartItem[]|Collection
     */
    public function getCartItems(): Collection
    {
        return $this->cartItems;
    }

    public function addCartItem(CartItem $cartItem): self
    {
        if (!$this->cartItems->contains($cartItem)) {
            $this->cartItems[] = $cartItem;
            $cartItem->setCartId($this);
        }

        return $this;
    }

    public function removeCartItem(CartItem $cartItem): self
    {
        if ($this->cartItems->contains($cartItem)) {
            $this->cartItems->removeElement($cartItem);
            // set the owning side to null (unless already changed)
            if ($cartItem->getCartId() === $this) {
                $cartItem->setCartId(null);
            }
        }

        return $this;
    }

    public function getItemCount(array $array)
    {
        $sum = 0;
        foreach ($array as $key => $value) {
            $sum += $value['qty'];
        }

        return $sum;
    }

    public function getItemPrice(array $array)
    {
        $sum = 0;
        foreach ($array as $key => $value) {
            $sum += $value['unit_price'] * $value['qty'];
        }

        return $sum;
    }

    public function getItemTotal(array $array)
    {
        return $this->getItemSubTotal($array);
    }

    public function getItemSubTotal(array $array)
    {
        $sum = 0;
        foreach ($array as $key => $value) {
            $sum += $value['unit_price'] * $value['qty'];
        }

        return $sum;
    }
}
