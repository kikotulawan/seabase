<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //Agency
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/agencies.sql'));
        $this->command->info('Agency table seeded!');


        $this->call(CompanySeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(StatusSeeder::class);

        //Agents
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/agents.sql'));
        $this->command->info('Agents table seeded!');
        //Banks
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/banks.sql'));
        $this->command->info('Banks table seeded!');
        //Branches
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/branches.sql'));
        $this->command->info('Branches table seeded!');
        //Clinics
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/clinics.sql'));
        $this->command->info('Clinics table seeded!');
        //Documents
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/documents.sql'));
        $this->command->info('Documents table seeded!');
        //Flag State Documents
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/flag_state_documents.sql'));
        $this->command->info('Flag State Documents table seeded!');
        //License
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/licenses.sql'));
        $this->command->info('License table seeded!');

        //Agency
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/medical_certificates.sql'));
        $this->command->info('Medical Certificates table seeded!');
        //Ranks
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/ranks.sql'));
        $this->command->info('Ranks table seeded!');
        //Training Course
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/training_courses.sql'));
        $this->command->info('Training Course table seeded!');
        //Training Center
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/training_centers.sql'));
        $this->command->info('Training Center table seeded!');
        //Vaccines
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/vaccines.sql'));
        $this->command->info('Vaccines table seeded!');
        //Vessel Type
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/vessel_types.sql'));
        $this->command->info('Vessel Types table seeded!');

        //Country
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/countries.sql'));
        $this->command->info('Countries table seeded!');
        //Permission
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/permissions.sql'));
        $this->command->info('Permissions table seeded!');
        //Roles
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/roles.sql'));
        $this->command->info('Roles table seeded!');
        //roles permission
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/role_has_permissions.sql'));
        $this->command->info('Roles Permission table seeded!');
        //model roles
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/model_has_roles.sql'));
        $this->command->info('Model Roles table seeded!');
        //model roles
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/permissions_group.sql'));
        $this->command->info('Permission Group table seeded!');
        //Travel Document REports
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/travel_document_reports.sql'));
        $this->command->info('Travel Document Report table seeded!');
        //trade routes
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/trade_routes.sql'));
        $this->command->info('Trade Route');

         //principal
         DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/principals.sql'));
         $this->command->info('Principal');

         //salary Scales
         DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/salary_scales.sql'));
         $this->command->info('Salary Scales');
         //salary Scales details
         DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/salary_scale_details.sql'));
         $this->command->info('Salary Scale Details');
         //vessel
         DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/vessels.sql'));
         $this->command->info('Vessels');

         DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/vessel_salary_scales.sql'));
         $this->command->info('Vessels Salary Scales');

         DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/crews.sql'));
         $this->command->info('Crews');

         DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/crew_statuses.sql'));
         $this->command->info('Crews Statuses');

         DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/crew_ranks.sql'));
         $this->command->info('Crews Ranks');
    }
}
