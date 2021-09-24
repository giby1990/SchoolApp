<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Learner Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property int $idnumber
 * @property \Cake\I18n\FrozenDate $dateofbirth
 * @property string $homeaddress
 * @property string $email
 * @property int $phone
 * @property int $school_id
 *
 * @property \App\Model\Entity\School $school
 * @property \App\Model\Entity\Transferdata[] $transferdata
 */
class Learner extends Entity
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
        'firstname' => true,
        'lastname' => true,
        'idnumber' => true,
        'dateofbirth' => true,
        'homeaddress' => true,
        'email' => true,
        'phone' => true,
        'school_id' => true,
        'school' => true,
        'transferdata' => true,
    ];
}
