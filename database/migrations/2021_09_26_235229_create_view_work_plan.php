<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewWorkPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement('DROP VIEW IF EXISTS vw_work_plan_detail');
       DB::statement('
            CREATE VIEW vw_work_plan_detail AS
            SELECT
                a.id,
                a.user_id,
                b.name as user_name,
                a.unit_id,
                c.name as unit_name,
                a.program_id as activity_id,
                d.code_program as activity,
                d.description as activity_description,
                d.parent_id as program_id,
                e.code_program as program,
                e.description as program_description,
                a.type_kro,
                a.kro_id,
                f.kro,
                f.code_kro_non_pn,
                f.code_kro_pn,
                a.ro_id,
                g.code_ro,
                g.ro,
                a.component_code,
                a.component_name,
                a.title,
                a.total_target,
                a.unit_target as unit_target_id,
                h.name as unit_target_name,
                a.budged,
                a.province_id,
                i.province,
                a.detail,
                a.description,
                a.deputi_status,
                a.admin_status,
                a.created_at,
                a.updated_at
                
            FROM work_plans a
            LEFT JOIN users b ON a.user_id = b.id
            LEFT JOIN units c ON a.unit_id = c.id
            LEFT JOIN programs d ON a.program_id = d.id
            LEFT JOIN programs e ON d.parent_id = e.id
            LEFT JOIN kro f ON a.kro_id = f.id
            LEFT JOIN code_ro g ON a.ro_id = g.id
            LEFT JOIN unit_targets h ON a.unit_target = h.id
            LEFT JOIN provinces i ON a.province_id = i.id
            GROUP BY a.id
       ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_work_plan');
    }
}
