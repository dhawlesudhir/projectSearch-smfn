<?php

namespace App\Controller;

use App\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function index(ManagerRegistry $doctrine)
    {
        $categoriesObject = $doctrine->getRepository(Categories::class)->findBy(['status' => true], []);
        // $categories = $doctrine->getRepository(Categories::class)->findAll();
        // dd($categories);
        // $categorys = [];
        foreach ($categoriesObject as $category) {
            $categorys[] =  [
                'id' => $category->getId(),
                'name' => $category->getName(),
                'color' => $category->getColor(),
            ];
        }
        return $this->json([
            'categories' => $categorys
        ]);
    }

    #[Route('/categories/{id}', name: 'app_resourcelist')]
    public function resourcelist($id, Categories $categories)
    {
        return $categories;
    }
}
