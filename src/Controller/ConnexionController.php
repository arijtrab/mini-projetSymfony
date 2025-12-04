<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ConnexionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function index(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {

        $form = $this->createForm(ConnexionType::class);
        $form->handleRequest($request);

        $error = null;

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            // Chercher utilisateur par email
            $user = $em->getRepository(User::class)->findOneBy(['email' => $data['email']]);

            if (!$user) {
                $error = "Email incorrect.";
            } else {
                // Vérifier mot de passe
                if ($passwordHasher->isPasswordValid($user, $data['password'])) {
                    // Stocker utilisateur en session
                    $request->getSession()->set('user_id', $user->getId());

                    return $this->redirectToRoute('app_home');
                } else {
                    $error = "Mot de passe incorrect.";
                }
            }
        }

        return $this->render('user/connexion.html.twig', [
            'form' => $form->createView(),
            'error' => $error,
        ]);
    }
}
