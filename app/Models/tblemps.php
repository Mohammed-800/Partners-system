<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class tblemps
 *
 * هذه الفئة تمثل نموذج لموظفين (Employees).
 *
 * @package App\Models
 */
class tblemps extends Model
{
    use HasFactory;

    /**
     * الخصائص التي يمكن تعبئتها في هذا النموذج.
     *
     * @var array
     */
    protected $fillable = [
        'emp_name', // اسم الموظف
        'emp_email', // البريد الإلكتروني للموظف
        'emp_PhoneNumber', // رقم الهاتف للموظف
        'emp_Created_by', // الشخص الذي أنشأ الموظف
        'emp_desc', // وصف الموظف
        'mainpartner_id', // معرف الشريك الرئيسي
    ];
}
