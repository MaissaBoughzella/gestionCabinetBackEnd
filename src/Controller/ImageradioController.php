<?php

namespace App\Controller;

use App\Entity\Imageradio;
use App\Form\ImageradioType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/imageradio")
 */
class ImageradioController extends AbstractController
{
    /**
     * @Route("/", name="imageradio_index", methods={"GET"})
     */
    public function index(): Response
    {
        $imageradios = $this->getDoctrine()
            ->getRepository(Imageradio::class)
            ->findAll();

        return $this->render('imageradio/index.html.twig', [
            'imageradios' => $imageradios,
        ]);
    }

    /**
     * @Route("/new", name="imageradio_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $imageradio = new Imageradio();
        $form = $this->createForm(ImageradioType::class, $imageradio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($imageradio);
            $entityManager->flush();

            return $this->redirectToRoute('imageradio_index');
        }

        return $this->render('imageradio/new.html.twig', [
            'imageradio' => $imageradio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="imageradio_show", methods={"GET"})
     */
    public function show(Imageradio $imageradio): Response
    {
        return $this->render('imageradio/show.html.twig', [
            'imageradio' => $imageradio,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="imageradio_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Imageradio $imageradio): Response
    {
        $form = $this->createForm(ImageradioType::class, $imageradio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imageradio_index');
        }

        return $this->render('imageradio/edit.html.twig', [
            'imageradio' => $imageradio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="imageradio_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Imageradio $imageradio): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imageradio->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($imageradio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('imageradio_index');
    }
}
