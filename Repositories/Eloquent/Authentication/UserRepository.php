<?php


namespace Modules\Backend\Repositories\Eloquent\Authentication;


use App\Models\Auth\User;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Collection;

class UserRepository extends EloquentRepository
{
    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        /**
         * Set the model that will be used for repo
         */
        parent::__construct(new User);
    }

    /**
     * @param User|null $user
     * @return Collection
     */
    public function getAssignedRoles(User $user = null): Collection
    {
        if (is_null($user))
            return $this->model->roles;
        else
            return $user->roles;
    }


    /**
     * @param array $roles
     * @param bool $detachOldRoles
     * @return bool
     */
    public function manageRoles(array $roles = [], bool $detachOldRoles = false): bool
    {

        $alreadyAssignedRoles = $this->getAssignedRoles()->pluck('id')->toArray();

        $roleIds = ($detachOldRoles) ? $roles : array_unique(array_merge($alreadyAssignedRoles, $roles));


        return (bool)$this->model->roles()->sync($roleIds, ['model_type' => get_class($this->model)]);
    }

    /**
     * @param string $roleName
     * @return mixed
     */
    public function usersByRole(string $roleName)
    {
        return $this->model->role($roleName)->get();
    }

    /**
     * @param string $testUserName
     * @return bool
     * @throws \Exception
     */
    public function verifyUniqueUsername(string $testUserName): bool
    {
        if ($existingUser = $this->findFirstWhere('username', '=', $testUserName)) {
            return false;
        }
        return true;
    }
}
