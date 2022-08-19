<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('user_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('national_id');
            $table->string('phone');
            $table->string('guardianPhone');
            $table->string('admissionNumber');
            $table->string('yearOfAdmission');
            $table->foreignId('program_id')->constrained();
            $table->string('confirmed')->default('not confirmed');
            $table->foreignId('department_id')->constrained();
            $table->string('status_of_graduation')->default('not approved');
            $table->string('created_by')->default('0');
            $table->string('signed')->default('0');
            /* For Creating Current Timestamp */
            $table->timestamp('created_at')->useCurrent();
            /* For Updating */
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
