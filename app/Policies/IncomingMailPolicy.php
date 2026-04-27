<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\IncomingMail;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncomingMailPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:IncomingMail');
    }

    public function view(AuthUser $authUser, IncomingMail $incomingMail): bool
    {
        return $authUser->can('View:IncomingMail');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:IncomingMail');
    }

    public function update(AuthUser $authUser, IncomingMail $incomingMail): bool
    {
        return $authUser->can('Update:IncomingMail');
    }

    public function delete(AuthUser $authUser, IncomingMail $incomingMail): bool
    {
        return $authUser->can('Delete:IncomingMail');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:IncomingMail');
    }

    public function restore(AuthUser $authUser, IncomingMail $incomingMail): bool
    {
        return $authUser->can('Restore:IncomingMail');
    }

    public function forceDelete(AuthUser $authUser, IncomingMail $incomingMail): bool
    {
        return $authUser->can('ForceDelete:IncomingMail');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:IncomingMail');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:IncomingMail');
    }

    public function replicate(AuthUser $authUser, IncomingMail $incomingMail): bool
    {
        return $authUser->can('Replicate:IncomingMail');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:IncomingMail');
    }

}