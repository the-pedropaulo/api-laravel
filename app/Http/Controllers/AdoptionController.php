<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Http\Resources\AdoptionCollection;
use App\Rules\UniqueAdoptionRule;

class AdoptionController extends Controller
{   

    public function index() {

        $adoption = Adoption::with('pet')->get(); 

        return new AdoptionCollection($adoption);

    }

    /**
     * Cria um novo registro de adoção
     * 
     * @param Request $request
     * @return "Adoption Model"
     */
    public function store(Request $request) {
    
        $request->validate([
            'email' => ['required', 'string', new UniqueAdoptionRule($request->input('pet_id', 0))],
            'valor' => ['required','numeric','between:10,100'],
            'pet_id' => ['required','int','exists:pets,id']
        ]);
                

        $data = $request->all();
        $query = Adoption::create($data);

        return $query;
    }

}
