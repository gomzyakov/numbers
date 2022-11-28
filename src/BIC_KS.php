<?php

declare(strict_types = 1);

namespace Gomzyakov\Numbers;

class BIC_KS
{
    /**
     * @var string
     */
    private string $bic_number;

    /**
     * @var string
     */
    private string $ks_number;

    /**
     * @param string $bic_number
     * @param string $ks_number
     */
    public function __construct(string $bic_number, string $ks_number)
    {
        $this->bic_number = $bic_number;
        $this->ks_number  = $ks_number;
    }

    /**
     * @param string $bic_number
     * @param string $ks_number
     *
     * @return self
     */
    public static function create(string $bic_number, string $ks_number): self
    {
        return new self($bic_number, $ks_number);
    }

    /**
     * @return bool
     */
    public function isValidKS(): bool
    {
        $ks = $this->ks_number;

        if (! $this->isValidBIC()) {
            return false;
        } // неверный БИК

        if (empty($ks) || ! preg_match('#^\d{20}$#', $ks)) {
            return false;
        } // к/с должен состоять из 20 цифр

        $bik_ks   = '0' . substr((string) $bic, -5, 2) . $ks;
        $checksum = 0;
        foreach ([7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1] as $i => $k) {
            $checksum += $k * ((int) $bik_ks[$i] % 10);
        }
        if ($checksum % 10 === 0) {
            return true;
        }

        return false; // Неверный контрольный разряд
    }

    /**
     * @return bool
     */
    public function isValidBIC(): bool
    {
        $bic = $this->bic_number;

        if (empty($bic)) {
            return false;
        } // Не передан обязательный параметр bic
        if (! preg_match('#^\d{9}$#', $bik)) {
            return false;
        } // БИК должен состоять из 9 цифр

        return true;
    }
}
