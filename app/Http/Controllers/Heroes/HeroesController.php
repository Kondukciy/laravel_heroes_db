<?php

namespace App\Http\Controllers\Heroes;

use App\Http\Requests\HeroesCreateRequest;
use App\Http\Requests\HeroesUpdateRequest;
use App\Models\Heroes;
use App\Models\ImageHeroes;
use App\Repositories\HeroesImagesRepository;
use App\Repositories\HeroesRepository;
use App\Repositories\ResultRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class HeroesController extends Controller
{

    private $heroesRepository;
    private $heroesImagesRepository;
    private $resultRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->heroesRepository = app(HeroesRepository::class);
        $this->heroesImagesRepository = app(HeroesImagesRepository::class);
        $this->resultRepository = app(ResultRepository::class);

    }

    public function index()
    {


        $paginator = $this->heroesRepository->getAllWithPaginate(5);

        // $images = ImageHeroes::all();

        return view('heroes.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Heroes();
        return view('heroes.form.edit', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeroesCreateRequest $request)
    {

        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['nickname']);
        }

        $result = (new Heroes())->create($data);


        if (isset($data['main_hero_image'])) {
            $resultAddMain = $this->heroesImagesRepository->addMainImage($data, $result->id);
        }
        if (isset($data['heroes_images'])) {
            $resultAddInGallery = $this->heroesImagesRepository->addImagesInGallery($data, $result->id);
        }
       return $this->resultRepository->checkResult($result,'heroes.edit','Successfully Saved','Save error',$result->id);

//        if ($result) {
//            return redirect()->route('heroes.edit', $result->id)
//                ->with(['success' => 'Successfully Saved']);
//        } else {
//            return back()->withErrors(['msg' => 'Save error'])
//                ->withInput();
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->heroesRepository->getEdit($id);
        if(!empty($item)){
            $gallery = $this->heroesImagesRepository->getImageOnId($id);
            $mainImage = $this->heroesImagesRepository->getMainImageOnId($id);
            return view('heroes.hero', compact('item','gallery','mainImage'));
        }
        else{
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->heroesRepository->getEdit($id);
        // dd($item);
        if (empty($item)) {
            abort(404);
        }
        return view('heroes.form.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HeroesUpdateRequest $request, $id)
    {

        $data = $request->all();
        $item = $this->heroesRepository->getEdit($id);

        if (isset($data['main_hero_image'])) {

            $oldMainImage = $this->heroesImagesRepository->getMainImageOnId($id);
            $resultAddMain = $this->heroesImagesRepository->addMainImage($data, $id, $oldMainImage);
        }
        if (isset($data['heroes_images'])) {
            $resultAddInGallery = $this->heroesImagesRepository->addImagesInGallery($data, $id);
        }
        /*
         * Обсервер
         */
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=({$id}) не найдена"])
                ->withInput();
        }


        $result = $item->update($data);
        return $this->resultRepository->checkResult($result,'heroes.edit','Successfully Saved','Save error',$item->id);

//
//        if ($item) {
//            return redirect()->route('heroes.edit', $item->id)
//                ->with(['success' => 'Successfully Saved']);
//        } else {
//            return back()->withErrors(['msg' => 'Save error'])
//                ->withInput();
//        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->heroesImagesRepository->deleteAllImageOnHeroId($id);
        if($result){
            $this->heroesRepository->deleteHero($id);
        }
        return $this->resultRepository->checkResult($result,'heroes.index','Successfully deleted','Delete error');
//        if ($result) {
//            return redirect()->route('heroes.index')
//                ->with(['success' => 'Successfully deleted']);
//        } else {
//            return back()->withErrors(['msg' => 'Delete error'])
//                ->withInput();
//        }

    }
}
