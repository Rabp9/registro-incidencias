<?php

/**
 * CakePHP Group
 * @author admin
 */

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Group extends AppModel {
    public $useTable = "groups";
    public $primaryKey = "idGroup";
    
    public $actsAs = array('Acl' => array('type' => 'requester'));
        
    public $hasMany = array(
        "User" => array(
            "foreignKey" => "idGroup"
        )
    );
    
    public function parentNode() {
        return null;
    }
}