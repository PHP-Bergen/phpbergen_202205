<?php declare(strict_types=1);

namespace Phpbergen\User;

use InvalidArgumentException;

final class UserName
{
    private string $firstName;
    private string $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        if (strlen($firstName) < 2) {
            throw new InvalidArgumentException(
              'First name too short'
            );
        }
        $this->firstName = $firstName;

        if (strlen($lastName) < 2) {
            throw new InvalidArgumentException(
              'Last name too short'
            );
        }
        $this->lastName = $lastName;
    }

    public function name():string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function alterFirstName(string $firstName): UserName
    {
        $copy = clone $this;
        $copy->firstName  = $firstName;
        return $copy;
    }

    public function __toString(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }
}
