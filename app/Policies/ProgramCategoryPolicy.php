<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProgramCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramCategoryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProgramCategory');
    }

    public function view(AuthUser $authUser, ProgramCategory $programCategory): bool
    {
        return $authUser->can('View:ProgramCategory');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProgramCategory');
    }

    public function update(AuthUser $authUser, ProgramCategory $programCategory): bool
    {
        return $authUser->can('Update:ProgramCategory');
    }

    public function delete(AuthUser $authUser, ProgramCategory $programCategory): bool
    {
        return $authUser->can('Delete:ProgramCategory');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:ProgramCategory');
    }

    public function restore(AuthUser $authUser, ProgramCategory $programCategory): bool
    {
        return $authUser->can('Restore:ProgramCategory');
    }

    public function forceDelete(AuthUser $authUser, ProgramCategory $programCategory): bool
    {
        return $authUser->can('ForceDelete:ProgramCategory');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProgramCategory');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProgramCategory');
    }

    public function replicate(AuthUser $authUser, ProgramCategory $programCategory): bool
    {
        return $authUser->can('Replicate:ProgramCategory');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProgramCategory');
    }

}