<?php

class Article{
    private string $name;
    private float $price;
    private bool $backup;
    

    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name): self{
        $this->name = $name;
        return $this;
    }

    public function getPrice(): float{
        return $this->price;
    }

    
    public function setPrice(float $price): self{
        $this->price = $price;
        return $this;
    }

    
    public function isBackup(): bool{
        return $this->backup;
    }

    
    public function setBackup(bool $backup): self{
        $this->backup = $backup;
        return $this;
    }
}