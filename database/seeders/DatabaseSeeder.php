<?php

namespace Database\Seeders;

use App\Helpers\DefaultVideoHelper;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear permisos i rols
        create_permissions();

        $superAdmin = create_superadmin_user();
        $superAdmin->save();
        $regularUser = create_regular_user();
        $regularUser->save();
        $videoManager = create_video_manager_user();
        $videoManager->save();


        // Assignar rols als usuaris
        $superAdmin->assignRole('super_admin');
        $regularUser->assignRole('regular');
        $videoManager->assignRole('video_manager');

        // Crear altres usuaris per defecte
        createDefaultTeacher();
        createDefaultUser();

        // Crear vídeos per defecte
        DefaultVideoHelper::createDefaultVideo();

        // Definir portes d'accés (Gates)
        define_gates();

    }
}
