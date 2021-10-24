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
                f.id as user_program_id, 
                f.name as user_program_name, 
                a.unit_id,
                k.id as program_id,
                k.code_program,
                k.description as program_description,
                b.id as user_activity_id_w,
                g.id as user_activity_id,
                g.name as user_activity_name,
                l.id as activity_id,
                l.code_program as code_activity,
                l.description as activity_description,
                c.id as user_kro_id_w,
                h.id as user_kro_id,
                h.name as user_kro_name,
                m.id as kro_id,
                m.kro,
                m.code_kro_non_pn,
                m.code_kro_pn,
                m.unit as kro_unit,
                c.type_kro,
                d.id as user_ro_id_w,
                i.id as user_ro_id,
                i.name as user_ro_name,
                d.code_ro,
                d.ro,
                e.id as work_plan_id,
                j.id as work_plan_user_id,
                j.name as work_plan_user_name,
                e.component_code,
                e.component_name,
                e.total_target,
                n.id as unit_target_id,
                n.name as unit_target_name,
                e.budged,
                e.detail,
                e.description,
                e.target_indicator_status,
                e.pph7_id,
                e.deputi_status,
                e.admin_status,
                e.created_at,
                e.updated_at
            FROM user_programs a
            LEFT JOIN user_activities b ON b.user_program_id = a.id
            LEFT JOIN user_kro c ON c.user_activity_id = b.id
            LEFT JOIN user_ro d ON d.user_kro_id = c.id
            LEFT JOIN work_plans e ON e.user_ro_id = d.id
            LEFT JOIN users f ON a.user_id = f.id
            LEFT JOIN users g ON b.user_id = g.id
            LEFT JOIN users h ON c.user_id = h.id
            LEFT JOIN users i ON d.user_id = i.id
            LEFT JOIN users j ON e.user_id = j.id
            LEFT JOIN programs k ON a.program_id = k.id
            LEFT JOIN programs l ON b.activity_id = l.id
            LEFT JOIN kro m ON c.kro_id = m.id
            LEFT JOIN unit_targets n ON e.unit_target = n.id;
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
