<?php

declare(strict_types = 1);

namespace Gomzyakov\Numbers;

class KPP
{
    /**
     * @var string
     */
    private string $kpp_number;

    /**
     * @param string $kpp_number
     */
    public function __construct(string $kpp_number)
    {
        $this->kpp_number = $kpp_number;
    }

    /**
     * @param string $kpp_number
     *
     * @return self
     */
    public static function create(string $kpp_number): self
    {
        return new self($kpp_number);
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return (bool) preg_match('#^\d{9}$#', $this->kpp_number);
    }
}
