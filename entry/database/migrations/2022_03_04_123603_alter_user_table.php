<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->after('email');
            $table->string('postal_code', 10)->nullable()->after('phone');
            $table->string('city', 50)->nullable()->after('postal_code');
            $table->string('street', 50)->nullable()->after('city');
            $table->string('bank_account', 50)->nullable()->after('street');
            $table->string('social_security', 50)->nullable()->after('bank_account');
            $table->decimal('salary_per_hour')->nullable()->after('social_security');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('postal_code');
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('bank_account');
            $table->dropColumn('social_security');
            $table->dropColumn('salary_per_hour');
        });
    }
};
