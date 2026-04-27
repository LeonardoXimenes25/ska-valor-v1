<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\OutgoingMail;
use Illuminate\Auth\Access\HandlesAuthorization;

class OutgoingMailPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:OutgoingMail');
    }

    public function view(AuthUser $authUser, OutgoingMail $outgoingMail): bool
    {
        return $authUser->can('View:OutgoingMail');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:OutgoingMail');
    }

    public function update(AuthUser $authUser, OutgoingMail $outgoingMail): bool
    {
        return $authUser->can('Update:OutgoingMail');
    }

    public function delete(AuthUser $authUser, OutgoingMail $outgoingMail): bool
    {
        return $authUser->can('Delete:OutgoingMail');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:OutgoingMail');
    }

    public function restore(AuthUser $authUser, OutgoingMail $outgoingMail): bool
    {
        return $authUser->can('Restore:OutgoingMail');
    }

    public function forceDelete(AuthUser $authUser, OutgoingMail $outgoingMail): bool
    {
        return $authUser->can('ForceDelete:OutgoingMail');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:OutgoingMail');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:OutgoingMail');
    }

    public function replicate(AuthUser $authUser, OutgoingMail $outgoingMail): bool
    {
        return $authUser->can('Replicate:OutgoingMail');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:OutgoingMail');
    }

}