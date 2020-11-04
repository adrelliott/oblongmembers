<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    // ------------------
    // METHODS
    // ------------------

    // Associate resources. Can be single ID or array of IDs
    public function addResource($resource_id)
    {
        return $this->resources()->attach($resource_id);
    }

    //Disassociate resources Can be single ID or array of IDs
    public function removeResource($resource_id)
    {
        return $this->resources()->detach($resource_id);
    }

    // Associate tasks. Can be single ID or array of IDs
    public function addTask($task_id)
    {
        return $this->tasks()->attach($task_id);
    }

    //Disassociate tasks Can be single ID or array of IDs
    public function removeTask($task_id)
    {
        return $this->tasks()->detach($task_id);
    }

    // Associate courses. Can be single ID or array of IDs
    public function addToCourse($course_id)
    {
        return $this->courses()->attach($course_id);
    }

    //Disassociate courses Can be single ID or array of IDs
    public function removeFromCourse($course_id)
    {
        return $this->courses()->detach($course_id);
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

    // A lessons can belong to many courses
    public function courses()
    {
        return $this->belongsToMany('App\Models\Learning\Course')->withTimestamps();
    }

    // A lesson may belong to many resources
    public function resources()
    {
        return $this->belongsToMany('App\Models\Interactive\Resource')->withTimestamps();
    }

    // A course has many users
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }


    // A lesson has many tasks
    public function tasks()
    {
        return $this->belongsToMany('App\Models\Interactive\Task')->withTimestamps();
    }

    // A lesson belongs to a brand
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
