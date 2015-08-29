<?php

/**
 * CakePHP IncidenciasController
 * @author rabp99
 */
App::uses('CakeTime', 'Utility');

class IncidenciasController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("edit");
    }

    public $uses = array("Incidencia", "User");
    public $components = array('Paginator');

    public $paginate = array(
        "limit" => 10,
        "conditions" => array(
            "Incidencia.estado" => 1
        ),
        "order" => array(
            "Incidencia.idIncidencia" => "asc"
        )
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $incidencias = $this->Paginator->paginate();
        $this->set(compact("incidencias"));
    }
    
    public function add(){
        $this->layout = "main";
        
        $this->set("trabajadores", $this->Incidencia->Trabajador->find("list", array(
            "fields" => array("Trabajador.idTrabajador", "Trabajador.nombreCompleto"),
            'conditions' => array('Trabajador.estado' => '1')
        )));
        
        $this->set("cruces", $this->Incidencia->Cruce->find("list", array(
            "fields" => array("Cruce.idCruce", "Cruce.descripcion")
        )));
        
        $this->set("tipos", $this->Incidencia->Tipo->find("list", array(
            "fields" => array("Tipo.idTipo", "Tipo.descripcion"),
            'conditions' => array("Tipo.estado" => '1')
        )));
        
        $this->set("componentes", $this->Incidencia->Componente->find("list", array(
            "fields" => array("Componente.idComponente", "Componente.descripcion"),
            'conditions' => array('Componente.estado' => '1')
        )));
        
        if ($this->request->is(array("post", "put"))) {
            $user = $this->Auth->user();
            $this->Incidencia->create();
            $this->request->data["Incidencia"]["idUsuario"] = $user["idUsuario"];
            if ($this->Incidencia->save($this->request->data)) {
                $this->Session->setFlash(__("La incidencia ha sido registrada correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar la incidencia."), "flash_bootstrap");
        }
    }

    public function view($id) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Incidencia inválida"));
        }
        $incidencia = $this->Incidencia->findByIdincidencia($id);
        if (!$incidencia) {
            throw new NotFoundException(__("Incidencia inválida"));
        } 
        $this->set("incidencia", $incidencia);
    }
    
    public function edit($id = null) {
        $this->layout = "main";
            
        if (!$id) {
            throw new NotFoundException(__("Incidencia inválida"));
        }
        $incidencia = $this->Incidencia->findByIdincidencia($id);
        
        if (!$incidencia) {
            throw new NotFoundException(__("Incidencia inválida"));
        }
          
        $this->set("trabajadores", $this->Incidencia->Trabajador->find("list", array(
            "fields" => array("Trabajador.idTrabajador", "Trabajador.nombreCompleto"),
            'conditions' => array('Trabajador.estado' => '1')
        )));
        
        $this->set("cruces", $this->Incidencia->Cruce->find("list", array(
            "fields" => array("Cruce.idCruce", "Cruce.descripcion")
        )));
        
        $this->set("tipos", $this->Incidencia->Tipo->find("list", array(
            "fields" => array("Tipo.idTipo", "Tipo.descripcion"),
            'conditions' => array("Tipo.estado" => '1')
        )));
        
        $this->set("componentes", $this->Incidencia->Componente->find("list", array(
            "fields" => array("Componente.idComponente", "Componente.descripcion"),
            'conditions' => array('Componente.estado' => '1')
        )));
        
        if ($this->request->is(array("post", "put"))) {
            $this->Incidencia->id = $id;
            if ($this->Incidencia->save($this->request->data)) {
                $this->Session->setFlash(__("La Incidencia ha sido actualizada."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar la Incidencia."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $incidencia;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Incidencia->id = $id;
        if ($this->Incidencia->saveField("estado", 2)) {
            $this->Session->setFlash(__("La Incidencia de Còdigo: %s ha sido eliminada.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
