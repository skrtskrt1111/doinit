<?php

namespace App\Filters;

class TaskFilter extends QueryFilter{
    public function category_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('category_id', $id);
        });
    }

    public function search_field($search_string = ''){
        return $this->builder
            ->where('category_id', 'LIKE', '%'.$search_string.'%')
            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
    }
}
