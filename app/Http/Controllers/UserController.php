<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\User\UserInterface;
use Illuminate\Support\Facades\View;

use App\Models\User;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserInterface $user){
        $this->user = $user;
    }
    
    public function index(){
        if(View::exists('user.index')){
            return \view('user.index',[
                'users'=>$this->user->getAllData(),
                'trashed'=>$this->user->getAllTrashedData()

            ]);
        }
    }
    public function storeOrUpdate(Request $request, $id = null){
       // $data = $request->only(['name','email','password']);
       $data = $request->all();
        if(!is_null($id)){
            $this->user->storeOrUpdate($id, $data);
            return redirect()->route('user.index')->with('message','data Updated');
        }
        else{
            $this->user->storeOrUpdate($id = null, $data);
            return redirect()->route('user.index')->with('message','data Inserted');

        }
    }
    public function view($id){
       $user =  $this->user->view($id);
        return view('user.edit',compact('user'));
    }
    public function delete($id){
        $this->user->delete($id);
        return redirect()->route('user.index')->with('message','data Deleted');

    }
    public function restoreData($id){
        $this->user->restoreData($id);
        return redirect()->route('user.index')->with('message','data Deleted');


    }
    public function permanentDelete($id)
    {
        $this->user->permanentDelete($id);
        return redirect()->route('user.index')->with('message','data Deleted');

    }
}
