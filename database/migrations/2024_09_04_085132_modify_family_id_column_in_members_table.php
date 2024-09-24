<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFamilyIdColumnInMembersTable extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->foreignId('family_id')->nullable()->change(); // Make family_id nullable
        });
    }

    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->foreignId('family_id')->constrained('families')->change(); // Revert back to not nullable if needed
        });
    }
}
