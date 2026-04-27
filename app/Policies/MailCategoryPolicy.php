<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MailCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class MailCategoryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MailCategory');
    }

    public function view(AuthUser $authUser, MailCategory $mailCategory): bool
    {
        return $authUser->can('View:MailCategory');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MailCategory');
    }

    public function update(AuthUser $authUser, MailCategory $mailCategory): bool
    {
        return $authUser->can('Update:MailCategory');
    }

    public function delete(AuthUser $authUser, MailCategory $mailCategory): bool
    {
        return $authUser->can('Delete:MailCategory');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MailCategory');
    }

    public function restore(AuthUser $authUser, MailCategory $mailCategory): bool
    {
        return $authUser->can('Restore:MailCategory');
    }

    public function forceDelete(AuthUser $authUser, MailCategory $mailCategory): bool
    {
        return $authUser->can('ForceDelete:MailCategory');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MailCategory');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MailCategory');
    }

    public function replicate(AuthUser $authUser, MailCategory $mailCategory): bool
    {
        return $authUser->can('Replicate:MailCategory');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MailCategory');
    }

}