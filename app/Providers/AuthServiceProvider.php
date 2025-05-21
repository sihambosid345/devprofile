<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Skill;
use App\Policies\SkillPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Skill::class => SkillPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}