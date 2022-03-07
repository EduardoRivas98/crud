<?php 
class Crud_model extends CI_Model {


public function get_entries() //es el que funcionara como las vistas de los ultimos agregados
{
        $query = $this->db->get('facturas');
        if (count($query->result()) > 0){
            return $query->result();
        }
}

public function insert_entry($data)
{
        return $this->db->insert('facturas', $data); //insert BD
}

public function delete_entry($id){
   return $this->db->delete('facturas',array('id' => $id));
}

public function single_entry($id) //generamos un select para tomar los datos que posteriormente serán editado
{
    $this->db->select('*');
    $this->db->from('facturas');
    $this->db->where('id', $id);
    $query = $this->db->get();
    if (count($query->result()) > 0) {
        return $query->row();
    }
}

public function update_entry($data)
{
        return $this->db->update('facturas', $data, array('id' => $data['id']));
}

}
?>