<?php

/**
 * CakePHP TrabajadoresController
 * @author admin
 */
class TrabajadoresController extends AppController {
    public $uses = array("Trabajador");
    public $components = array('Paginator');

    public $paginate = array(
        "limit" => 10,
        "conditions" => array(
            "Trabajador.estado" => 1
        ),
        "order" => array(
            "Trabajador.idTrabajador" => "asc"
        )
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $trabajadores = $this->Paginator->paginate();
        $this->set(compact("trabajadores"));
    }
        
    public function add() {
        $this->layout = "main";
        
        if ($this->request->is(array("post", "put"))) {
            $this->Trabajador->create();
            if ($this->Trabajador->save($this->request->data)) {
                $this->Session->setFlash(__("El trabajador ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el trabajador."), "flash_bootstrap");
        }
    }
    
    public function view($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Trabajador inválido"));
        }
        $trabajador = $this->Trabajador->findByIdtrabajador($id);
        if (!$trabajador) {
            throw new NotFoundException(__("Trabajador inválido"));
        } 
        $this->set("trabajador", $trabajador);
    }
    
    public function edit($id = null) {
        $this->layout = "main";
            
        if (!$id) {
            throw new NotFoundException(__("Trabajador inválido"));
        }
        $trabajador = $this->Trabajador->findByIdtrabajador($id);
        
        if (!$trabajador) {
            throw new NotFoundException(__("Trabajador inválido"));
        }
          
        if ($this->request->is(array("post", "put"))) {
            $this->Trabajador->id = $id;
            if ($this->Trabajador->save($this->request->data)) {
                $this->Session->setFlash(__("El trabajador ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el trabajador."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $trabajador;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Trabajador->id = $id;
        if ($this->Trabajador->saveField("estado", 2)) {
            $this->Session->setFlash(__("El trabajador de Código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
