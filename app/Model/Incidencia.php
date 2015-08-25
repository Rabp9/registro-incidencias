<?php

/**
 * CakePHP Incidencia
 * @author rabp99
 */
class Incidencia extends AppModel {
    public $useTable = "incidencias";
    public $primaryKey = "idIncidencia";
    
    public $belongsTo = array(
        "Cruce" => array(
            "foreignKey" => "idCruce"
        )
    );
    
    public $hasAndBelongsToMany = array(
        "Trabajador" => array(
            "foreignKey" => "idIncidencia",
            "associationForeignKey" => "idTrabajador"
        ), 
        "Tipo" => array(
            "foreignKey" => "idIncidencia",
            "associationForeignKey" => "idTipo"
        ),
        "Componente" => array(
            "foreignKey" => "idIncidencia",
            "associationForeignKey" => "idComponente"
        )
    );
    
    public $validate = array(
        "asunto" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "fecha" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "idCruce" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "diagnostico" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "accion" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        ),
        "resultado" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}