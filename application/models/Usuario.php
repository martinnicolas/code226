<?php

class Usuario extends CI_Model {

    public function getAll() {
        return $this->db->get('Usuario')->result();
    }
    
    public function insert($data) {
        $this->db->insert('Usuario', $data);
        return $this->db->insert_id();
    }
    
    public function getDataById($id) {
        $this->db->where('id', $id);
        return $this->db->get('Usuario')->row();
    }
    
    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('Usuario', $data);
        return true;
    }
    
    public function cambiar_estado($id) {
        $Usuario=$this->getDataById($id);
             if($Usuario->habilitado=='NO')
             {
                $this->update($id,array('habilitado' => 'SI'));
                return "Usuario habilitado";
             }else{
                $this->update($id,array('habilitado' => 'NO'));
                return "Usuario deshabilitado";
             }
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('Usuario');
        return true;
    }

    public function getExcelData()
    {
        $this->db->select('nombre, clave, fecha_creacion, ultimo_acceso');
        $this->db->from('usuario');
        $query = $this->db->get();
        $fields = $query->list_fields(); 
        return array('fields' => $fields,'query' => $query);    
    }

}