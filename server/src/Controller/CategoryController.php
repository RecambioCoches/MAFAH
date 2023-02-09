<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Repuesto;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category-repuestos/{id}', name: 'app_category')]
    public function index(ManagerRegistry $doctrine, $id): Response
    {
        $category = $doctrine->getRepository(Category::class)->findOneBy([
            "id" => $id]);
        if ($category == null){
            return $this->json([
            'repuestos' => "No hay repuestos en esta categoria"
        ]);
        }
        
        $repuestos = $category->getRepuestos();
        $repuestos_json=[];
        $tmp=[];

        foreach ($repuestos as $repuesto){
            $tmp[] = [
                "id" => $repuesto->getId(),
                "name" => $repuesto->getName(),
                "price" => $repuesto->getPrice(),
                "shortDescription" => $repuesto->getModel(),
                "Description" => $repuesto->getDescription(),
                "category" => $repuesto->getCategory()->getName(),
                "image"=>$repuesto->getImage()
            ];
            $repuestos_json[] = $tmp;
        }
        return $this->json([
            'repuestos' => $repuestos_json
        ]);
    }


    #[Route('/category-list', name: 'app_category_list')]
    public function categorylist(ManagerRegistry $doctrine): Response
    {
        $categories = $doctrine->getRepository(Category::class)->findAll();
        $categories_json=[];
        foreach ($categories as $category){
            $tmp = [
                "id" => $category->getId(),
                "name" => $category->getName(),
            ];
            $categories_json[] = $tmp;
        }
        return $this->json([
            "categorias" => $categories_json
        ]);
    }



    #[Route('/category/edit/{id}/{name}', name: 'app_category_edit')]
    public function categoryedit(  $id,$name  ,   ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $category = $doctrine->getRepository(Category::class)->findOneBy([
            "id" => $id
        ]);
        $category->setName($name);
        // Actualizamos el valor
        $em->persist($category);
        $em->flush();

        $repuesto_json = [
                "id" => $category->getId(),
                "name"=> $category->getName(),
        ];
        return $this->json([
            "repuesto actualizado" => $repuesto_json
        ]);
    }


    #[Route('/category/delete/{id}', name: 'app_category_delete')]
    public function repuestoDelete(ManagerRegistry $doctrine, $id): Response
    {
        $em = $doctrine->getManager();
        $category = $doctrine->getRepository(Category::class)->findOneBy([
            "id" => $id
        ]);

        $em->remove($category);
        $em->flush();

        return $this->json([
            "message" =>"Categoria eliminada."
        ]);
    }



    #[Route('/category/details/{id}', name: 'app_category_details')]
    public function repuestodetails(  $id, ManagerRegistry $doctrine): Response
    {
        $category = $doctrine->getRepository(Category::class)->findOneBy([
            "id" => $id
        ]);
        $category_json = [
                "id" => $category->getId(),
                "name"=> $category->getName(),

        ];
        return $this->json([
            "category" => $category_json
        ]);
    }
    
}
