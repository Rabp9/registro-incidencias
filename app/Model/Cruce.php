<?php

/**
 * CakePHP Cruce
 * @author oscar
 */
class Cruce extends AppModel {
    public $useTable = "cruces";
    public $primaryKey = "idCruce";
 
    public $validate = array(
        "idCruce" => array(
            "notBlank" => array(
                "rule" => "notBlank",
                "message" => "No puede estar vacio"
            )
        ),
        "descripcion" => array(
            "notBlank" => array(
                "rule" => "notBlank",
                "message" => "No puede estar vacio"
            )
        )
    );
    
    public $hasMany = array(
        "Incidencia" => array(
            "foreignKey" => "idCruce"
        )
    );
}