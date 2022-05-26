<?php
namespace Modules\ProductModule\Contracts;

use Exception;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Repository\ProductRepository;

class StrategyContext
{
    private $strategy = NULL;
    private $productRepository;

    //bookList is not instantiated at construct time
    public function __construct($strategy_ind_id)
    {

        switch ($strategy_ind_id) {
            case "MainData":
                $this->strategy = new ProductMainData();
                break;
            case "Attributes":
                $this->strategy = new ProductAttributes();
                break;
            case "Images":
                $this->strategy = new ProductImage();
                break;
            case "Dicount":
                $this->strategy = new ProductDicount();
                break;
            case "Combination":
                $this->strategy = new ProductCombination();
                break;
            case "ProductQuantity":
                $this->strategy = new ProductQuantity();
                break;


        }


    }

    public function UpdateProductData($data, $id)
    {
        $product = Product::find($id);
        return $this->strategy->Update($product, $data);
    }
}

interface StrategyInterface
{
    public function Update($data, $product);
}


class ProductName implements StrategyInterface
{
    public function Update($data, $product)
    {
        return Product::where('id', $product)->update($data);
    }
}

class ProductImage implements StrategyInterface
{
    public function Update($product, $data)
    {
        $this->productRepository = new ProductRepository();
        return $this->productRepository->updateProductImages($product, $data);
    }
}


class ProductAttributes implements StrategyInterface
{

    public function Update($product, $data)
    {
        request()->validate([
            'attributes.*.attribute_value' => 'required',
            'attributes.*.attribute_id' => 'required',
        ]);

        $this->productRepository = new ProductRepository();
        return $this->productRepository->updateProductAttributes($product, $data);
    }

}

class ProductDicount implements StrategyInterface
{

    public function Update($product, $data)
    {

        request()->validate([
            'discount.*.discount_type' => 'bail|required',
            'discount.*.discount_value' => 'required|numeric',
            'discount.*.discount_quantity' => 'required|numeric',
            'discount.*.start_date' => 'required_unless:discount.*.end_date,|date|nullable',
            'discount.*.end_date' => 'required_unless:discount.*.start_date,|after_or_equal:discount.*.start_date|nullable'

        ]);

        $this->productRepository = new ProductRepository();
        return $this->productRepository->updateProductDiscount($product, $data);
    }

}

class ProductMainData implements StrategyInterface
{

    public function Update($product, $data)
    {
        try {
            parse_str(parse_url($data['yt_video'], PHP_URL_QUERY), $queries);
            $data['yt_video'] = $queries['v'];
        } catch (Exception $e) {
            $data['yt_video'] = null;
        }

        $this->productRepository = new ProductRepository();
        return $this->productRepository->updateProductMainData($product, $data);
    }

}

class ProductCombination implements StrategyInterface
{

    public function Update($product, $data)
    {
        request()->validate([
            'combination_qty.*' => 'bail|required|numeric',
            'combination_price.*' => 'required|numeric',
            'options.*.option_id' => 'required',
            'combination_values' => 'required',
        ]);

        $this->productRepository = new ProductRepository();
        $main_data['product_quantity'] = 0;
        $main_data['type'] = $data['type'];
        $this->productRepository->updateProductMainData($product, $main_data);

        $this->productRepository->updateProductCombinations($product, $data);


    }

}

class ProductQuantity implements StrategyInterface
{

    public function Update($product, $data)
    {
        request()->validate([
            'product_quantity' => 'bail|required|numeric',
        ]);

        $this->productRepository = new ProductRepository();
        $this->productRepository->updateProductMainData($product, $data);
        $this->productRepository->deleteAllOptionsAndCombinations($product);


    }

}


?>
