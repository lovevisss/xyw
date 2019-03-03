<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
class PostImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|Post
    */
    public function model(array $row)
    {

            return new Post([
                'author_id' => 1,
                'category_id' => 2,
                'title' => $row['contenttitle'],
                'body'       => $row['contentfull'],
                'slug' => $row['id'],
                'created_at' => Carbon::createFromTimestamp($row['publishtime']),
                'updated_at' => Carbon::createFromTimestamp($row['publishtime']),

            ]);


    }
}
