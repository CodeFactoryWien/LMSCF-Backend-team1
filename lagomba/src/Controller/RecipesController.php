<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response ;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Recipes;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class RecipesController extends AbstractController
{
    /**
     * @Route("/create-recipe", name="create-recipe", methods={"GET", "POST"})
     * 
     * @return Response
     */
    public function create(Request $request)
    {
        $recipes = new Recipes;

        $form = $this->createFormBuilder($recipes)
        ->add('title', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('steps', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('requires', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('preptime', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('preplevel', ChoiceType::class, array('lable'=>'select','choices'=>array('hard'=>'hard', 'medium'=>'medium', 'easy'=>'easy'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))
        ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('image', FileType::class, array('label'=>'Upload File','attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
        ->add('save', SubmitType::class, array('label'=> 'Create Recipe', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
        ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $title = $form['title']->getTitle();
            $steps = $form['steps']->getSteps();
            $requires = $form['requires']->getRequires();
            $preptime = $form['preptime']->getPrepTime();
            $preplevel = $form['preplevel']->getPrepLevel();
            $description = $form['description']->getDescription();
            $image = $form['image']->getImage();

            $recipes->setTitle($title);
            $recipes->setSteps($steps);
            $recipes->setDescription($description);
            $recipes->setRequires($requires);
            $recipes->setPrepTime($preptime);
            $recipes->setPrepLevel($preplevel);
            $recipes->setDescription($description);
            $recipes->setImage($image);

            $image = $request->images->get('post')['my_image'];

            $uploads_directory= $this->getParameter('uploads_directory');
            $imagename =md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $uploads_directory, $imagename
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($recipes);

            $em->flush();
            $this->addFlash(
                    'message',
                    'Recipe has been Added'
                    );
            return $this->redirectToRoute('/');

        }


        return $this->render('recipes/create.html.twig', array('form' => $form->createView()));
    }


}
