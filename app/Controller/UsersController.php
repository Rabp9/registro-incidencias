<?php

/**
 * CakePHP UsersController
 * @author Roberto
 */

class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("index", "initDB", "add", "login");
    }

    public function initDB() {
        $group = $this->User->Group;

        // Administrador
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        // Usuario
        $group->id = 2;
        $this->Acl->allow($group, 'controllers');
        
        // we add an exit to avoid an ugly "missing views" error message
        echo "all done";
        exit;
    }

    /*public function index() {
        
        $this->set("users", $this->User->find("all", array(
            'conditions' => array('User.estado' => '1')
        )));
    }

    public function view($id = null) {
        $this->layout = "main";

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario inválido'));
        }
        $this->set('user', $this->User->read(null, $id));
    }*/

    public function add() {
        $this->set("groups", $this->User->Group->find("list", array(
            "fields" => array("Group.idgroup", "Group.descripcion")
        )));

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido registrado correctamente'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__("No fue posible registrar el usuario."), "flash_bootstrap");
        }
    }
/*
    public function edit($id = null) {
        $this->layout = "main";

        $this->set("groups", $this->User->Group->find("list", array(
            "fields" => array("id", "descripcion")
        )));
        
        if (!$id) {
            throw new NotFoundException(__("Usuario inválida"));
        }
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__("Usuario inválida"));
        }
        if ($this->request->is(array("post", "put"))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__("El usuario ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el usuaario."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if ($this->User->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Usuario de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }
*/
    public function login() {
        $this->layout = false;
        
        if ($this->request->is(array("post", "put"))) {
            if ($this->Auth->login()) {
                $group = $this->Auth->user()["Group"]["descripcion"];
                switch($group) {
                    case "Administrador":
                        return $this->redirect("/Pages/home");
                        break;
                    case "Usuario":
                        return $this->redirect("/Pages/alumno/");
                        break;
                }
            }
            $this->Session->setFlash(__('Nombre de Usuario o password incorrecto, inténtelo nuevamente'), "flash_bootstrap");
        }
    }

    public function logout() {
        if($this->Auth->user()) {
            $this->redirect($this->Auth->logout());
        }
        else {
            $this->redirect(array("controller" => "users", "action" => "login"));
            $this->Session->setFlash(__('Not logged in'), 'default', array(), 'auth');
        }
    }
          
    public function data() {
        if(empty($this->request->params["requested"])) {
            throw new ForbiddenException();
        }

        $user = $this->Auth->user();

        return $user["username"];
    }
      
    public function change_pass() {
        $user = $this->Auth->user();
        if($user["idGroup"] == 1) {
            $this->layout = "admin";
        } elseif($user["idGroup"] == 2) {
            $this->layout = "alumno";
        } elseif($user["idGroup"] == 3) {
            $this->layout = "apoderado";
        } elseif($user["idGroup"] == 4) {
            $this->layout = "docente";
        }
        if ($this->request->is(array("post", "put"))) {
            
            $user = $this->User->find("first", array(
                "conditions" => array(
                    "User.idUser" => $this->Auth->user()["idUser"]
                ),
                "fields" => array("password")
            ));
            $storedHash = $user['User']['password'];
            $newHash = Security::hash($this->request->data['User']['old_password'], 'blowfish', $storedHash);
            if($storedHash == $newHash) {
                if($this->request->data["User"]["new_password"] != $this->request->data["User"]["new_password_confirm"]) {
                    $this->Session->setFlash(__("Los password ingresados no coinciden"), "flash_bootstrap");
                    return;
                }
                $this->User->id = $this->Auth->user()["idUser"];
                if ($this->User->saveField("password", $this->request->data["User"]["new_password"]) ) {
                    $this->Session->setFlash(__("El password ha sido actualizado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("controller" => "Users", "action" => "change_pass"));
                }
            }
            $this->Session->setFlash(__("El password anterior no coincide"), "flash_bootstrap");
        }
    }
    
    public function datos() {
        $user = $this->Auth->user();
        if($user["Group"]["descripcion"] == "Administrador") {
            $this->set("admin", $user);
            $this->layout = "admin";
        } elseif($user["Group"]["descripcion"] == "Alumno") {
            $alumno = $this->User->Alumno->findByIduser($user["iduser"]);
            $this->set("alumno", $alumno);
            $this->layout = "alumno";
        } elseif($user["Group"]["descripcion"] == "Apoderado") {
            $apoderado = $this->User->Padre->findByIduser($user["iduser"]);
            $this->set("apoderado", $apoderado);
            $this->layout = "apoderado";
        } elseif($user["Group"]["descripcion"] == "Docente") {
            $docente = $this->User->Docente->findByIduser($user["iduser"]);
            $this->set("docente", $docente);
            $this->layout = "docente";
        }
    }
}