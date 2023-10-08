<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * عملية إنشاء جدول "tblemps".
 *
 * Class CreateTblempsTable
 */
class CreateTblempsTable extends Migration
{
    /**
     * قم بتنفيذ العملية.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemps', function (Blueprint $table) {
            $table->id(); // معرف فريد للجدول
            $table->string('emp_name'); // اسم الموظف
            $table->string('emp_email')->unique(); // البريد الإلكتروني للموظف (يجب أن يكون فريدًا)
            $table->string('emp_PhoneNumber')->unique(); // رقم هاتف الموظف (يجب أن يكون فريدًا)
            $table->string('emp_Created_by'); // الشخص الذي قام بإنشاء الموظف
            $table->string('emp_desc'); // وصف الموظف
            $table->unsignedBigInteger('mainpartner_id'); // معرف الشريك الرئيسي المرتبط بالموظف
            $table->foreign('mainpartner_id')->references('id')->on('mainpartners')->onDelete('cascade'); // علاقة مفتاح خارجي مع جدول mainpartners وإعداد لحذف متعدد الحواف المرتبطة بهذا الشريك الرئيسي
            $table->timestamps(); // الحقول المستخدمة لتسجيل توقيت إنشاء وتحديث السجلات
        });
    }

    /**
     * إلغاء العملية وحذف الجدول إذا كان موجودًا.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblemps'); // حذف الجدول "tblemps" إذا كان موجودًا
    }
}
