<?php

namespace App\Repositories;


/**
 * Class LinkRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
interface LinkRepositoryInterface
{

  public function getAllLinks();

  public function getShortLink($link);

  public function deleteLink($id);

  public function storeLink($data);

}
