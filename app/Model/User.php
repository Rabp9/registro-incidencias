<?php

/**
 * CakePHP User
 * @author admin
 */

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    public $useTable = "users";
    public $primaryKey = "idUser";
    
    public $validate = array(
        "username" => array(
            "isUnique" => array(
                "rule" => "isUnique",
                "message" => "Ya existe un usuario con este nombre"
            )
        )
    );
    
    public $belongsTo = array(
        "Group" => array(
            "foreignKey" => "idgroup"
        )
    );
    
    public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

    public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data['User']['password'] = $passwordHasher->hash(
                $this->data['User']['password']
            );
        }
        return true;
    }

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data["User"]["idGroup"])) {
            $idgroup = $this->data["User"]["idGroup"];
        } else {
            $idgroup = $this->field("idGroup");
        }
        if (!$idgroup) {
            return null;
        } else {
            return array('Group' => $idgroup);
        }
    }

    public function bindNode($user) {
        return array('model' => "Group", "foreign_key" => $user["User"]["idGroup"]);
    }
}
