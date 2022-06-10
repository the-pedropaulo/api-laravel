<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Http\Requests\AdoptionPostRequest;
use App\Http\Resources\AdoptionCollection;
use App\Http\Resources\AdoptionResource;

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
    public function store(AdoptionPostRequest $request) {
    

        $data = $request->all();
        $query = Adoption::create($data);

        return $query;
     }
}
