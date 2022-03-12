<?php

namespace App\Http\Controllers;

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
}
