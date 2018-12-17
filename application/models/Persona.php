<?php

class Persona extends CI_Model {

    public function getAll() {
        return $this->db->get('Persona')->result();
    }
    
    public function insert($data) {
        $this->db->insert('Persona', $data);
        return $this->db->insert_id();
    }
    
    public function getDataById($id) {
        $this->db->where('id', $id);
        return $this->db->get('Persona')->row();
    }
    
    public function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('Persona', $data);
        return true;
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('Persona');
        return true;
    }

    public function getExcelData()
    {
        $this->db->select('dni, apellido, nombre, domicilio, email, telefono, fecha_nacimiento');
        $this->db->from('persona');
        $query = $this->db->get();
        $fields = $query->list_fields(); 
        return array('fields' => $fields,'query' => $query);    
    }

}