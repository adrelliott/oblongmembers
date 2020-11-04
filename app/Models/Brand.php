<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Brand extends Model
{
    use HasFactory;


    // ------------------
    // METHODS
    // ------------------


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

    // Associate products. Can be single ID or array of IDs
    public function addProduct($product_id)
    {
        return $this->products()->attach($product_id);
    }

    //Disassociate products Can be single ID or array of IDs
    public function removeProduct($product_id)
    {
        return $this->products()->attach($product_id);
    }





    // ------------------
    // RELATIONSHIPS
    // ------------------

    // A brand has many members (users)
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    // A brand has many products
    public function products()
    {
        return $this->belongsToMany('App\Models\Shop\Product')->withTimestamps();
    }

    // A brand has many courses
    public function courses()
    {
        return $this->hasMany('App\Models\Learning\Course');
    }

    // A brand has many lessons
    public function lessons()
    {
        return $this->hasMany('App\Models\Learning\Lesson');
    }

    // A brand has many resources
    public function resources()
    {
        return $this->hasMany('App\Models\Interactive\Resource');
    }

    // A brand has many tasks
    public function tasks()
    {
        return $this->hasMany('App\Models\Interactive\Task');
    }
}
