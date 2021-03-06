<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string|null $first_name
 * @property string|null $last_name
 * @property bool $staged
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $password
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'first_name' => true,
        'last_name' => true,
        'staged' => true,
        'created' => true,
        'modified' => true,
        'password' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    /**
     * Set function for the passwords
     *
     * @param string $password Password entered by the user
     * @return string|void Hashed Password
     */
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            $pass = new DefaultPasswordHasher();
            $hash_pass = $pass->hash($password);

            return $hash_pass;
        }
    }
}
