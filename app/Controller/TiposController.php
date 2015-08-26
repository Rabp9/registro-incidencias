<?php

/**
 * CakePHP TiposController
 * @author admin
 */
class TiposController extends AppController {
    public $components = array('Paginator');

    public $paginate = array(
        "limit" => 10,
        "conditions" => array(
            "Tipo.estado" => 1
        ),
        "order" => array(
            "Tipo.idTipo" => "asc"
        )
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $tipos = $this->Paginator->paginate();
        $this->set(compact("tipos"));
    }
    
    public function add() {
        $this->layout = "main";
        
        if ($this->request->is(array("post", "put"))) {
            $this->Tipo->create();
            if ($this->Tipo->save($this->request->data)) {
                $this->Session->setFlash(__("El tipo ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el componente."), "flash_bootstrap");
        }
    }
    
    public function view($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Tipo de Incidencia inválido"));
        }
        $tipo = $this->Tipo->findByIdtipo($id);
        if (!$tipo) {
            throw new NotFoundException(__("Tipo de Incidencia inválido"));
        } 
        $this->set("tipo", $tipo);
    }
    
    public function edit($id = null) {
        $this->layout = "main";
            
        if (!$id) {
            throw new NotFoundException(__("Tipo de Incidencia inválido"));
        }
        $tipo = $this->Tipo->findByIdtipo($id);
        
        if (!$tipo) {
            throw new NotFoundException(__("Tipo de Incidencia inválido"));
        }
          
        if ($this->request->is(array("post", "put"))) {
            $this->Tipo->id = $id;
            if ($this->Tipo->save($this->request->data)) {
                $this->Session->setFlash(__("El Tipo de Incidencia ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Tipo de Incidencia."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $tipo;
        }
    }
   
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Tipo->id = $id;
        if ($this->Tipo->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Tipo de Incidencia de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}
