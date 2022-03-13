<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacistStoreRequest;
use App\Http\Resources\PharmacistResource;
use App\Http\Resources\PharmacistSingleResource;
use App\Models\Pharmacist;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pharmacists = Pharmacist::all();

        if ($request->search) {
            $pharmacists = Pharmacist::where('first_name', "like", "%{$request->search}%")
            ->orWhere('last_name', "like", "%{$request->search}%")
            ->get();
        } elseif ($request->department_id) {
            $pharmacists = Pharmacist::where('department_id', $request->department_id)->get();
        }

        return PharmacistResource::collection($pharmacists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacistStoreRequest $request)
    {
        $pharmacist = Pharmacist::create($request->validated());

        return response()->json($pharmacist);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacist $pharmacist)
    {
        return new PharmacistSingleResource($pharmacist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PharmacistStoreRequest $request, Pharmacist $pharmacist)
    {
        $pharmacist->update($request->validated());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacist $pharmacist)
    {
        $pharmacist->delete();

        return response()->json('Record deleted Successfully');
    }
}
