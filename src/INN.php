<?php

declare(strict_types=1);

namespace Gomzyakov\Numbers;

class INN
{
    /**
     * @var string
     */
    private string $inn_number;

    /**
     * @param string $inn_number
     */
    public function __construct(string $inn_number)
    {
        $this->inn_number = $inn_number;
    }

    /**
     * @param string $inn_number
     *
     * @return self
     */
    public static function create(string $inn_number): self
    {
        return new self($inn_number);
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        $inn = (string) $this->inn_number;

        if (preg_match('/\D/', $inn)) {
            return false;
        }

        $len = strlen($inn);

        if ($len === 10) {
            return $inn[9] === (string) (((
                2 * $inn[0] + 4 * $inn[1] + 10 * $inn[2] + 3 * $inn[3] + 5 * $inn[4] + 9 * $inn[5] + 4 * $inn[6] + 6 * $inn[7] + 8 * $inn[8]
            ) % 11) % 10);
        } elseif ($len === 12) {
            $num10 = (string) (((
                7 * $inn[0] + 2 * $inn[1] + 4 * $inn[2] + 10 * $inn[3] + 3 * $inn[4] + 5 * $inn[5] + 9 * $inn[6] + 4 * $inn[7] + 6 * $inn[8] + 8 * $inn[9]
            ) % 11) % 10);

            $num11 = (string) (((
                3 * $inn[0] + 7 * $inn[1] + 2 * $inn[2] + 4 * $inn[3] + 10 * $inn[4] + 3 * $inn[5] + 5 * $inn[6] + 9 * $inn[7] + 4 * $inn[8] + 6 * $inn[9] + 8 * $inn[10]
            ) % 11) % 10);

            return $inn[11] === $num11 && $inn[10] === $num10;
        }

        return false;
    }
}
