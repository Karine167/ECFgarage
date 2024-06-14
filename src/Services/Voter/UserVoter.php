<?php

namespace App\Services\Voter;

use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class UserVoter extends Voter
{
    const SHOW = 'show';

    public function __construct(private readonly Security $security) {} 

    protected function supports(string $attribute, mixed $subject): bool
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::SHOW])) {
            return false;
        }

        return ($subject instanceof User);
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }
        if ($this->security->isGranted('ROLE_ADMIN')){
            return true;
        }

        // you know $subject is a User object, thanks to `supports()`
        /** @var User $employee */
        $employee = $subject;
        
        return match($attribute) {
            self::SHOW => $this->canShow($employee, $user),
            default => throw new \LogicException('This code should not be reached!')
        };
    }

    private function canShow(User $employee, User $user): bool | Response
    {
        return ($user->getId() === $employee->getId());
    } 
}