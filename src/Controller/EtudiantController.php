<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    /**
     * @Route ("/etudiant", name :"app_etudiant")
     */
    public function index(): Response
    {
        return new Response("<h1>hello Etudiant</h1>");
    }

    #[Route('/etudiant/{id}', name: 'affichage_etudiant', requirements: ['id' => '\d{2}'])]
    public function affichageEtudiant($id): Response
    {
        return new Response("Bonjour etudiant numéro" . $id);
    }


    #[Route('/etudiant/{name}', name: 'etudiant_name')]
    public function voirNom($name): Response
    {
        return $this->render('etudiant/etudiant.html.twig', [
            'name' => $name
        ]);
    }


    #[Route('/auth/{login}/{pwd}',name: 'auth_login_pwd',requirements: ['login'=>'[A-Z]{1}[a-z]*','pwd'=>'[a-zA-Z0-9]{5}'])]

    public function voirMessage($login,$pwd){

        return $this->render('etudiant/auth.html.twig',['login'=>$login,'pwd'=>$pwd]);
    }

    #[Route('/liste',name:'list_etudiant')]

    public function listEtudiant()
    {   //liste etudiants
        $etudiants=array("salem","ahmed");
        //liste modules
        $module=array(
            array("nom"=>"PHP",
                "id"=>1,"enseignant"=>"moussa",
                "nbheure"=>20,
                "date"=>"12-12-2022"),
            array("nom"=>"JAVA","id"=>2,"enseignant"=>"oussama","nbheure"=>12,"date"=>"12-10-2022"),
            array("nom"=>"HTML","id"=>3,"enseignant"=>"ssamira","nbheure"=>30,"date"=>"12-11-2023"),
            array("nom"=>"CSS","id"=>4,"enseignant"=>"mostfa","nbheure"=>14,"date"=>"10-10-2024")
        );
        return $this->render("etudiant/liste.html.twig",array("etudiants"=>$etudiants,"listeModules"=>$module));

    }
    #[Route('/Affectation',name:"Affectation")]
    public function affecter()
    {
        return $this->render("etudiant/affecter.html.twig");

    }


}
