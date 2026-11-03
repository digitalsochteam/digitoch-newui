<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'employeeDetails';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'loginId',
        'employeeName',
        'employeeFatherName',
        'contactNumber',
        'altcontactNumber',
        'emailId',
        'altemailId',
        'dateOfBirth',
        'gender',
        'address',
        'panNumber',
        'aadharNumber',
        'pan_img_upload',
        'aadhar_img_upload',
        'profile_img_upload',
        'empCode',
        'profile_id',
        'joiningDate',
        'confirmationDate',
        'branch',
        'yearOfExp',
        'uanNumber',
        'bankAccountNumber',
        'bankIfscCode',
        'cheque_img_upload',
        'certificates_img_upload',
        'appointment_img_upload',
        'oragnation_img_upload',
        'status',
        'passExpiryDate',
        'password',
        'vpassword',
        'resignDate',
        'resignReason',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'dateOfBirth' => 'date',
        'joiningDate' => 'date',
        'confirmationDate' => 'date',
        'passExpiryDate' => 'date',
        'yearOfExp' => 'integer',
    ];


    public function hasPermission(string $permission): bool
    {
        $profile = $this->profile;

        if (!$profile)
            return false;

        $rolePermissions = $profile->roles->flatMap(function ($role) {
            return $role->permissions;
        });

        $extraPermissions = $profile->permissions ?? collect();

        return $rolePermissions
            ->merge($extraPermissions)
            ->pluck('name')
            ->unique()
            ->contains($permission);
    }
}