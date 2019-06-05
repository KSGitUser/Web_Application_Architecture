<?php

declare (strict_types = 1);

namespace Service\Product;

use Model;
use Service\Product\Context;
use Service\Product\SortByName;
use Service\Product\SortByPrice;

class Product
{
    /**
     * Получаем информацию по конкретному продукту
     *
     * @param int $id
     * @return Model\Entity\Product|null
     */
    public function getInfo(int $id): ?Model\Entity\Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     *
     * @param string $sortType
     *
     * @return Model\Entity\Product[]
     */
    public function getAll(string $sortType = ''): array
    {
        $productList = $this->getProductRepository()->fetchAll();

        if ($sortType === '') {
            return $productList;
        }

        // Применить паттерн Стратегия
        // $sortType === 'price'; // Сортировка по цене
        // $sortType === 'name'; // Сортировка по имени
        $sortType = ucfirst($sortType);
        $className = "\Service\Product\SortBy" . $sortType;
        if (class_exists($className)) {
            $context = new Context(new $className());
            $productList = $context->doSort($productList);
        }

        return $productList;
    }

    /**
     * Фабричный метод для репозитория Product
     *
     * @return Model\Repository\Product
     */
    protected function getProductRepository(): Model\Repository\Product
    {
        return new Model\Repository\Product();
    }
}
