<?php

namespace App\Controller;

use App\Entity\Typeradio;
use App\Form\TyperadioType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeradio")
 */
class TyperadioController extends AbstractController
{
    /**
     * @Route("/", name="typeradio_index", methods={"GET"})
     */
    public function index(): Response
    {
        $typeradios = $this->getDoctrine()
            ->getRepository(Typeradio::class)
            ->findAll();

        return $this->render('typeradio/index.html.twig', [
            'typeradios' => $typeradios,
        ]);
    }

    /**
     * @Route("/new", name="typeradio_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeradio = new Typeradio();
        $form = $this->createForm(TyperadioType::class, $typeradio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeradio);
            $entityManager->flush();

            return $this->redirectToRoute('typeradio_index');
        }

        return $this->render('typeradio/new.html.twig', [
            'typeradio' => $typeradio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typeradio_show", methods={"GET"})
     */
    public function show(Typeradio $typeradio): Response
    {
        return $this->render('typeradio/show.html.twig', [
            'typeradio' => $typeradio,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typeradio_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typeradio $typeradio): Response
    {
        $form = $this->createForm(TyperadioType::class, $typeradio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeradio_index');
        }

        return $this->render('typeradio/edit.html.twig', [
            'typeradio' => $typeradio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typeradio_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Typeradio $typeradio): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeradio->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeradio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typeradio_index');
    }
}
