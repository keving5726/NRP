<?php

namespace App\Controller;

use App\Entity\Pet;
use App\Form\PetType;
use App\Repository\PetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/{_locale}/pet",
 *     defaults={
 *         "_locale": "%locale%",
 *         "_format": "html"
 *     },
 *     requirements={
 *         "_locale": "%app.locales%",
 *         "_format": "html|xml"
 *     },
 *     schemes={"https"}
 * )
 */
class PetController extends AbstractController
{
    /**
     * @Route("/", name="pet_index", methods={"GET"})
     */
    public function index(PetRepository $petRepository): Response
    {
        $user = $this->getUser();
        $pets = $user->getPets();

        return $this->render('pet/index.html.twig', [
            'pets' => $pets,
        ]);
    }

    /**
     * @Route("/new", name="pet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = $this->getUser();

        $pet = new Pet();
        $form = $this->createForm(PetType::class, $pet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pet->setUserIdentification($user);
            $pet->setCreatedAt(new \DateTime());
            $pet->setUpdatedAt(new \DateTime());
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pet);
            $entityManager->flush();

            return $this->redirectToRoute('pet_index');
        }

        return $this->render('pet/new.html.twig', [
            'pet' => $pet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pet_show", methods={"GET"})
     */
    public function show(Pet $pet): Response
    {
        return $this->render('pet/show.html.twig', [
            'pet' => $pet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pet $pet): Response
    {
        $form = $this->createForm(PetType::class, $pet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pet_index');
        }

        return $this->render('pet/edit.html.twig', [
            'pet' => $pet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Pet $pet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pet_index');
    }
}
