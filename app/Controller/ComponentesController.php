<?php

/**
 * CakePHP ComponentesController
 * @author admin
 */
class ComponentesController extends AppController {
    public $components = array("Paginator", "Qimage");

    public $paginate = array(
        "limit" => 10,
        "conditions" => array(
            "Componente.estado" => 1
        ),
        "order" => array(
            "Componente.idComponente" => "asc"
        )
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $componentes = $this->Paginator->paginate();
        $this->set(compact("componentes"));
    }
/*
    public function add() {
        $this->layout = "main";
        
        if ($this->request->is(array("post", "put"))) {
            $this->Componente->create();
           
            $filename = $this->request->data["Componente"]["imagen"]["name"];
            $tmp_name = $this->request->data["Componente"]["imagen"]["tmp_name"];
            unset($this->request->data["Componente"]["imagen"]);
            $this->request->data["Componente"]["imagen"] = $filename;
            
            if ($this->Componente->save($this->request->data)) {
                move_uploaded_file($tmp_name, WWW_ROOT . "img" . DS . "Componentes" . DS . $filename);
                $this->Session->setFlash(__("El Componente ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            
            $this->Session->setFlash(__("No fue posible registrar el componente."), "flash_bootstrap");
        }
    }
*/
    
    public function add() {
        $this->layout = "main";
        
        if ($this->request->is(array("post", "put"))) {
            $this->Componente->create();
            
            $imagen["file"] = $this->request->data["Componente"]["imagen"];
            $imagen["path"] = WWW_ROOT . "img" . DS . "Componentes" . DS;
            $imagen["width"] = 400;
            $imagen["height"] = 300;
            $name = $this->Qimage->copy_resize($imagen);
            
            $this->request->data["Componente"]["imagen"] = $name;
            if ($this->Componente->save($this->request->data)) {
                $this->Session->setFlash(__("El Componente ha sido registrado correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            
            unlink($imagen["path"] . $name);
            $this->Session->setFlash(__("No fue posible registrar el componente."), "flash_bootstrap");
        }
    }
    
    public function view($id) {
        $this->layout = "main";

        if (!$id) {
            throw new NotFoundException(__("Componente inválido"));
        }
        $componente = $this->Componente->findByIdcomponente($id);
        if (!$componente) {
            throw new NotFoundException(__("Componente inválido"));
        } 
        $this->set("componente", $componente);
    }
    
    public function edit($id = null) {
        $this->layout = "main";
            
        if (!$id) {
            throw new NotFoundException(__("Componente inválido"));
        }
        $componente = $this->Componente->findByIdcomponente($id);
        
        if (!$componente) {
            throw new NotFoundException(__("Componente inválido"));
        }
          
        if ($this->request->is(array("post", "put"))) {

            $filename = $this->request->data["Componente"]["imagen"]["name"];
            if($filename != "") {
                unlink(WWW_ROOT . DS . "img" . DS . "Componentes" . DS . $componente["Componente"]["imagen"]);
                $tmp_name = $this->request->data['Componente']["imagen"]["tmp_name"];
                unset($this->request->data["Componente"]["imagen"]);
                $this->request->data["Componente"]["imagen"] = $filename;
            } else
                $this->request->data["Componente"]["imagen"] = $componente["Componente"]["imagen"];
            
            $this->Componente->id = $id;
            if ($this->Componente->save($this->request->data)) { 
                if($filename != "") 
                    move_uploaded_file($tmp_name, WWW_ROOT . "img" . DS . "Componentes" . DS. $filename);  
                $this->Session->setFlash(__("El Componente ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el Componente."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $componente;
        }
    }
    
    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->Componente->id = $id;
        if ($this->Componente->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Componente de Còdigo: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
}