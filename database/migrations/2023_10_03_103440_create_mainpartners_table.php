<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * عملية إنشاء جدول "mainpartners".
 *
 * Class CreateMainpartnersTable
 */
class CreateMainpartnersTable extends Migration
{
    /**
     * قم بتنفيذ العملية.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainpartners', function (Blueprint $table) {
            $table->id(); // معرف فريد للجدول
            $table->string('name'); // اسم الشريك الرئيسي
            $table->string('email')->unique(); // البريد الإلكتروني للشريك الرئيسي (يجب أن يكون فريدًا)
            $table->string('PhoneNumber')->unique(); // رقم هاتف الشريك الرئيسي (يجب أن يكون فريدًا)
            $table->string('Created_by'); // الشخص الذي قام بإنشاء الشريك الرئيسي
            $table->string('desc'); // وصف الشريك الرئيسي
            $table->timestamps(); // الحقول المُستخدمة لتسجيل توقيت إنشاء وتحديث السجلات
        });
    }

    /**
     * إلغاء العملية وحذف الجدول إذا كان موجودًا.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainpartners'); // حذف الجدول "mainpartners" إذا كان موجودًا
    }
}
