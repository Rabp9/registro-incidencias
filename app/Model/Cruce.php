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
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "descripcion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
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