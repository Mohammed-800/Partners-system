<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * النموذج الخاص بالمستخدمين في التطبيق.
 *
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * الخصائص التي يمكن تعبئتها في هذا النموذج.
     *
     * @var array
     */
    protected $fillable = [
        'name', // اسم المستخدم
        'email', // البريد الإلكتروني للمستخدم
        'password', // كلمة مرور المستخدم
    ];

    /**
     * الخصائص التي يجب أن تكون مخفية عند التسلسل.
     *
     * @var array
     */
    protected $hidden = [
        'password', // كلمة المرور
        'remember_token', // رمز التذكير (Remember Token)
    ];

    /**
     * تحويل أنواع البيانات للخصائص المحددة.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // تحويل البريد الإلكتروني المتحقق إلى نوع البيانات DateTime
    ];
}
