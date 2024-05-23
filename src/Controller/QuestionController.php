<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProjetRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;


#[Route('/question')]
class QuestionController extends AbstractController
{
   /* #[Route('/', name: 'app_question_index', methods: ['GET'])]
    public function index(QuestionRepository $questionRepository): Response
    {
        return $this->render('question/index.html.twig', [
            'questions' => $questionRepository->findAll(),
        ]);
    }*/
    #[Route('/new/{projetId}', name: 'app_question_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, $projetId, ProjetRepository $projetRepository,RouterInterface $router): Response
    {
        // Decode the JSON request data
        $data = json_decode($request->getContent(), true);
        if (!$data) {
            return $this->json(['error' => 'Invalid JSON data'], Response::HTTP_BAD_REQUEST);
        }
    
        // Validate the required 'type' data
        if (!isset($data['type'])) {
            return $this->json(['error' => 'Missing type'], Response::HTTP_BAD_REQUEST);
        }
    
        $question = new Question();
        $projet = $projetRepository->find($projetId);
    
        if (!$projet) {
            return $this->json(['error' => 'Project not found'], Response::HTTP_NOT_FOUND);
        }
    
        $question->setProjet($projet);
        $question->setType($data['type']); // Assuming the Question entity has a setType method.
        $question->setDescription($data['description']);
        $entityManager->persist($question);
        $entityManager->flush();

        $questionUrl = $router->generate('app_question_show', ['id' => $question->getId()], RouterInterface::ABSOLUTE_URL);

        return $this->json([
            'message' => 'Question created successfully',
            'questionId' => $question->getId(),
            'questionUrl' => $questionUrl,
        ], Response::HTTP_CREATED);
    }

    #[Route('/project/{id}/questionsA' , name:'app_projet_news')]
     
    public function indexafficher(QuestionRepository $questionRepository, $id): Response
    {
        $questions = $questionRepository->findByProjectId($id);

        if (!$questions) {
            $this->addFlash('error', 'No questions found for this project.');
            
        }

        return $this->render('question/affichage.html.twig', [
            'questions' => $questions,
        ]);
    }
    
    #[Route('/project/{id}/questions' , name:'app_projet_new')]
     
    public function index(QuestionRepository $questionRepository, $id): Response
    {
        $questions = $questionRepository->findByProjectId($id);

        if (!$questions) {
            $this->addFlash('error', 'No questions found for this project.');
            
        }

        return $this->render('question/index.html.twig', [
            'questions' => $questions,
        ]);
    }
    #[Route('/submit-form' , name:'form_submit')]
    public function submitForm(Request $request)
{
    // Retrieve and process form data
    $formData = $request->request->all();
    // Process form data, validate, and store responses

    return $this->redirectToRoute('form_success');
    
}
    
    #[Route('/question/{id}', name: 'app_question_show', methods: ['GET'])]
    public function show(Question $question): Response
    {
        // Your logic to show the question
        return $this->json($question);
    }

      
   /* #[Route('/{id}', name: 'app_question_show', methods: ['GET'])]
    public function show(Question $question): Response
    {
        return $this->render('question/show.html.twig', [
            'question' => $question,
        ]);
    }*/

    #[Route('/{id}/edit', name: 'app_question_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Question $question, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_question_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('question/edit.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_question_delete', methods: ['POST'])]
    public function delete(Request $request, Question $question, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $question->getId(), $request->request->get('_token'))) {
            $entityManager->remove($question);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_question_index', [], Response::HTTP_SEE_OTHER);
    }
}
