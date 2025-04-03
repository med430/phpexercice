<?php
interface IRepository {
    public function findAll();
    public function findById($id);
    public function create($params);
    public function delete($id);
}