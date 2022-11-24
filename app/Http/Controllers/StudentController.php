<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
     # method index - get all resources
     public function index()
     {
         # menggunakan model Student untuk select data
         $students = Student::all();
 
         $data = [
             'message' => 'Get all students',
             'data' => $students,
         ];
 
         # menggunakan response json laravel
         # otomatis set header content type json
         # otomatis mengubah data array ke JSON
         # mengatur status code
         return response()->json($data, 200);
     }
 
     # menambahkan resource student
     # membuat method store
     public function store(Request $request)
     {
         # menangkap data request
         $input = [
             'nama' => $request->nama,
             'nim' => $request->nim,
             'email' => $request->email,
             'jurusan' => $request->jurusan,
         ];
 
         # menggunakan Student untuk insert data
         $student = Student::create($input);
 
         $data = [
             'message' => 'Student is created successfully',
             'data' => $student,
         ];
 
         # mengembalikan data (json) status code 201
         return response()->json($data, 201);
     }
     public function update(Request $request, $id){
        $input=[
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
       ];

       Student::find($id)->update($input);
       $student=Student::find($id);

       $data=[
        'message' => 'Student berhasil diupdate',
        'data' => $student,
       ];

       return response()->json($data,200);
    }

    public function destroy($id){
        $student = Student::FindorFail($id);
        if($student->delete()){
            return response(["Berhasil Menghapus data"]);
        }else{
            return response(["Berhasil Menghapus data"]);
        }
    }
}