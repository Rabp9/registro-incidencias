<?php

/**
 * CakePHP Componente
 * @author rabp99
 */
class Componente extends AppModel {
    public $useTable = "componentes";
    public $actsAs = array('Containable');
        
    public $primaryKey = "idComponente";
        
    public $validate = array(
        "descripcion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "imagen" => array(
            "rule" => array("extension", array("jpeg", "jpg", "png")),
            "required" => "create",
            "allowEmpty" => true,
            "on" => array("create", "update"),
            "last" => true,
            "message" => "Por favor seleccione una imagen con el formato correcto (jpeg, png, jpg)"
        )
    );
    
    public $hasAndBelongsToMany = array(
        "Incidencia" => array(
            "foreignKey" => "idComponente",
            "associationForeignKey" => "idIncidencia"
        )
    );
}
