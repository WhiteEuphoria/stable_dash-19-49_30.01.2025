<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            if (Schema::hasColumn('accounts', 'name')) {
                $table->string('name')->nullable()->change();
            }
            if (Schema::hasColumn('accounts', 'bank')) {
                $table->string('bank')->nullable()->change();
            }
            if (Schema::hasColumn('accounts', 'client_initials')) {
                $table->string('client_initials')->nullable()->change();
            }
            if (Schema::hasColumn('accounts', 'broker_initials')) {
                $table->string('broker_initials')->nullable()->change();
            }
            if (Schema::hasColumn('accounts', 'term')) {
                $table->date('term')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            if (Schema::hasColumn('accounts', 'term')) {
                $table->date('term')->nullable(false)->change();
            }
            if (Schema::hasColumn('accounts', 'broker_initials')) {
                $table->string('broker_initials')->nullable(false)->change();
            }
            if (Schema::hasColumn('accounts', 'client_initials')) {
                $table->string('client_initials')->nullable(false)->change();
            }
            if (Schema::hasColumn('accounts', 'bank')) {
                $table->string('bank')->nullable(false)->change();
            }
            if (Schema::hasColumn('accounts', 'name')) {
                $table->string('name')->nullable(false)->change();
            }
        });
    }
};

