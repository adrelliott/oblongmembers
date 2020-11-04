<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // ------------------
    // METHODS
    // ------------------

    // A product can add courses. Accepts id or array of ids
    public function addCourse($course_id)
    {
        return $this->courses()->attach($course_id);
    }

    // A product can remove courses. Accepts id or array of ids
    public function removeCourse($course_id)
    {
        return $this->courses()->detach($course_id);
    }

    // A product can be sold to (or given to) a users. Accepts id or array of ids
    public function addUser($user_id)
    {
        return $this->users()->attach($user_id);
    }

    // A product can remove from a users. Accepts id or array of ids
    public function removeUser($user_id)
    {
        return $this->users()->detach($user_id);
    }





    //--------------
    // Relationships
    //--------------

    public function courses()
    {
        return $this->belongsToMany('App\Models\Learning\Course')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    // A product is accoiated with some brands
    public function owners()
    {
        return $this->belongsToMany('App\Models\Brand')->withTimestamps();
    }
}
