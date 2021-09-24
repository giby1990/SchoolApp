<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transferdata Entity
 *
 * @property int $id
 * @property int $learner_id
 * @property int $from_school_id
 * @property int $to_school_id
 * @property \Cake\I18n\FrozenTime $transfertime
 *
 * @property \App\Model\Entity\Learner $learner
 * @property \App\Model\Entity\FromSchool $from_school
 * @property \App\Model\Entity\ToSchool $to_school
 */
class Transferdata extends Entity
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
        'learner_id' => true,
        'from_school_id' => true,
        'to_school_id' => true,
        'transfertime' => true,
        'learner' => true,
        'school' => true
    ];
}
