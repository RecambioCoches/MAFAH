<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Repuesto;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class RepuestoController extends AbstractController
{
    public function __constructor(ManagerRegistry $doctrine){}
       
    
//    #[Route('/repuesto/new', name: 'app_repuesto')]
//    public function index(ManagerRegistry $doctrine): Response
//    {
//        // Entity manager
//        $em = $doctrine->getManager();
//
//        $repuesto = new Repuesto();
//        $repuesto->setName($name);
//        $repuesto->setPrice($price);
//        $repuesto->setDescription($description);
//        $repuesto->setShortDescription($shortDescription);
//        $repuesto->setImage($image);
//
//        $categoryTemp = $doctrine->getRepository(Category::class)->findOneBy([
//            "name" => $categoryName]);
//        if ($categoryTemp != null){
//            $category = new Category();
//            $category->setName($categoryName);
//            $em->persist($category);
//        }else{
//            $repuesto->setCategory($categoryTemp);
//        }
//
//        $em->persist($repuesto);
//        $em->flush();
//
//
//        return $this->json(
//            [
//                "id" => $repuesto->getId(),
//                "name"=> $repuesto->getName(),
//                 "price"=> $repuesto->getPrice(),
//                "shortDescription"=> $repuesto->getShortDescription(),
//                "description"=> $repuesto->getDescription(),
//                "category"=> $repuesto->getCategory()->getName(),
//                "image"=>$repuesto->getImage()
//            ]
//        );
//    }

        #[Route('/repuesto/new', name: 'app_repuesto')]
        public function createProduct(Request $request,ManagerRegistry $doctrine):Response{

        $data = $request->getContent();
        $content = json_decode($data);

        $em = $doctrine->getManager();;


        $repuesto = new Repuesto();
        $repuesto->setName($content->name);
        $repuesto->setPrice($content->price);
        $repuesto->setDescription($content->description);
        $repuesto->setShortDescription($content->shortDescription);
        $repuesto->setImage($content->image);

        $categoryTemp = $doctrine->getRepository(Category::class)->findOneBy([
            "name" => $content->category]);

        if ($categoryTemp == null){
            $categoryNew = new Category();
            $categoryNew->setName($content->category);
            $em->persist($categoryNew);
            $repuesto->setCategory($categoryNew);
        }else{
            $repuesto->setCategory($categoryTemp);
        }

        $em->persist($repuesto);
        $em->flush();

        $result = [
            'name'=>$repuesto->getName(),
            'price'=>$repuesto->getPrice()
        ];
        return $this->json([
           $categoryTemp
        ]);
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
