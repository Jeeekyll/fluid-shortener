<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Link;


/**
 * Class LinkRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LinkRepository extends BaseRepository implements LinkRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Link::class;
    }

    public function getAllLinks()
    {
        return Link::all();
    }

    public function getShortLink($link)
    {
        return Link::where('short_link', $link)->first();
    }

    public function deleteLink($id)
    {
        return Link::findOrFail($id)->delete();
    }

    public function storeLink($data)
    {
        return Link::create($data);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
