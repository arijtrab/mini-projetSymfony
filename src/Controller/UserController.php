<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
#[Route('/register', name: 'user_register')]
public function register(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
{
$user = new User();
$form = $this->createForm(UserType::class, $user);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
// Hasher le mot de passe
$user->setPassword(
$passwordHasher->hashPassword(
$user,
$form->get('password')->getData()
)
);

$em->persist($user);
$em->flush();

return $this->redirectToRoute('home'); // ou une autre route
}

return $this->render('user/register.html.twig', [
'form' => $form->createView(),
]);
}
}
