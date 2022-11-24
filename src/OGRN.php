<?php

declare(strict_types=1);

namespace Gomzyakov\Numbers;

class OGRN
{
    /**
     * @var string
     */
    private string $ogrn_number;

    /**
     * @param string $ogrn_number
     */
    public function __construct(string $ogrn_number)
    {
        $this->ogrn_number = $ogrn_number;
    }

    /**
     * @param string $ogrn_number
     *
     * @return self
     */
    public static function create(string $ogrn_number): self
    {
        return new self($ogrn_number);
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        $ogrn = (string) $this->ogrn_number;

        if (! preg_match('#^\d{13,15}$#', $ogrn)) {
            return false; // ОГРН должен состоять из 13 или 15 цифр
        } elseif ($ogrn > PHP_INT_MAX) {
            return false; // Проверка невозможна, т.к. скрипт запущен на 32х-разрядной версии PHP
        }
        //делаем строкой
        $ogrn = $ogrn . '';
        if (strlen($ogrn) == 13 and $ogrn[12] != substr((substr($ogrn, 0, -1) % 11), -1)) {
            return false; // 'Контрольное число равно ' . substr((substr($ogrn, 0, -1) % 11), -1) . '. Ожидалось ' . $ogrn[12]);
        } elseif (strlen($ogrn) == 15 and $ogrn[14] != substr(substr($ogrn, 0, -1) % 13, -1)) {
            return false; //  'Контрольное число равно ' . substr(substr($ogrn, 0, -1) % 13, -1) . '. Ожидалось ' . $ogrn[14]);
        } elseif (strlen($ogrn) != 13 and strlen($ogrn) != 15) {
            return false; // 'ОГРН должен состоять из 13 или 15 цифр');
        }

        return true;
    }
}
