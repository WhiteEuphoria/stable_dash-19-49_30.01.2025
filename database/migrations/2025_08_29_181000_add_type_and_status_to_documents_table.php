<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            if (!Schema::hasColumn('documents', 'document_type')) {
                $table->string('document_type')->default('other')->after('original_name');
            }
            if (!Schema::hasColumn('documents', 'status')) {
                $table->string('status')->default('pending')->after('document_type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            if (Schema::hasColumn('documents', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('documents', 'document_type')) {
                $table->dropColumn('document_type');
            }
        });
    }
};

