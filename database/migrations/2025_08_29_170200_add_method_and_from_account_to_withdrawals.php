<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            if (!Schema::hasColumn('withdrawals', 'method')) {
                $table->string('method')->nullable()->after('amount'); // card, bank, crypto
            }
            if (!Schema::hasColumn('withdrawals', 'from_account_id')) {
                $table->foreignId('from_account_id')->nullable()->constrained('accounts')->nullOnDelete()->after('method');
            }
        });
    }

    public function down(): void
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            if (Schema::hasColumn('withdrawals', 'from_account_id')) {
                $table->dropConstrainedForeignId('from_account_id');
            }
            if (Schema::hasColumn('withdrawals', 'method')) {
                $table->dropColumn('method');
            }
        });
    }
};

