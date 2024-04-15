<?php

namespace Phpbergen\Db;

interface StorageInterface
{
    public function createUser(string $firstName, string $lastName): array;
    public function removeUser(int $userId);
}
