<?php 
namespace App\Repository\User;
use App\Models\User;


class UserRepository implements UserInterface{

    public function getAllData(){
        return User::latest()->get();
    }
    public function storeOrUpdate($id = null, $data){
        if(is_null($id)){
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->save();

        }
        else{
            $user = User::find($id);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->save();
        }
    }

    public function getAllTrashedData()
    {
        return User::onlyTrashed()->latest()->get();
    }
    public function view($id){
        return User::find($id);
    }

    public function delete($id){
        return User::find($id)->delete();
    }
    public function restoreData($id){

        return User::withTrashed()->find($id)->restore();
    }
   
    public function permanentDelete($id)
    {
        return User::withTrashed()->find($id)->forceDelete();
    }

}

?>