<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/registre', name: 'user_register')]
    public function register(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        // Création d'un nouvel utilisateur
        $user = new User();

        // Création du formulaire lié à l'entité User
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        // Vérification si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Hash du mot de passe avant de sauvegarder l'utilisateur
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData() // récupère la valeur du champ password
            );
            $user->setPassword($hashedPassword);

            // Sauvegarde de l'utilisateur en base
            $em->persist($user);
            $em->flush();

            // Redirection après enregistrement
            return $this->redirectToRoute('app_home');
        }

        // Affichage du formulaire
        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
