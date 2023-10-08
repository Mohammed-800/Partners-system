<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * النموذج الرئيسي للشركاء الرئيسيين.
 *
 * Class mainpartners
 * @package App\Models
 */
class mainpartners extends Model
{
    use HasFactory;

    /**
     * الخصائص التي يمكن تعبئتها في هذا النموذج.
     *
     * @var array
     */
    protected $fillable = [
        'name', // اسم الشريك الرئيسي
        'email', // البريد الإلكتروني للشريك الرئيسي
        'desc', // وصف الشريك الرئيسي
        'PhoneNumber', // رقم هاتف الشريك الرئيسي
        'Created_by', // الشخص الذي قام بإنشاء الشريك الرئيسي
    ];
}
