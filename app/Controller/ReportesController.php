<?php

/**
 * CakePHP ReportesController
 * @author admin
 */
App::uses('CakeTime', 'Utility');
App::import("PDF", "Lib");

class ReportesController extends AppController {

    public $uses = array("Cruce", "Tipo", "Incidencia", "Componente");

    public function index() {
        $this->layout = "main";
        
    }
    
    public function cruce() {
        $this->layout = "main";
        
        $this->set("cruces", $this->Cruce->find("list", array(
            "conditions" => array("Cruce.estado" => '1'),
            "fields" => array("Cruce.idCruce", "Cruce.descripcion")
        )));
        
        if($this->request->is(array("post", "put"))) {
            
/*          App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
            $this->layout = 'pdf'; //this will use the pdf.ctp layout

            $this->set("fpdf", new FPDF("P","mm","A4"));

            // Inicialización de variables
            $saludo = "hola, on ta bebe, aqui ta";
            // Recuperación de información

            // Salida de la Información
            $this->set(compact("saludo"));

            $this->response->type("application/pdf");
            $this->render("pdf_cruces");
 * 
 */
        }
    }

    public function getByCruce() {
        $this->layout = "ajax";
        
        $this->set("incidencias", $this->Incidencia->find("all", array(
            "conditions" => array(
                "Incidencia.estado" => 1,
                "Incidencia.idCruce" => $this->request->data["Reporte"]["idCruce"],
                "Incidencia.fecha between ? and ?" => array(
                    CakeTime::format($this->request->data["Reporte"]["fechaInicio"], "%Y-%m-%d"), 
                    CakeTime::format($this->request->data["Reporte"]["fechaFin"], "%Y-%m-%d")
                )
            )
        )));
    }
    
    public function tipo() {
        $this->layout = "main";
        
        // Habilitar la opción de Reporte de Cruce desde vista externa
        
        $this->set("tipos", $this->Tipo->find("list", array(
            "conditions" => array("Tipo.estado" => '1'),
            "fields" => array("Tipo.idTipo", "Tipo.descripcion")
        )));
    }
    
    public function getByTipo() {
        $this->layout = "ajax";
        
        $incidencias = $this->Incidencia->Tipo->find("first", array(
            "contain" => array(
                "Incidencia" => array(
                    "conditions" => array(
                        "Incidencia.estado" => 1,
                        "Incidencia.fecha between ? and ?" => array(
                            CakeTime::format($this->request->data["Tipo"]["fechaInicio"], "%Y-%m-%d"), 
                            CakeTime::format($this->request->data["Tipo"]["fechaFin"], "%Y-%m-%d")
                        )
                    ),
                ),
                "Incidencia.Cruce"
            ),
            "conditions" => array(
                "Tipo.idTipo" => $this->request->data["Tipo"]["idTipo"]
            )
        ));
        $incidencias = $incidencias["Incidencia"];
        $this->set("incidencias", $incidencias);
    }   
    
    public function componente() {
        $this->layout = "main";
        
        // Habilitar la opción de Reporte de Cruce desde vista externa
        
        $this->set("componentes", $this->Componente->find("list", array(
            "conditions" => array("Componente.estado" => '1'),
            "fields" => array("Componente.idComponente", "Componente.descripcion")
        )));
    }
    
    public function getByComponente() {
        $this->layout = "ajax";
        
        $incidencias = $this->Incidencia->Componente->find("first", array(
            "contain" => array(
                "Incidencia" => array(
                    "conditions" => array(
                        "Incidencia.estado" => 1,
                        "Incidencia.fecha between ? and ?" => array(
                            CakeTime::format($this->request->data["Componente"]["fechaInicio"], "%Y-%m-%d"), 
                            CakeTime::format($this->request->data["Componente"]["fechaFin"], "%Y-%m-%d")
                        )
                    ),
                ),
                "Incidencia.Cruce"
            ),
            "conditions" => array(
                "Componente.idComponente" => $this->request->data["Componente"]["idComponente"]
            )
        ));
        $incidencias = $incidencias["Incidencia"];
        $this->set("incidencias", $incidencias);
    }
    
    public function estadisticas() {
        $this->layout = "main";
        
        if($this->request->is("POST")) {
            $fechaInicio = $this->request->data["Reporte"]["fechaInicio"];
            $fechaFin = $this->request->data["Reporte"]["fechaFin"];
            // Cruces menos
            $db = $this->Cruce->getDataSource();
            $menos = $db->fetchAll(
            "select 
                c.*,
                fn_find_incidencias_count_by_cruce(c.idCruce, ?, ?) 'cantidad'
            from 
                cruces c
            order by cantidad ASC
            limit 0, 10",
                array($fechaInicio, $fechaFin)
            );
            $this->set("menos", $menos);

            // Cruces mas
            $mas = $db->fetchAll(
            "select 
                c.*,
                fn_find_incidencias_count_by_cruce(c.idCruce, ?, ?) 'cantidad'
            from 
                cruces c
            order by cantidad DESC
            limit 0, 10",
                array($fechaInicio, $fechaFin)
            );
            $this->set("mas", $mas);
            
            // Tipos de Incidencias
            $tipos = $db->fetchAll(
            "select 
                t.*,
                fn_find_incidencias_count_by_tipo(t.idTipo, ?, ?) 'cantidad'
            from 
                tipos t
            order by cantidad DESC",
                array($fechaInicio, $fechaFin)
            );
            $this->set("tipos", $tipos);
            
            // Componentes
            $componentes = $db->fetchAll(
            "select 
                c.*,
                fn_find_incidencias_count_by_componente(c.idComponente, ?, ?) 'cantidad'
            from 
                componentes c
            order by cantidad DESC",
                array($fechaInicio, $fechaFin)
            );
            $this->set("componentes", $componentes);
                         
            // Trabajadores
            $trabajadores = $db->fetchAll(
            "select 
                t.*,
                fn_find_incidencias_count_by_trabajador(t.idTrabajador, ?, ?) 'cantidad'
            from 
                trabajadores t
            order by cantidad DESC",
                array($fechaInicio, $fechaFin)
            );
            $this->set("trabajadores", $trabajadores);
            
        }
    }
}
