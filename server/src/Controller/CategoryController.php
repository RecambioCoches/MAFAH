<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $category = $doctrine->getRepository(Category::class)->findOneBy([
            "id" => 1]);
        
        $repuestos = $category->getRepuestos();

        return $this->json([
            'repuestos' => $repuestos
        ]);
    }
    
}
