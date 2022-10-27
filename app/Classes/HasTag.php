<?php

namespace App\Classes;

use App\Models\Tag;
use App\Models\Taggable;

trait HasTag
{
    public function Addtag(string $tag)
    {

        $tag = rtrim($tag, ',');
        //dd($tag);
        $tags = explode(',', $tag);
        $oldtags = $this->getTag($this->tags);
        $deltags = array_diff($oldtags, $tags);

        if (!is_null($deltags)) {
            foreach ($deltags as $item) {
                $tag = Tag::where('name', $item)->first();
                $tag->decrement('weight');
                Taggable::where('tag_id', $tag->id)->where('taggable_id', $this->id)->where('taggable_type', get_class())->delete();
            }
        }

        if (!is_null($tags)) {
            foreach ($tags as $item) {
                $item = trim($item);
                if (!empty($item)) {
                    $tag = Tag::firstOrCreate([
                        'name' => $item,
                        'slug' => Slug::slugify($item)
                    ]);

                    $new = Taggable::firstOrCreate([
                        'tag_id' => $tag->id,
                        'taggable_id' => $this->id,
                        'taggable_type' => get_class(),
                    ]);
                    if ($new->wasRecentlyCreated) $tag->increment('weight');
                }
            }
        }
    }

    protected function getTag($oldtag)
    {
        $arr = [];
        if (is_null($oldtag)) {
            return null;
        } else {
            foreach ($oldtag as $item) {
                $arr[] = $item->name;
            }
            return $arr;
        }
    }

    public function Deltag()
    {
        if (!is_null($this->tags)) {
            foreach ($this->tags as $item) {
                $tag = Tag::where('name', $item->name)->first();
                if ($tag->id) {
                    $tag->decrement('weight');
                    Taggable::where('tag_id', $tag->id)->where('taggable_id', $this->id)->where('taggable_type', get_class())->delete();
                }
            }
        }
    }
}
