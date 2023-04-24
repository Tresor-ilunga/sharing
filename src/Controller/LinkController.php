<?php

namespace App\Controller;

use App\Entity\Link;
use App\Form\CreateLinkType;
use App\Form\UpdateLinkType;
use App\Message\CreateLinkMessage;
use App\Message\DeleteLinkMessage;
use App\Message\UpdateLinkMessage;
use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/link')]
class LinkController extends AbstractController
{
    public function __construct(
        private readonly MessageBusInterface $bus
    ) {
    }

    #[Route('/', name: 'app_link_index', methods: ['GET'])]
    public function index(LinkRepository $linkRepository): Response
    {
        return $this->render('link/index.html.twig', [
            'links' => $linkRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_link_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LinkRepository $linkRepository): Response
    {
        $message = new CreateLinkMessage();
        $form = $this->createForm(CreateLinkType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->bus->dispatch($message);

            return $this->redirectToRoute('app_link_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('link/new.html.twig', [
            'link' => $message,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_link_show', methods: ['GET'])]
    public function show(Link $link): Response
    {
        return $this->render('link/show.html.twig', [
            'link' => $link,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_link_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Link $link, LinkRepository $linkRepository): Response
    {
        $message = new UpdateLinkMessage($link);
        $form = $this->createForm(UpdateLinkType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->bus->dispatch($message);

            return $this->redirectToRoute('app_link_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('link/edit.html.twig', [
            'link' => $link,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_link_delete', methods: ['POST'])]
    public function delete(Request $request, Link $link, LinkRepository $linkRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$link->getId(), $request->request->get('_token'))) {
            $this->bus->dispatch(new DeleteLinkMessage($link));
        }

        return $this->redirectToRoute('app_link_index', [], Response::HTTP_SEE_OTHER);
    }
}