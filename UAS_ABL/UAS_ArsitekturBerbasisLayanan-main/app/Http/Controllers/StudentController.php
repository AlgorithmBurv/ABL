<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get : menampilkan data secara keseluruhan
        $students = Student::all();
        return response()->json(['data' => $students, 'message' => 'Data berhasil ditampilkan']);
    
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create : menambahkan data 
        $student = Student::create([
            'nim'=> $request->nim,
            'nama_mahasiswa'=> $request->nama_mahasiswa,
            'jurusan'=> $request->jurusan,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'semester'=> $request->semester,
            'alamat'=> $request->alamat,
         
        ]);
        return response()->json(['data' => $student,  'message' => 'Data berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
      //show: menampilkan data tertentu dengan parameter
        return response()->json(['data' => $student,  'message' => 'Data berhasil ditampilkan']);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //update : memperbarui data tertentu
        $student->nim= $request->nim;
        $student->nama_mahasiswa= $request->nama_mahasiswa;
        $student->jurusan= $request->jurusan;
        $student->jenis_kelamin= $request->jenis_kelamin;
        $student->semester= $request->semester;
        $student->alamat= $request->alamat;
        $student->save();
 
        return response()->json(['data' => $student,  'message' => 'Data berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //delete : menghapus data tertentu
        $student->delete();

        return response()->json([ 'message' => 'Data berhasil didelete'],204);
    }
}
