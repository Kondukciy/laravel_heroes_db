<?php

namespace App\Http\Controllers\Heroes;

use App\Models\ImageHeroes;
use App\Repositories\HeroesImagesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroesImagesController extends Controller
{
    private $heroesImagesRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {


        $this->heroesImagesRepository = app(HeroesImagesRepository::class);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->heroesImagesRepository->deleteImage($id);

        if ($result) {
            return back()
                ->with(['success' => 'Image deleted']);
        } else {
            return back()->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }
}
