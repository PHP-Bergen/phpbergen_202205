<?php declare(strict_types=1);

namespace Phpbergen\Db;

class Mysql implements StorageInterface {

    public function connect(): bool|\mysqli
    {
        $host = '';
        $user = '';
        $pass = '';
        $db = '';
        include_once __DIR__ . '/../../setup.php';

        return mysqli_connect($host, $user, $pass, $db);
    }

    public function createUser(string $firstName, string $lastName): array
    {
        $db = $this->connect();
        mysqli_query($db, "INSERT INTO user (first, lastname) VALUES ('$firstName' , '$lastName')");
        $id = mysqli_insert_id($db);
        $results = mysqli_query($db, "SELECT uid, first, lastname FROM user WHERE uid = $id");

        return [mysqli_fetch_row($results)];
    }

    public function removeUser(int $userId)
    {
        // TODO: Implement removeUser() method.
    }
}
