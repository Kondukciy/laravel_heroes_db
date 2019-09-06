<?php


namespace App\Repositories;
use App\Models\Heroes as Model;
use Illuminate\Database\Eloquent\Collection;

class ResultRepository extends CoreRepository
{


    protected function getModelClass()
    {
        return Model::class;
    }

    public function checkResult($result,$redirect,$succesMsg,$errorMsg,$items=null){

        if ($result) {
            if(empty($items)){
                return redirect()->route($redirect)
                    ->with(['success' => $succesMsg]);
            }
            else{

                return redirect()->route($redirect,$items)
                    ->with(['success' => $succesMsg]);
            }

        } else {
            return back()->withErrors(['msg' => $errorMsg])
                ->withInput();
        }
    }



}
