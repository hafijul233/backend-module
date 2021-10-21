<?php

namespace App\Services\Auth;


use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Auth\User;
use Modules\Rbac\Repositories\UserRepository;
use App\Services\Common\FileUploadService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class RegisteredUserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var FileUploadService
     */
    private $fileUploadService;

    /**
     * RegisteredUserService constructor.
     * @param UserRepository $userRepository
     * @param FileUploadService $fileUploadService
     */
    public function __construct(UserRepository    $userRepository,
                                FileUploadService $fileUploadService)
    {
        $this->userRepository = $userRepository;
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * @param array $inputs
     * @return Model|User|null
     * @throws Throwable
     */
    public function attemptRegistration(array $inputs)
    {
        \DB::beginTransaction();
        try {
            //Hash password
            $inputs['password'] = \Utility::hashPassword(($inputs['password'] ?? \DefaultValue::PASSWORD));
            $inputs['username'] = $inputs['username'] ?? \Utility::generateUsername($inputs['name']);
            $inputs = array_merge($inputs, ['mobile' => null, 'remarks' => 'Self-Registered', 'enabled' => \DefaultValue::ENABLED_OPTION]);

            //create new user
            $newUser = $this->userRepository->create($inputs);

            //add profile image
            $profileImagePath = $this->fileUploadService->createAvatarImageFromText(($newUser->name ?? 'Guest User'));

            if ($newUser instanceof User && is_string($profileImagePath)) {
                $newUser->addMedia($profileImagePath)->toMediaCollection('avatars');
                $newUser->save();
                $this->userRepository->manageRoles([\DefaultValue::GUEST_ROLE_ID]);
                \DB::commit();
                return $newUser;
            }
            //TODO not sure about else part
        } catch (Exception $exception) {
            \DB::rollBack();
            $this->userRepository->handleException($exception);
            return null;
        }
        return null;
    }
}
