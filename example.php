<?php declare(strict_types=1);

/**
 * @file Create a user in Mysql.
 *
 * Introduce value object. Move validation out of User class.
 * Get rid of static classes.
 * Show of some of PHP new type system.
 * Throw exceptions.
 * PHPUnit tests exceptions.
 * Demonstrate how to alter an immutable object (class UserName).
 *
 * Play on your own:
 *  - Get rid of hidden User dependency to the db.
 *  - Get rid of the last include statement.
 *  - Replace Mysql with generic PDO.
 *  - PHPUnit tests should use a datbase mock object create entries the real db.
 */

use Phpbergen\User\User;
use Phpbergen\User\UserName;

include_once __DIR__ . '/vendor/autoload.php';

$first = 'James';
$last = 'Bond';

$userName = new UserName($first, $last);
$dbStorage = new Phpbergen\Db\Mysql();
$fileStorage = new Phpbergen\Db\TextFile();

$user = new User($dbStorage. $userName);
$userExample = new User($fileStorage, $userName);
$newUser = $userName->alterFirstName('Foo');

$userAccount = $user->createUser();
if ($userAccount) {
    print_r($userAccount);
}

$updatedUserName = $userName->alterFirstName('Sarah');
print $updatedUserName;
