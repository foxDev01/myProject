<?php
namespace App\Service;
use App\Models\Proj;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjService 

{   
    public function store( $data)
    {
        try{
            
            Db::beginTransaction();
            if (isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
    
            $data['preview_image']= Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image']= Storage::disk('public')->put('/images', $data['main_image']);
            $proj = Proj::firstOrCreate($data);
            if (isset($tagIds)){
                $proj->tags()->attach($tagIds);
            }
            Db::commit();
            } catch (\Exception $exception){
                Db::rollBack();
                abort(500);
            }

    }
    public function update($data, $proj)
    {
        try{
            Db::beginTransaction();
            if (isset($data['tag_ids'])){
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])){
                $data['preview_image']= Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])){
                $data['main_image']= Storage::disk('public')->put('/images', $data['main_image']);
            }
            
            $proj->update($data);
            
            if (isset($tagIds)){
                $proj->tags()->sync($tagIds);
            }
            Db::commit();
        } catch(Exception $exception){
            Db::rollBack();
            abort(500);
        }
       
        return $proj;
    }
   
}