<?php

class DataModel
{

    private $table = 'data';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getDataById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function createData($data)
    {
        $query = "INSERT INTO data VALUES ('', :name, :nim, :email, :program)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('program', $data['program']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteData($id)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editData($data)
    {

        $query = "UPDATE " . $this->table . " SET name = :name, nim = :nim, email =:email, program = :program WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':nim', $data['nim']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':program', $data['program']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
