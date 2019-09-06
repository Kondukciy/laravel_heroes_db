<?php


namespace App\Repositories;

use App\Models\ImageHeroes as Model;
use Illuminate\Database\Eloquent\Collection;

class HeroesImagesRepository extends CoreRepository
{


    protected function getModelClass()
    {

        return Model::class;
    }

    public function getImageOnId($id)
    {
        return $this->startConditions()->where('heroes_id', $id)->get();
    }

    public function getMainImageOnId($id)
    {
        return $this->startConditions()->where('main', '1')->where('heroes_id', $id)->get();
    }

    public function deleteImage($id)
    {
        $model = $this->startConditions();
        $item = $model->find($id);
        $result = $model->where('id', $id)->delete();
        if (!empty($item)) {
            $deleteImage = 'image\\' . str_replace('/', '\\', $item->src);
            unlink(public_path($deleteImage));
        }
        return $result;
    }

    public function deleteAllImageOnHeroId($hero_id)
    {
        $model = $this->startConditions();
        $item = $model->where('heroes_id', $hero_id)->get();



        if (!empty($item)) {
            $result = $model->where('heroes_id', $hero_id)->delete();

            foreach ($item as $image) {
                $deleteImage = 'image\\' . str_replace('/', '\\', $image->src);
                unlink(public_path($deleteImage));
            }
        }
        return $result;
    }

    public function addMainImage($data, $id, $oldImages = null)
    {

        $model = $this->startConditions();
        if (file_exists('image/superman/superman.jpg')) {
            dd('kek');
        }
        $slug = \Str::slug($data['nickname']);
        $main_image = $data['main_hero_image'];
        $upload = $main_image->store($slug, 'public_uploads'); //upload image (get src)


        $dataMainImage = [
            'heroes_id' => $id,
            'src'       => $upload,
            'main'      => true,
        ];
        $result = $model->create($dataMainImage);//add image in DB

        /*
         * delete image from folder
         */
        //dd($oldImages);

        //dd($oldImage);
        if (!empty($result) && !empty($oldImages)) {
            foreach ($oldImages as $oldImage) {
                $model->where('id', $oldImage->id)->delete();
                $old_src_main_image = $oldImage->src;
                $deleteImage = 'image\\' . str_replace('/', '\\', $old_src_main_image);
                if (file_exists('image/' . $old_src_main_image)) {
                    unlink(public_path($deleteImage));
                }

            }
        }


    }

    public function addImagesInGallery($data, $id)
    {
        $images = $data['heroes_images'];
        $model = $this->startConditions();
        $slug = \Str::slug($data['nickname']);

        foreach ($images as $item_image) {
            $image = $item_image->store($slug, 'public_uploads');
            // dd($image);
            $dataImage = [
                'heroes_id' => $id,
                'src'       => $image,
                'main'      => false,
            ];
            //dd($dataImage);
            $result = $model->create($dataImage);
        }

    }


}
