<?php 
namespace App\Repository\User;
use App\Models\User;

interface UserInterface {

    public function storeOrUpdate($id = null, $data);
    public function getAllData();
    public function getAllTrashedData();
    public function delete($id);
    public function restoreData($id);
    public function permanentDelete($id);
    public function view($id);
}








?>