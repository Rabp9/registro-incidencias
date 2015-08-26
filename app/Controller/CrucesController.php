<?php

/**
 * CakePHP CrucesController
 * @author rabp99
 */
class CrucesController extends AppController {
    public $components = array('Paginator');

    public $paginate = array(
        "limit" => 10,
        "conditions" => array(
            "Cruce.estado" => 1
        ),
        "order" => array(
            "Cruce.idCruce" => "asc"
        )
    );
    
    public function index() {
        $this->layout = "main";

        $this->Paginator->settings = $this->paginate;
        $cruces = $this->Paginator->paginate();
        $this->set(compact("cruces"));
    }
    
    public function view($id = null) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Cruce inválido"));
        }
        $cruce = $this->Cruce->findByIdcruce($id);
        if (!$cruce) {
            throw new NotFoundException(__("Cruce inválido"));
        } 
        $this->set("cruce", $cruce);
    }
    
    public function add(){
        $this->layout = "main";
        
        if ($this->request->is(array("post", "put"))) {
            $this->Cruce->create();
            if ($this->Cruce->save($this->request->data)) {
                $this->Session->setFlash(__("El cruce ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No fue posible registrar el cruce."), "flash_bootstrap");
        }
    }

    public function edit($id = null) {
        $this->layout = "main";
            
        if (!$id) {
            throw new NotFoundException(__("Cruce inválido"));
        }
        $cruce = $this->Cruce->findByIdcruce($id);
        
        if (!$cruce) {
            throw new NotFoundException(__("Cruce inválido"));
        }
          
        if ($this->request->is(array("post", "put"))) {
            $this->Cruce->id = $id;
            if ($this->Cruce->save($this->request->data)) {
                $this->Session->setFlash(__("El Cruce ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Cruce."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $cruce;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Cruce->id = $id;
        if ($this->Cruce->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Cruce de Còdigo: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
    
    public function get_cruces() {
        $this->layout = "ajax";
        
        if(isset($this->request->data["Cruce"]["busqueda"])) {
            $busqueda = $this->request->data["Cruce"]["busqueda"];
            $cruces = $this->Cruce->find("all", array(
                "conditions" => array (
                    "OR" => array(
                        "Cruce.idCruce LIKE" => "%" . $busqueda . "%",
                        "Cruce.descripcion LIKE" => "%" . $busqueda . "%"
                    ),
                    "AND" => array("Cruce.estado" => 1)
                )
            ));
        }
        else $cruces = $this->Cruce->findAllByEstado(1);
        
        $this->set(compact("cruces"));
        $this->render();
    }
}
