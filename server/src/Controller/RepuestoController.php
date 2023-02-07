<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Repuesto;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class RepuestoController extends AbstractController
{
    public function __constructor(ManagerRegistry $doctrine){}
       
    
    #[Route('/repuesto/new/{name}/{price}/{shortDescription}/{description}/{categoryName}/{image}', name: 'app_repuesto')]
    public function index(ManagerRegistry $doctrine,$name,$price,$shortDescription,$description,$categoryName,$image): Response
    {
        // Entity manager
        $em = $doctrine->getManager();
        
        $repuesto = new Repuesto();
        $repuesto->setName($name);
        $repuesto->setPrice($price);
        $repuesto->setDescription($description);
        $repuesto->setShortDescription($shortDescription);
        $repuesto->setImage($image);

        $categoryTemp = $doctrine->getRepository(Category::class)->findOneBy([
            "name" => $categoryName]);
        if ($categoryTemp != null){
            $category = new Category();
            $category->setName($categoryName);
            $em->persist($category);
        }else{
            $repuesto->setCategory($categoryTemp);
        }

        $em->persist($repuesto);
        $em->flush();
        
        
        return $this->json(
            [
                "id" => $repuesto->getId(),
                "name"=> $repuesto->getName(),
                 "price"=> $repuesto->getPrice(),
                "shortDescription"=> $repuesto->getShortDescription(),
                "description"=> $repuesto->getDescription(),
                "category"=> $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
            ]
        );
    }
     
    #[Route('/repuesto', name: 'app_repuesto_list', methods: ["GET"])]
    public function repuesto(ManagerRegistry $doctrine): Response
    {
        $repuestos = $doctrine->getRepository(Repuesto::class)->findAll();
        $repuestos_json=[];
        foreach ($repuestos as $repuesto){
            $tmp = [
                "id" => $repuesto->getId(),
                "name" => $repuesto->getName(),
                "price" => $repuesto->getPrice(),
                "shortDescription" => $repuesto->getShortDescription(),
                "description" => $repuesto->getDescription(),
                "category" => $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
            ];
            $repuestos_json[] = $tmp;
        }
        return $this->json(
            $repuestos_json
        );
    }
    
    
         
    #[Route('/repuesto/details/{id}', name: 'app_repuesto_details', methods: ["GET"])]
    public function repuestodetails(  $id, ManagerRegistry $doctrine): Response
    {
        $repuesto = $doctrine->getRepository(Repuesto::class)->findOneBy([
            "id" => $id
        ]);        
        $repuesto_json = [
                "id" => $repuesto->getId(),
                "name"=> $repuesto->getName(),
                "shortDescription"=> $repuesto->getShortDescription(),
                "description"=> $repuesto->getDescription(),
                "price"=> $repuesto->getPrice(),
                "category"=> $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
        ];       
        return $this->json(
            $repuesto_json
        );
    }
    
    #[Route('/repuesto/edit/{id}/{name}', name: 'app_repuesto_edit', methods: ["PUT"])]
    public function repuestoedit(  $id,$name  ,   ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $repuesto = $doctrine->getRepository(Repuesto::class)->findOneBy([
            "id" => $id
        ]); 
        $repuesto->setName($name);
        // Actualizamos el valor
        $em->persist($repuesto);
        $em->flush();
        $repuesto1 = $doctrine->getRepository(Repuesto::class)->findOneBy([
            "id" => $id
        ]);
        $repuesto_json = [
                "id" => $repuesto->getId(),
                "name"=> $repuesto->getName(),
                "shortDescription"=> $repuesto->getShortDescription(),
                "description"=> $repuesto->getDescription(),
                "price"=> $repuesto->getPrice(),
                "category"=> $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
        ];
        return $this->json(
            $repuesto_json
        );
    }

    #[Route('/repuesto/delete/{id}', name: 'app_repuesto_delete')]
    public function repuestoDelete(ManagerRegistry $doctrine, $id): Response
    {
        $em = $doctrine->getManager();
        $repuesto = $doctrine->getRepository(Repuesto::class)->findOneBy([
            "id" => $id
        ]);

        $em->remove($repuesto);
        $em->flush();

        return $this->json([
            "message" =>"Repuesto eliminado."
        ]);
    }
    
}
