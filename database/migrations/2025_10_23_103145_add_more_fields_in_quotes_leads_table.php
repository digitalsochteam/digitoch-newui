<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('quote_leads')) {
            Schema::create('quote_leads', function (Blueprint $table) {
                $table->id();
                $table->string('fullname');
                $table->string('city')->nullable();
                $table->string('mobile')->unique();
                $table->string('email')->nullable();
                $table->string('subject')->nullable();
                $table->text('message')->nullable();
                $table->unsignedInteger('request_count')->default(1);
                $table->string('leadid')->nullable();
                $table->string('category')->nullable();
                $table->string('status')->default('Pending');
                $table->string('source')->nullable();
                $table->string('assignto')->nullable();
                $table->string('ipaddress')->nullable();
                $table->string('header')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('quote_leads', function (Blueprint $table) {
                if (!Schema::hasColumn('quote_leads', 'leadid')) {
                    $table->string('leadid')->nullable()->after('message');
                }
                if (!Schema::hasColumn('quote_leads', 'category')) {
                    $table->string('category')->nullable()->after('leadid');
                }
                if (!Schema::hasColumn('quote_leads', 'status')) {
                    $table->string('status')->default('Pending')->after('category');
                }
                if (!Schema::hasColumn('quote_leads', 'source')) {
                    $table->string('source')->nullable()->after('status');
                }
                if (!Schema::hasColumn('quote_leads', 'assignto')) {
                    $table->string('assignto')->nullable()->after('source');
                }
                if (!Schema::hasColumn('quote_leads', 'ipaddress')) {
                    $table->string('ipaddress')->nullable()->after('assignto');
                }
                if (!Schema::hasColumn('quote_leads', 'header')) {
                    $table->string('header')->nullable()->after('ipaddress');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('quote_leads')) {
            Schema::table('quote_leads', function (Blueprint $table) {
                $columns = ['leadid', 'category', 'status', 'source', 'assignto', 'ipaddress', 'header'];
                foreach ($columns as $column) {
                    if (Schema::hasColumn('quote_leads', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }
    }
};