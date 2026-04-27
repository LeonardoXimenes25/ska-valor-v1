<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Disposition;
use Illuminate\Auth\Access\HandlesAuthorization;

class DispositionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Disposition');
    }

    public function view(AuthUser $authUser, Disposition $disposition): bool
    {
        return $authUser->can('View:Disposition');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Disposition');
    }

    public function update(AuthUser $authUser, Disposition $disposition): bool
    {
        return $authUser->can('Update:Disposition');
    }

    public function delete(AuthUser $authUser, Disposition $disposition): bool
    {
        return $authUser->can('Delete:Disposition');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Disposition');
    }

    public function restore(AuthUser $authUser, Disposition $disposition): bool
    {
        return $authUser->can('Restore:Disposition');
    }

    public function forceDelete(AuthUser $authUser, Disposition $disposition): bool
    {
        return $authUser->can('ForceDelete:Disposition');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Disposition');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Disposition');
    }

    public function replicate(AuthUser $authUser, Disposition $disposition): bool
    {
        return $authUser->can('Replicate:Disposition');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Disposition');
    }

}