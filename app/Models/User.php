<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    // ------------------
    // METHODS
    // ------------------

    // A user can join a membership (brand). Accepts id or array of ids
    public function joinMembership($membership_id)
    {
        return $this->memberships()->attach($membership_id);
    }

    // A user can unjoin a membership (brand). Accepts id or array of ids
    public function unjoinMembership($membership_id)
    {
        return $this->memberships()->detach($membership_id);
    }


    // A user can buy a product. Accepts id or array of ids
    public function buyProduct($product_id)
    {
        return $this->products()->attach($product_id);
    }

    // A user can unbuy a product (brand). Accepts id or array of ids
    public function unbuyProduct($product_id)
    {
        return $this->products()->detach($product_id);
    }

    // A user can enroll in a course. Accepts id or array of ids
    public function startCourse($course_id)
    {
        return $this->courses()->attach($course_id);
    }

    // A user can unenroll in a course (brand). Accepts id or array of ids
    public function unstartCourse($course_id)
    {
        return $this->courses()->detach($course_id);
    }

    // A user can complete a course.
    // ****Accepts only id***
    public function completeCourse($course_id)
    {
        return $this->courses()->updateExistingPivot($course_id, [
            'completed_at' => now()
        ]);
    }

    // A user can uncomplete a  course.
    // ****Accepts only id***
    public function uncompleteCourse($course_id)
    {
        return $this->courses()->updateExistingPivot($course_id, [
            'completed_at' => null
        ]);
    }

    // A user can start a lesson. Accepts id or array of ids
    public function startLesson($lesson_id)
    {
        return $this->lessons()->attach($lesson_id);
    }

    // A user can unstart a lesson (brand). Accepts id or array of ids
    public function unstartLesson($lesson_id)
    {
        return $this->lessons()->detach($lesson_id);
    }

    // A user can complete a lesson.
    // ****Accepts only id***
    public function completeLesson($lesson_id)
    {
        return $this->lessons()->updateExistingPivot($lesson_id, [
            'completed_at' => now()
        ]);
    }

    // A user can uncomplete a lesso
    // ****Accepts only id***
    public function uncompleteLesson($lesson_id)
    {
        return $this->lessons()->updateExistingPivot($lesson_id, [
            'completed_at' => null
        ]);
    }




    // ------------------
    // RELATIONSHIPS
    // ------------------

    // A user can have many memberships (belong to many brands)
    public function memberships()
    {
        return $this->belongsToMany('App\Models\Brand')->withTimestamps();
    }

    // A user can have access to many products
    public function products()
    {
        return $this->belongsToMany('App\Models\Shop\Product')->withTimestamps();
    }

    // A user can start many courses
    public function courses()
    {
        return $this->belongsToMany('App\Models\Learning\Course')->withTimestamps();
    }

    // A user can start many lessons
    public function lessons()
    {
        return $this->belongsToMany('App\Models\Learning\Lesson')->withTimestamps();
    }
}
