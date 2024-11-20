<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
       
        $data = [
            'students' => $students,
            'status' => 200
        ]; // Se agregó el punto y coma
        return response()->json($data, 200);
    }
    
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:students',
            'phone' => 'required|string|max:255|unique:', // Agregada la coma al final de esta línea
            'language' => 'required|string|max:255'
        ]);
        
        if ($validator->fails()) {
            $data = [
                'message' => 'Error al obtener datos',
                'errors' => $validator->errors(),
                'status' => 400
            ]; // Se agregó el punto y coma
            return response()->json($data, 400);
        }
        
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language
        ]);
        
        if (!$student) {
            $data = [
                'message' => 'Error al crear estudiante',
                'errors' => null,
                'status' => 500
            ]; // Se agregó el punto y coma
            return response()->json($data, 500);
        }
        
        $data = [
            'message' => 'Estudiante creado correctamente',
            'data' => $student,
            'status' => 201
        ]; // Se agregó el punto y coma
        return response()->json($data, 201);
    }
}
