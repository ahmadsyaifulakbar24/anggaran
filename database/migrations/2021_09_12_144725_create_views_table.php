<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS vw_users_asdep");
        DB::statement("
            CREATE VIEW vw_users_asdep AS
            SELECT a.id, a.name, a.unit_id, a.parent_id
            FROM users a
            LEFT JOIN model_has_roles b ON a.id = b.model_id
            LEFT JOIN roles c ON b.role_id = c.id
            WHERE c.name = 'asdep'
        ");

        DB::statement("DROP VIEW IF EXISTS vw_budged_asdep_acc");
        DB::statement("
            CREATE VIEW vw_budged_asdep_acc AS
            SELECT user_id, if(SUM(budged) IS NULL, 0, SUM(budged)) as budged_acc
            FROM work_plans
            where admin_status = 'accept'
            GROUP BY user_id
        ");

        DB::statement("DROP VIEW IF EXISTS vw_budged_asdep_pending");
        DB::statement("
            CREATE VIEW vw_budged_asdep_pending AS
            SELECT user_id, if(SUM(budged) IS NULL, 0, SUM(budged)) as budged_pending
            FROM work_plans
            where admin_status = 'pending' OR deputi_status = 'pending'
            GROUP BY user_id
        ");

        DB::statement("DROP VIEW IF EXISTS vw_budged_asdep");
        DB::statement("
            CREATE VIEW vw_budged_asdep AS
            SELECT a.id, a.name, a.unit_id, a.parent_id, if(b.budged_acc IS NULL, 0, b.budged_acc) as budged_acc, if(c.budged_pending IS NULL, 0, c.budged_pending) as budged_pending
            FROM vw_users_asdep a
            LEFT JOIN vw_budged_asdep_acc b ON b.user_id = a.id
            LEFT JOIN vw_budged_asdep_pending c ON c.user_id = a.id
        ");

        DB::statement("DROP VIEW IF EXISTS vw_budged_deputi");
        DB::statement("
            CREATE VIEW vw_budged_deputi AS
            SELECT a.id, a.name, if(SUM(b.budged_acc) IS NULL, 0, SUM(b.budged_acc)) as budged_acc, if(SUM(b.budged_pending) IS NULL, 0, SUM(b.budged_pending)) as budged_pending
            FROM units a
            LEFT JOIN vw_budged_asdep b ON b.unit_id = a.id
            GROUP BY a.id
        ");

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('views');
    }
}
