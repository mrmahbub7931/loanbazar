<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Module::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $moduleAppDahsboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppDahsboard->id,
            'name'      =>  'Access Dashboard',
            'slug'      =>  'app.dashboard'
        ]);

        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      =>  'Access Role',
            'slug'      =>  'app.roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      =>  'Create Role',
            'slug'      =>  'app.roles.create'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      =>  'Edit Role',
            'slug'      =>  'app.roles.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppRole->id,
            'name'      =>  'Delete Role',
            'slug'      =>  'app.roles.delete'
        ]);

        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      =>  'Access User',
            'slug'      =>  'app.users.index'
        ]);

        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      =>  'Create User',
            'slug'      =>  'app.users.create'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      =>  'Edit User',
            'slug'      =>  'app.users.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' =>  $moduleAppUser->id,
            'name'      =>  'Delete User',
            'slug'      =>  'app.users.delete'
        ]);

        // Create Application Module
        $moduleAppApplication = Module::updateOrCreate(['name' => 'Application Management']);
        // Loan applications permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Access Loan Application',
            'slug'          =>  'app.loan.applications.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Edit Loan and Card Application',
            'slug'          =>  'app.applications.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Delete Loan and Card Application',
            'slug'          =>  'app.applications.destroy'
        ]);
        // Credit card application permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Access Card Application',
            'slug'          =>  'app.card.applications.index'
        ]);

        // Life and General application permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Access Life and General Application',
            'slug'          =>  'app.lg.applications.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Edit Life and General Application',
            'slug'          =>  'app.lg.applications.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Delete Life and General Application',
            'slug'          =>  'app.lg.applications.destroy'
        ]);

        // Bike and Car application permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Access Bike and Car Application',
            'slug'          =>  'app.bc.applications.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Edit Bike and Car Application',
            'slug'          =>  'app.bc.applications.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppApplication->id,
            'name'          =>  'Delete Bike and Car Application',
            'slug'          =>  'app.bc.applications.destroy'
        ]);

        $moduleAppSliders = Module::updateOrCreate(['name' => 'Slider Access']);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppSliders->id,
            'name'          =>  'Access Slider',
            'slug'          =>  'app.sliders.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppSliders->id,
            'name'          =>  'Create Slider',
            'slug'          =>  'app.sliders.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppSliders->id,
            'name'          =>  'Edit Slider',
            'slug'          =>  'app.sliders.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppSliders->id,
            'name'          =>  'Delete Slider',
            'slug'          =>  'app.sliders.destroy'
        ]);

        // Home page module
        $moduleAppHome = Module::updateOrCreate(['name' => 'Home page section']);
        // Best Deals Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Access Best Deals',
            'slug'          =>  'app.deals.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Create Deals',
            'slug'          =>  'app.deals.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Edit Deals',
            'slug'          =>  'app.deals.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Delete Deals',
            'slug'          =>  'app.deals.destroy'
        ]);

        // Best Service Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Access Best Services',
            'slug'          =>  'app.services.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Create Services',
            'slug'          =>  'app.services.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Edit Services',
            'slug'          =>  'app.services.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Delete Services',
            'slug'          =>  'app.services.destroy'
        ]);

        // Teams Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Access Teams',
            'slug'          =>  'app.teams.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Create Teams',
            'slug'          =>  'app.teams.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Edit Teams',
            'slug'          =>  'app.teams.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Delete Teams',
            'slug'          =>  'app.teams.destroy'
        ]);

        // Reviews Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Access Reviews',
            'slug'          =>  'app.reviews.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Create Reviews',
            'slug'          =>  'app.reviews.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Edit Reviews',
            'slug'          =>  'app.reviews.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Delete Reviews',
            'slug'          =>  'app.reviews.destroy'
        ]);

        // Home Image Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Access Large Image (Home page)',
            'slug'          =>  'app.limage.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Create Large Image (Home page)',
            'slug'          =>  'app.limage.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Edit Large Image (Home page)',
            'slug'          =>  'app.limage.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Delete Large Image (Home page)',
            'slug'          =>  'app.limage.destroy'
        ]);

        // Counters Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Access Counters',
            'slug'          =>  'app.counters.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Create Counters',
            'slug'          =>  'app.counters.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Edit Counters',
            'slug'          =>  'app.counters.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Delete Counters',
            'slug'          =>  'app.counters.destroy'
        ]);

        // Corporates Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Access Corporates',
            'slug'          =>  'app.corporates.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Create Corporates',
            'slug'          =>  'app.corporates.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Edit Corporates',
            'slug'          =>  'app.corporates.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Delete Corporates',
            'slug'          =>  'app.corporates.destroy'
        ]);

        // Fianancials Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Access Fianancials Partners',
            'slug'          =>  'app.financials.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Create Fianancials Partners',
            'slug'          =>  'app.financials.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Edit Fianancials Partners',
            'slug'          =>  'app.financials.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppHome->id,
            'name'          =>  'Delete Fianancials Partners',
            'slug'          =>  'app.financials.destroy'
        ]);

        // Page module
        $moduleAppPage = Module::updateOrCreate(['name' => 'Page Module']);
        // Pages Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPage->id,
            'name'          =>  'Access Pages',
            'slug'          =>  'app.pages.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPage->id,
            'name'          =>  'Create Pages',
            'slug'          =>  'app.pages.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPage->id,
            'name'          =>  'Edit Pages',
            'slug'          =>  'app.pages.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPage->id,
            'name'          =>  'Delete Pages',
            'slug'          =>  'app.pages.destroy'
        ]);

        // Post module
        $moduleAppPost = Module::updateOrCreate(['name' => 'Post Module']);
        // Posts Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Access Posts',
            'slug'          =>  'app.posts.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Create Posts',
            'slug'          =>  'app.posts.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Edit Posts',
            'slug'          =>  'app.posts.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Delete Posts',
            'slug'          =>  'app.posts.destroy'
        ]);

        // Categories Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Access Categories',
            'slug'          =>  'app.categories.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Create Categories',
            'slug'          =>  'app.categories.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Edit Categories',
            'slug'          =>  'app.categories.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Delete Categories',
            'slug'          =>  'app.categories.destroy'
        ]);

        // Writers Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Access Writers',
            'slug'          =>  'app.writers.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Create Writer',
            'slug'          =>  'app.writers.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Edit Writer',
            'slug'          =>  'app.writers.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppPost->id,
            'name'          =>  'Delete Writer',
            'slug'          =>  'app.writers.destroy'
        ]);

        // Tools module
        $moduleAppTool = Module::updateOrCreate(['name' => 'Tools Module']);
        // Exchange Rate Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppTool->id,
            'name'          =>  'Access Exchange Rate',
            'slug'          =>  'app.exchange.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppTool->id,
            'name'          =>  'Create Exchange Rate',
            'slug'          =>  'app.exchange.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppTool->id,
            'name'          =>  'Edit Exchange Rate',
            'slug'          =>  'app.exchange.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppTool->id,
            'name'          =>  'Delete Exchange Rate',
            'slug'          =>  'app.exchange.destroy'
        ]);

        // Media module
        $moduleAppMedia = Module::updateOrCreate(['name' => 'Media Module']);
        // Media Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppMedia->id,
            'name'          =>  'Access Media',
            'slug'          =>  'app.media.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppMedia->id,
            'name'          =>  'Create Media',
            'slug'          =>  'app.media.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppMedia->id,
            'name'          =>  'Edit Media',
            'slug'          =>  'app.media.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppMedia->id,
            'name'          =>  'Delete Media',
            'slug'          =>  'app.media.destroy'
        ]);

        // Job module
        $moduleAppJob = Module::updateOrCreate(['name' => 'Job Module']);
        // Job Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppJob->id,
            'name'          =>  'Access Jobs',
            'slug'          =>  'app.jobs.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppJob->id,
            'name'          =>  'Create job',
            'slug'          =>  'app.jobs.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppJob->id,
            'name'          =>  'Edit job',
            'slug'          =>  'app.jobs.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppJob->id,
            'name'          =>  'Delete job',
            'slug'          =>  'app.jobs.destroy'
        ]);


        $moduleAppServices = Module::updateOrCreate(['name' => 'Services']);
        // Cards Permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Credit Card Service',
            'slug'          =>  'app.cards.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Credit Card Service',
            'slug'          =>  'app.cards.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Credit Card Service',
            'slug'          =>  'app.cards.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Credit Card Service',
            'slug'          =>  'app.cards.destroy'
        ]);
        // Cards Documents Permission
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Credit Card Service Documents',
            'slug'          =>  'app.cards.docs.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Credit Card Service Documents',
            'slug'          =>  'app.cards.docs.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Credit Card Service Documents',
            'slug'          =>  'app.cards.docs.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Credit Card Service Documents',
            'slug'          =>  'app.cards.docs.destroy'
        ]);
        // Card Faq permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Credit Card Service FAQ',
            'slug'          =>  'app.cards.faq.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Credit Card Service FAQ',
            'slug'          =>  'app.cards.faq.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Credit Card Service FAQ',
            'slug'          =>  'app.cards.faq.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Credit Card Service FAQ',
            'slug'          =>  'app.cards.faq.destroy'
        ]);
        // Loan permissions
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Loan Service',
            'slug'          =>  'app.loans.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Loan Service',
            'slug'          =>  'app.loans.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Loan Service',
            'slug'          =>  'app.loans.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Loan Service',
            'slug'          =>  'app.loans.destroy'
        ]);
        // Loan documents permission
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Loan Service Documents',
            'slug'          =>  'app.loans.docs.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Loan Service Documents',
            'slug'          =>  'app.loans.docs.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Loan Service Documents',
            'slug'          =>  'app.loans.docs.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Loan Service Documents',
            'slug'          =>  'app.loans.docs.destroy'
        ]);
        // Loan faq permission
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Loan Service FAQ',
            'slug'          =>  'app.loans.faq.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Loan Service FAQ',
            'slug'          =>  'app.loans.faq.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Loan Service FAQ',
            'slug'          =>  'app.loans.faq.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Loan Service FAQ',
            'slug'          =>  'app.loans.faq.destroy'
        ]);
        // Insurance Permission
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Insurances Service',
            'slug'          =>  'app.insurances.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Insurances Service',
            'slug'          =>  'app.insurances.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Insurances Service',
            'slug'          =>  'app.insurances.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Insurances Service',
            'slug'          =>  'app.insurances.destroy'
        ]);
        // Insurance Posts Permission
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Access Insurances Service Posts',
            'slug'          =>  'app.insurances.posts.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Create Insurances Service Posts',
            'slug'          =>  'app.insurances.posts.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Edit Insurances Service Posts',
            'slug'          =>  'app.insurances.posts.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     =>  $moduleAppServices->id,
            'name'          =>  'Delete Insurances Service Posts',
            'slug'          =>  'app.insurances.posts.destroy'
        ]);
    }
}
