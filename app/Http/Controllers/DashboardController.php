<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Contract;
use App\Models\Material;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $lMaterials = Material::orderby('quantity', 'asc')->take(10)->get();
        $tContracts = Contract::select(DB::raw('count(*) as amount, date as date'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(30)
            ->get();
        $fMaterial = Material::join('contract_material as cm', 'cm.material_id', '=', 'material.id')
            ->select('material.name', DB::raw('SUM(cm.quantity) as amount'))
            ->groupBy('cm.material_id', 'material.name')
            ->orderBy('amount','desc')
            ->first();
        $lMaterial = Material::join('contract_material as cm', 'cm.material_id', '=', 'material.id')
            ->select('material.name', DB::raw('SUM(cm.quantity) as amount'))
            ->groupBy('cm.material_id', 'material.name')
            ->orderBy('amount','asc')
            ->first();
        return view('dashboard')
            ->with('lMaterials', $lMaterials)
            ->with('tContracts',$tContracts)
            ->with('fMaterial',$fMaterial)
            ->with('lMaterial',$lMaterial);
    }
    //
}
