<?php

namespace App\Repositories;

use App\Repositories\Eloquent\User;
use App\Repositories\Eloquent\Collection;
use Goutte\Client as Client;

class CollectionRepository
{
    protected $html;
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function findOrFail($collectionId)
    {
        return Collection::findOrFail($collectionId);
    }

    public function fetch($url)
    {
        return $this->client->request('GET', $url);
    }

    public function getNodes($html)
    {
        $nodes = [];
        $nodes['title'] = $html->filter('h1')->text();
        try {
            $nodes['image'] = $this->getImage($html);
        } catch (\Exception $e) {
            //TODO Implement exception
            \Log::warning($e->getMessage());
            $nodes['image'] = '';
        }
        return $nodes;
    }

    public function getImage($html)
    {
        //TODO Complete path the case root_rel, rel and abs
        $path = $html->filter('h1 img')->attr('src');
        return $path;
    }

    public function create($attributes)
    {
        return Collection::create($attributes);
    }

    public function update($shelfId, $collectionId)
    {
        $collection = $this->findOrFail($collectionId);
        $collection->shelf_id = $shelfId;
        $collection->save();
        return $collection;
    }

    public function delete($collectionId)
    {
        Collection::destroy($collectionId);
    }
}
