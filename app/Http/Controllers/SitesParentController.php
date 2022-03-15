<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteParentRequest;
use App\Http\Requests\UpdateSiteParentRequest;
use App\Http\Resources\SiteParentResource;
use App\Models\SiteParent;
use Illuminate\Http\Request;

class SitesParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return SiteParentResource::collection(
            SiteParent::where('aireProteger','ilike',$request->input('search').'%')->paginate(15)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteParentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiteParentRequest $request)
    {
        $parent = SiteParent::create($request->all());
        return response([
            "message"=> "Parent created !",
            "data" => new SiteParentResource($parent)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteParent  $siteparent
     * @return \Illuminate\Http\Response
     */
    public function show(SiteParent $siteparent)
    {
        return new SiteParentResource($siteparent);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteParentRequest  $request
     * @param  \App\Models\SiteParent  $siteparent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiteParentRequest $request, SiteParent $siteparent)
    {
        $siteparent->update($request->all());
        return [
            "message"=>"Parent have been updated !",
            "data"=>new SiteParentResource($siteparent)
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteParent  $siteparent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteParent $siteparent)
    {
        $siteparent->delete();
        return ["message"=>"Parent have been deleted !"];
    }
}
