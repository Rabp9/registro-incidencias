<?php

/**
 * CakePHP Trabajador
 * @author admin
 */
class Trabajador extends AppModel {
    public $useTable = "trabajadores";
    public $primaryKey = "idTrabajador";
    
    public $virtualFields = array(
        "nombreCompleto" => "CONCAT(Trabajador.apellidoPaterno, ' ', Trabajador.apellidoMaterno, ', ', Trabajador.nombres )"
    );
    
    public $validate = array(
        "dni" => array(
            "numeric" => array(
                "rule" => "numeric",
                "message" => "Ingrese sólo nùmeros"
            ),
            "minLength" => array(
                "rule" =>  array('minLength', '8'),
                "message" => "Debe tener 8 carácteres"
            ),
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            ),
            "isUnique" => array(
                "rule" => "isUnique",
                "message" => "Ya existe un Trabajador con este DNI"
            )
        ),
        "nombres" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            ),
            'alpha'=> array(
                "rule"      => "/^[a-zA-Z áéíóúñÁÉÍÓÚÑ]+$/i",
                "message"   => "Sólo letras permitidas"
            )
        ),
        "apellidoPaterno" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            ),
            'alpha'=> array(
                "rule"      => "/^[a-zA-Z áéíóúñÁÉÍÓÚÑ]+$/i",
                "message"   => "Sólo letras permitidas"
            )       
        ),
        "apellidoMaterno" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            ),
            'alpha'=> array(
                "rule"      => "/^[a-zA-Z áéíóúñÁÉÍÓÚÑ]+$/i",
                "message"   => "Sólo letras permitidas"
            )
        ),
        "cargo" => array(
            "notEmpty" => array(
                "rule" => "notEmpty",
                "message" => "No puede estar vacio"
            )
        )
    );
}
