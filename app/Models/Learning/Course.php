<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // ------------------
    // METHODS
    // ------------------

    // Associate lessons. Can be single ID or array of IDs
    public function addLesson($lesson_id)
    {
        return $this->lessons()->attach($lesson_id);
    }

    //Disassociate lessons Can be single ID or array of IDs
    public function removeLesson($lesson_id)
    {
        return $this->lessons()->detach($lesson_id);
    }

    // Associate products. Can be single ID or array of IDs
    public function addToProduct($product_id)
    {
        return $this->products()->attach($product_id);
    }

    //Disassociate products Can be single ID or array of IDs
    public function removeFromProduct($product_id)
    {
        return $this->products()->detach($product_id);
    }


    // Enroll users. Can pass single ID or array of IDs
    public function addUser($user_id)
    {
        return $this->users()->attach($user_id);
    }

    // Unenroll users. Can pass single ID or array of IDs
    public function removeUser($user_id)
    {
        return $this->users()->detach($user_id);
    }

    // ------------------
    // RELATIONSHIPS
    // ------------------

    // A course belongs many lessons
    public function lessons()
    {
        return $this->belongsToMany('App\Models\Learning\Lesson')->withTimestamps();
    }

    // A course belongs to many products
    public function products()
    {
        return $this->belongsToMany('App\Models\Shop\Product')->withTimestamps();
    }
    // A course has many users
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    // A course belongs to a brand
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
