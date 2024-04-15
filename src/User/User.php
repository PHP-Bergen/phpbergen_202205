<?php declare(strict_types=1);

namespace Phpbergen\User;

use Phpbergen\Db\StorageInterface;

final class User {

    public function __construct(
      readonly StorageInterface $storage,
      private readonly UserName $userName,
    ) {}

    public function createUser(): array
    {
        return $this->storage->createUser(
          $this->userName->firstName(),
          $this->userName->lastName(),
        );
    }

    public function removeUser(int $userId)
    {
        $this->storage->removeUser(1);
    }
}
