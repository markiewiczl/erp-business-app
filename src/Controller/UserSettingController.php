<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class UserSettingController extends AbstractController
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/user/settings", name="app_users_settings")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $adapter): Response
    {
        $currentUser = $this->security->getUser();
        $table = [];
        $form = $this->createForm(ChangePasswordType::class, $table);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($adapter->isPasswordValid($currentUser, $form->get('password')->getData())) {
                if ($form->get('newPassword1')->getData() === $form->get('newPassword2')->getData()) {
                    $currentUser->setPassword( $adapter->hashPassword(
                        $currentUser,
                        $form->get('password1')->getData()
                    )
                    );
                    $entityManager->persist($currentUser);
                    $entityManager->flush();

                    return $this->redirectToRoute('app_main_page');
                }
            }
        }



        return $this->renderForm('user_setting/index.html.twig', [
            'form' => $form,
        ]);
    }
}