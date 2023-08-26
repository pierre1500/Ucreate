<?php

namespace App\Security;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Response;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;



class UsersAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UserPasswordHasherInterface $userPasswordHasher;
    private UserAuthenticatorInterface $userAuthenticator;
    private EntityManagerInterface $entityManager;
    private $userProvider;

    public function __construct(private UrlGeneratorInterface $urlGenerator,UserProviderInterface $userProvider, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, EntityManagerInterface $entityManager)
    {
        $this->userProvider = $userProvider;
        $this->userPasswordHasher = $userPasswordHasher;
        $this->userAuthenticator = $userAuthenticator;
        $this->entityManager = $entityManager;
    }

    /*public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');
        $request->getSession()->set(Security::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }*/

    public function authenticate(Request $request): Passport
    {
        $submittedData = $request->request->all();

        if (isset($submittedData['_csrf_token_register'])) {
            // Extract user registration data
            $email = $submittedData['registration_form']['email'];
            $password = $submittedData['registration_form']['plainPassword'];
            $user = new User();
            $hashedPassword = $this->userPasswordHasher->hashPassword($user, $password);
            // Create a new User object and populate its properties

            $user->setEmail($email);
            $user->setName($submittedData['registration_form']['name']);
            $user->setLastname($submittedData['registration_form']['lastname']);
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($hashedPassword);

            // Persist the user to the database (pseudo-code, replace with actual logic)
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            // Create a new Passport for successful registration
            return new Passport(
                new UserBadge(
                    $email,
                    function () use ($email) {
                        return $this->userProvider->loadUserByIdentifier($email);
                    }
                ),
                new PasswordCredentials($password), // or $hashedPassword if needed
                [
                    new CsrfTokenBadge('authenticate', $submittedData['_csrf_token_register']),
                    new RememberMeBadge(),
                ]
            );
        } elseif (isset($submittedData['_csrf_token'])) {
            // Handle login logic
            $email = $submittedData['email'];
            $password = $submittedData['password'];

            return new Passport(
                new UserBadge($email),
                new PasswordCredentials($password),
                [
                    new CsrfTokenBadge('authenticate', $submittedData['_csrf_token']),
                    new RememberMeBadge(),
                ]
            );
        }

        // If none of the conditions match, you can return a Passport with NoCredentials
        return new Passport(new UserBadge('anonymous'), new NoCredentials());
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): RedirectResponse
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // For example:
         return new RedirectResponse($this->urlGenerator->generate('app_home'));
        //throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }

    private function createForm(string $class, User $user)
    {
    }
}
