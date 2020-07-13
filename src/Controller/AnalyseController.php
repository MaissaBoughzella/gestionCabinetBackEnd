<?php

namespace App\Controller;

use App\Entity\Analyse;
use App\Form\AnalyseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/analyse")
 */
class AnalyseController extends AbstractController
{
    /**
     * @Route("/", name="analyse_index", methods={"GET"})
     */
    public function index(): Response
    {
        $analyses = $this->getDoctrine()
            ->getRepository(Analyse::class)
            ->findAll();

        return $this->render('analyse/index.html.twig', [
            'analyses' => $analyses,
        ]);
    }

    /**
     * @Route("/new", name="analyse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $analyse = new Analyse();
        $form = $this->createForm(AnalyseType::class, $analyse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($analyse);
            $entityManager->flush();

            return $this->redirectToRoute('analyse_index');
        }

        return $this->render('analyse/new.html.twig', [
            'analyse' => $analyse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="analyse_show", methods={"GET"})
     */
    public function show(Analyse $analyse): Response
    {
        return $this->render('analyse/show.html.twig', [
            'analyse' => $analyse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="analyse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Analyse $analyse): Response
    {
        $form = $this->createForm(AnalyseType::class, $analyse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('analyse_index');
        }

        return $this->render('analyse/edit.html.twig', [
            'analyse' => $analyse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="analyse_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Analyse $analyse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$analyse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($analyse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('analyse_index');
    }
}
