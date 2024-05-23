<?php

namespace App\Controller;

use App\Entity\Survey;
use App\Form\SurveyType;
use App\Repository\SurveyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Question;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface; // Assurez-vous d'ajouter cette ligne


#[Route('/survey')]
class SurveyController extends AbstractController
{
    #[Route('/', name: 'app_survey_index', methods: ['GET'])]
    public function index(SurveyRepository $surveyRepository): Response
    {
        return $this->render('survey/ajout.html.twig', [
            'surveys' => $surveyRepository->findAll(),
        ]);
    }

    #[Route('/survey/creaprojet', name: 'app_survey_creaprojet')]

    public function creaprojet(): Response
    {
        return $this->render('creaprojet.html.twig');
    }
    #[Route('/survey/first', name: 'app_survey_firstt')]

    public function firstt(): Response
    {
        return $this->render('first.html.twig');
    }

    #[Route('/survey/creaform/{idProject}', name: 'app_survey_creaform')]

    public function creaform($idProject): Response
    {
        return $this->render('survey/creaform.html.twig', ["projectId" => $idProject]);
    }


    #[Route('/new', name: 'app_survey_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $survey = new Survey();
        $form = $this->createForm(SurveyType::class, $survey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($survey);
            $entityManager->flush();

            return $this->redirectToRoute('app_survey_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('survey/new.html.twig', [
            'survey' => $survey,
            'form' => $form,
        ]);
    }


    /*#[Route('/resultat', name: 'app_survey_resultat')]
    public function resultat(): Response
    {
        return $this->render('/survey/resultat.html.twig');
    }*/

    #[Route('/{id}', name: 'app_survey_show', methods: ['GET'])]
    public function show(Survey $survey): Response
    {
        return $this->render('survey/show.html.twig', [
            'survey' => $survey,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_survey_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Survey $survey, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SurveyType::class, $survey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_survey_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('survey/edit.html.twig', [
            'survey' => $survey,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_survey_delete', methods: ['POST'])]
    public function delete(Request $request, Survey $survey, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $survey->getId(), $request->request->get('_token'))) {
            $entityManager->remove($survey);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_survey_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/{save-survey}', name: 'save_survey', methods: ['POST'])]
    public function saveSurvey(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        $survey = new Survey();
        $survey->setStructure($data['structure']); // Assurez-vous que la clé 'structure' existe dans le corps de la requête

        $entityManager->persist($survey);
        $entityManager->flush();

        return $this->json([
            'success' => true,
            'id' => $survey->getId()
        ]);
    }
}
