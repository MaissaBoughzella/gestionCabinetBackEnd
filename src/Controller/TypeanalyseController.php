<?php

namespace App\Controller;

use App\Entity\Typeanalyse;
use App\Form\TypeanalyseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeanalyse")
 */
class TypeanalyseController extends AbstractController
{
    /**
     * @Route("/", name="typeanalyse_index", methods={"GET"})
     */
    public function index(): Response
    {
        $typeanalyses = $this->getDoctrine()
            ->getRepository(Typeanalyse::class)
            ->findAll();

        return $this->render('typeanalyse/index.html.twig', [
            'typeanalyses' => $typeanalyses,
        ]);
    }

    /**
     * @Route("/new", name="typeanalyse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeanalyse = new Typeanalyse();
        $form = $this->createForm(TypeanalyseType::class, $typeanalyse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeanalyse);
            $entityManager->flush();

            return $this->redirectToRoute('typeanalyse_index');
        }

        return $this->render('typeanalyse/new.html.twig', [
            'typeanalyse' => $typeanalyse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typeanalyse_show", methods={"GET"})
     */
    public function show(Typeanalyse $typeanalyse): Response
    {
        return $this->render('typeanalyse/show.html.twig', [
            'typeanalyse' => $typeanalyse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typeanalyse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typeanalyse $typeanalyse): Response
    {
        $form = $this->createForm(TypeanalyseType::class, $typeanalyse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeanalyse_index');
        }

        return $this->render('typeanalyse/edit.html.twig', [
            'typeanalyse' => $typeanalyse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typeanalyse_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Typeanalyse $typeanalyse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeanalyse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeanalyse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typeanalyse_index');
    }
}
