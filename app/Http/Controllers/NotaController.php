<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Estudiante;
use App\Models\Materia;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = Nota::with('materia.curso')->get();
        return view('notas.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        $materias = Materia::all();
        return view('notas.create', compact('estudiantes', 'materias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required|integer',
            'materia_id' => 'required|exists:materias,id',
            'estudiante_id' => 'required|exists:estudiantes,id',
        ]);

        Nota::create($request->all());
        return redirect()->route('notas.index')->with('success', 'Nota creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nota = Nota::findOrFail($id);
        $estudiantes = Estudiante::all();
        $materias = Materia::all();
        return view('notas.edit', compact('nota', 'estudiantes', 'materias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nota' => 'required|integer',
            'materia_id' => 'required|exists:materias,id',
            'estudiante_id' => 'required|exists:estudiantes,id',
        ]);

        $nota = Nota::findOrFail($id);
        $nota->update($request->all());
        return redirect()->route('notas.index')->with('success', 'Nota actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();
        return redirect()->route('notas.index')->with('success', 'Nota eliminada exitosamente');
    }
}
