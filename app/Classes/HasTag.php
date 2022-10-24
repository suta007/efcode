<?php

namespace App\Classes;

use App\Models\Tag;
use App\Models\Taggable;

trait HasTag
{
    public function Addtag(array $posttag = [])
    {

        foreach ($posttag as $item) {
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
