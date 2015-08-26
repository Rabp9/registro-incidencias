<?php

/**
 * CakePHP Tipo
 * @author rabp99
 */
class Tipo extends AppModel {
    public $useTable = "tipos";
    public $actsAs = array('Containable');
        
    public $primaryKey = "idTipo";
      
    public $validate = array(
        "descripcion" => array(
            "notBlank" => array(
                "rule" => "notBlank",
                "message" => "No puede estar vacio"
            )
        )
    );
      
    public $hasAndBelongsToMany = array(
        "Incidencia" => array(
            "foreignKey" => "idTipo",
            "associationForeignKey" => "idIncidencia"
        )
    );
    
}
