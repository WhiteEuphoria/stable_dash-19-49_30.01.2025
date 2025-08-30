<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            if (!Schema::hasColumn('withdrawals', 'applied')) {
                $table->boolean('applied')->default(false)->after('status');
            }
            if (!Schema::hasColumn('withdrawals', 'applied_at')) {
                $table->timestamp('applied_at')->nullable()->after('applied');
            }
        });
    }

    public function down(): void
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            if (Schema::hasColumn('withdrawals', 'applied_at')) {
                $table->dropColumn('applied_at');
            }
            if (Schema::hasColumn('withdrawals', 'applied')) {
                $table->dropColumn('applied');
            }
        });
    }
};

