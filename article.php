<?php

class Article{
    private string $name;
    private float $price;
    private bool $backup;
    
    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of backup
     */
    public function isBackup(): bool
    {
        return $this->backup;
    }

    /**
     * Set the value of backup
     */
    public function setBackup(bool $backup): self
    {
        $this->backup = $backup;

        return $this;
    }
}