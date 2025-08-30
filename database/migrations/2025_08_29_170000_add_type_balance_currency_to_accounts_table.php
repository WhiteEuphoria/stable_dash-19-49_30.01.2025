<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            if (!Schema::hasColumn('accounts', 'type')) {
                $table->string('type')->default('Брокерский')->after('user_id');
            }
            if (!Schema::hasColumn('accounts', 'balance')) {
                $table->decimal('balance', 15, 2)->default(0)->after('status');
            }
            if (!Schema::hasColumn('accounts', 'currency')) {
                $table->string('currency', 3)->default('EUR')->after('balance');
            }
        });
    }

    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            if (Schema::hasColumn('accounts', 'currency')) {
                $table->dropColumn('currency');
            }
            if (Schema::hasColumn('accounts', 'balance')) {
                $table->dropColumn('balance');
            }
            if (Schema::hasColumn('accounts', 'type')) {
                $table->dropColumn('type');
            }
        });
    }
};

