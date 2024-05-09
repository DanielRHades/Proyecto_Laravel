<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'contract_id_record' => 'required|exists:contract,id',

        ]);


        $record = new Record();
        $record->date = $validatedData['fecha'];
        $record->description = $validatedData['descripcion'];
        $record->contract_id = $validatedData['contract_id_record'];

        $record->save();

        return redirect()->route('contratos')->with('success', 'Contrato agregado exitosamente.');
    }
}