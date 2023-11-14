<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        // Création d'une nouvelle instance de la classe User
        $user = new User();

        // Création du formulaire et association avec l'objet utilisateur $user
        $form = $this->createForm(RegistrationFormType::class, $user);

        // Gestion de la requête pour que le formulaire traite les données soumises
        $form->handleRequest($request);

        // Vérification si le formulaire a été soumis et s'il est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Hachage du mot de passe en utilisant le service UserPasswordHasherInterface
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // Enregistrement de l'objet utilisateur dans l'unité de travail de l'entité (EntityManager)
            $entityManager->persist($user);

            // Exécution des opérations d'insertion, de mise à jour ou de suppression dans la base de données
            $entityManager->flush();

            // Redirection vers la route 'app_login' après une inscription réussie
            return $this->redirectToRoute('app_login');
        }

        // Si le formulaire n'est pas soumis ou s'il n'est pas valide, rend la vue avec le formulaire et ses erreurs éventuelles
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
