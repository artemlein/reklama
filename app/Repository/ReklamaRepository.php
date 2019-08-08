<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use App\Reklama as Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *  Class BlogCategoryRepository
 *
 * @package App\Repository
 */
class ReklamaRepository extends CoreRepository
{
    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @retrurn Model
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить отчёт для редактирования
     *
     * @param $id
     * @return mixed
     */
    public function getForEdit($id){
        return $this->startConditions()->find($id);
    }
    public function Update($id, $request){
        $report = $this->startConditions()->find($id);

        if(empty($reports)){
            return false;
        }

        $data = $request->all();

        $result = $report->fill($data)->save();

        return $result;
    }
    /**
     * Получить список отчётов для вывода в списке
     *
     *
     * @return LengthAwarePaginator
     */
    public function getForShow($id){
        $result = $this->startConditions()->find($id);


        return $result;
    }

    /**
     * Получить список отчётов для вывода в списке
     *
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'name',
            'url',
            'price',
            'url',
            'like',
            'shows',
            'updateVideo',
            'subscribe',
            'vkId',
            'status',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->paginate(25);

        /*//Отношение возникает только при его вызове
        $post = $result->first();

        $userId = $post->user->id;
        dd($post,$userId);
        $post->category->id;
        dd($result->first());*/
        return $result;
    }

    /**
     * Передаётся id пользователя для поиска
     *
     * @param $id
     */
    public function getReportForSearch($muted_url){

        $columns = [
            'id',
            'muted_url',
            'reason',
            'moderate',
        ];
        $result = $this->startConditions()->with(['reason:id,title'])->where('muted_url', '=', $muted_url)
            ->get();

        return $result;
    }

    public function AcceptChannel($id){
        $channel = $this->startConditions()->find($id);

        $channel->status = 1;

        $result = $channel->save();

        return $result;
    }

    public function DeclineChannel($id){
        $channel = $this->startConditions()->find($id);

        $channel->status = -1;

        $result = $channel->save();

        return $result;
    }
    /**
     * Удаляет отчёт
     *
     * @param $id
     */
    public function DestroyReport($id){
        $report = $this
            ->startConditions()
            ->find($id);

        $report->delete();

        return true;
    }
}