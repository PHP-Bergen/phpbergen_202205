<?php

namespace Phpbergen\Db;

class TextFile implements StorageInterface
{
    private $fileHandle;

    public function __construct() {
        $this->fileHandle = fopen(__DIR__ . '/application.txt', 'rwb');
    }

    public function createUser(string $firstName, string $lastName): array
    {
        fwrite($this->fileHandle, "1, $firstName, $lastName");
        return [];
    }

    public function removeUser(int $userId)
    {
        // TODO: Implement removeUser() method.
    }
}
