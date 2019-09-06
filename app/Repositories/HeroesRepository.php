<?php


namespace App\Repositories;
use App\Models\Heroes as Model;
use Illuminate\Database\Eloquent\Collection;

class HeroesRepository extends CoreRepository
{


    protected function getModelClass()
    {

        return Model::class;
    }

    public function getEdit($id){
        return $this->startConditions()->find($id);
    }


    public function getAllWithPaginate($perPage = 6){
        $columns = [
            'id',
            'nickname',
            'real_name',
            'slug',
            'origin_description',
            'superpowers',
            'catch_phrase',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            //->with(['category','user'])
            ->with([
                'heroesImages:id,heroes_id,src,main'
            ])
            ->paginate($perPage);

        return $result;
    }

    public function deleteHero($id){
        $model = $this->startConditions();
        $result = $model->where('id',$id)->delete();
        //$result1 = $model->heroesImage()->where('heroes_id',$id)->delete();
        //dd($result);
        return $result;
    }



}
