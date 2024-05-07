<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user):bool   //tout le mode a le droit de voir tout les biens 
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post):bool  //un utilisateur a le droit de voir un bien en particulier
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool      //un utilisateur a le droit de creer un article 
    {
        return $user->hasRole('gamer|writer') ; 
        // return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post):bool  //un utilisateur a le droit de modifier un article 
    {
        return $user->id === $post->user_id;
        // return $user->hasRole('admin') ;
        //  return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post):bool    //Decider de qui supprime les posts
    {
        return $user->hasRole('admin') ; 
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post):bool
    {
        return $user->hasRole('admin') ;        
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post):bool
    {
        return $user->hasRole('admin') ; 
    }
}
