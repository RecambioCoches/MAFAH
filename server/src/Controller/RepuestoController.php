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
       
    
    #[Route('/repuesto', name: 'app_repuesto')]
    public function index(ManagerRegistry $doctrine): Response
    {
        // Entity manager
        $em = $doctrine->getManager();
        
        $repuesto = new Repuesto();
        $repuesto->setName("Motor");
        $repuesto->setPrice(5000);
        $repuesto->setDescription("Bueno y bonito");
        $repuesto->setShortDescription("Bueno");
        $repuesto->setImage("https://via.placeholder.com/150");
        // Ahora, debemos agregar category a nuestros nuevos products
        $category = new Category();
        $category->setName("motor");
        $em->persist($category);
        // Otra alternativa, sería asociar a una categoría existente
     /*   $category = $doctrine->getRepository(Category::class)->findOneBy([
            "name" => "miscellaneous"
        ]);*/
        $repuesto->setCategory($category);

        // Insert en base de datos
        $em->persist($repuesto);
        $em->flush();
        
        
        return $this->json([
            'repuesto' => [
                "id" => $repuesto->getId(),
                "name"=> $repuesto->getName(),
                 "price"=> $repuesto->getPrice(),
                "shortDescription"=> $repuesto->getShortDescription(),
                "Description"=> $repuesto->getDescription(),
                "category"=> $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
            ]
        ]);
    }
    
    
    
    
     
    #[Route('/repuesto-list', name: 'app_repuesto_list', methods: ["GET"])]
    public function repuestolist(ManagerRegistry $doctrine): Response
    {
        $repuestos = $doctrine->getRepository(Repuesto::class)->findAll();
        $repuestos_json=[];
        foreach ($repuestos as $repuesto){
            $tmp = [
                "id" => $repuesto->getId(),
                "name" => $repuesto->getName(),
                "price" => $repuesto->getPrice(),
                "shortDescription" => $repuesto->getShortDescription(),
                "Description" => $repuesto->getDescription(),
                "category" => $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
            ];
            $repuestos_json[] = $tmp;
        }
        return $this->json(
            $repuestos_json
        );
    }
    
    
         
    #[Route('/repuesto/details/{id}', name: 'app_repuesto_details')]
    public function repuestodetails(  $id, ManagerRegistry $doctrine): Response
    {
        $repuesto = $doctrine->getRepository(Repuesto::class)->findOneBy([
            "id" => $id
        ]);        
        $repuesto_json = [
                "id" => $repuesto->getId(),
                "name"=> $repuesto->getName(),
                "shortDescription"=> $repuesto->getShortDescription(),
                "Description"=> $repuesto->getDescription(),
                "price"=> $repuesto->getPrice(),
                "category"=> $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
        ];       
        return $this->json([
            "repuesto" => $repuesto_json
        ]);
    }
    
    #[Route('/repuesto/edit/{id}/{name}', name: 'app_repuesto_edit')]
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
                "Description"=> $repuesto->getDescription(),
                "price"=> $repuesto->getPrice(),
                "category"=> $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
        ];
        return $this->json([
            "repuesto" => $repuesto_json
        ]);
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
