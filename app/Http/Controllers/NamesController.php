<?php

namespace App\Http\Controllers;

use App\Http\Resources\NameResource;
use App\Models\NomCommun;
use App\Models\NomScientifique;
use App\Models\NomVernaculaire;
use Illuminate\Http\Request;

class NamesController extends Controller
{
    public function deleteName($type, $id){
        switch ($type) {
            case 'vernaculaires':
                NomVernaculaire::destroy($id);
                return ["message"=>"vername deleted !"];
            case 'communs':
                NomCommun::destroy($id);
                return ["message"=>"comname deleted !"];
            case 'scientifiques':
                NomScientifique::destroy($id);
                return ["message"=>"sciname deleted !"];
            default:
                return response(["message"=>"Unknown operation","errors"=>["operation"=>["this operation is not supported"]]],404);
                break;
        }
    }

    public function getName(Request $request, $type){
        switch ($type) {
            case 'vernaculaires':
                return NameResource::collection(
                    NomVernaculaire::where('nom','ilike',$request->input('search').'%')
                );
            case 'communs':
                
                return NameResource::collection(
                    NomCommun::where('nom','ilike',$request->input('search').'%')
                );
            case 'scientifiques':
                return NameResource::collection(
                    NomScientifique::where('nom','ilike',$request->input('search').'%')
                );
            default:
                return response(["message"=>"Unknown operation","errors"=>["operation"=>["this operation is not supported"]]],404);
                break;
        }
    }
}
