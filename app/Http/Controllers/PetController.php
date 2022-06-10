<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Http\Requests\PetPostRequest;

class PetController extends Controller
{

    /**
     * retorna a lista de pets cadastrados
     * 
     * @return "Collection"
     * 
     */
    public function index() {
       return Pet::get();
    }

    /**
     * Cria um pet 
     * 
     * @param "PetRequest $request"
     * @return "Pet Model"
     */

    public function store(PetPostRequest $request) {

        $data = $request->all();
        $query = Pet::create($data);

        return $query;

    }
}
