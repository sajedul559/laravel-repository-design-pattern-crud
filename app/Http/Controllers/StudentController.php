<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\Controller;

use App\Repository\Student\StudentInterface;
use Illuminate\Support\Facades\View;
use function is_null;
use function redirect;

class StudentController extends Controller
{
    
    protected $student;
    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }

    public function index(){
        if(View::exists('student.index')){
            return \view('student.index',[
                'students'=>$this->student->getAllData(),
                'trashed' =>$this->student->getAllTrashedData()
            ]);
        }
    }

    public function storeOrUpdate(Request $request, $id = null){
        $data = $request->only(['name','roll']);
        if(!is_null($id)){
            $this->student->storeOrUpdate($id, $data);
            return redirect()->route('student.index')->with('message','data Updated');
        }
        else{
            $this->student->storeOrUpdate($id = null, $data);
            return redirect()->route('student.index')->with('message','data Inserted');

        }
    }
        public function view($id)
        {
            if(View::exists('student.edit')){
                return view('student.edit',['student'=> $this->student->view($id)]);
            }
        }
    
        public function delete($id){
            $this->student->delete($id);
            return redirect()->route('student.index')->with('message','data Deleted');

        }
        public function restoreData($id){
            $this->student->restoreData($id);
            return redirect()->route('student.index')->with('message','Data Restored!');
        }
    
        public function permanentDelete( $id){
            $this->student->permanentDelete($id);
            return redirect()->route('student.index')->with('message','Data Delete Permanent!');
        }
}
