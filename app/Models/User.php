<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'user_name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getBudgetsAttribute() {
        $pp = ProcurementPlan::getActive();

        if(!$pp) return [];

        $budgets = [];

        foreach(Department::where('user_id', $this->id)->get() as $dept) {
            $budget = Budget::where('procurement_plan_id', $pp->id)
                    ->where('department_id', $dept->id)->first();
            if($budget==null) {
                $budget = Budget::create([
                    'procurement_plan_id' => $pp->id,
                    'department_id' => $dept->id,
                ]);
            }

            $budget->load('department');

            $budgets[] = $budget;
        }

        return $budgets;
    }
}
