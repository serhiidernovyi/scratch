<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\Filterable;
use Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\HasCustomApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property-read int id
 * @property String name
 * @property String surname
 * @property String password
 * @property String email
 * @property String phone
 * @property String postal_code
 * @property String city
 * @property String street
 * @property String bank_account
 * @property String social_security
 * @property float salary_per_hour
 *
 * @method filter(mixed $filter)
 * @method static UserFactory factory($count = null, $state = [])
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasCustomApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRolesAndAbilities;
    use SoftDeletes;
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'phone',
        'postal_code',
        'city',
        'street',
        'bank_account',
        'social_security',
        'salary_per_hour',
        'deleted_at',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Find the user instance for the given username.
     *
     * @param string $email
     *
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->where('email', strtolower($email))->first();
    }
}
