<?php
use App\Models\Team;
function createDefaultUser()
{
    $user = \App\Models\User::create([
        'name' => config('DEFAULT_USER_NAME'),
        'email' => config('DEFAULT_USER_EMAIL'),
        'password' => bcrypt(config('DEFAULT_USER_PASSWORD')),
    ]);

    $team = Team::create([
        'name' => 'Default Team',
        'user_id' => $user->id,
    ]);

    $user->team()->associate($team);
    $user->save();

    return $user;
}

function createDefaultTeacher()
{
    $teacher = \App\Models\User::create([
        'name' => config('DEFAULT_TEACHER_NAME'),
        'email' => config('DEFAULT_TEACHER_EMAIL'),
        'password' => bcrypt(config('DEFAULT_TEACHER_PASSWORD')),
    ]);

    $team = Team::create([
        'name' => 'Default Teacher Team',
        'user_id' => $teacher->id,  // Asegúrate de asignar el user_id
    ]);

    $teacher->team()->associate($team);
    $teacher->save();

    return $teacher;
}
