<?php

namespace Modules\ProductModule\Repository;

use Illuminate\Support\Facades\DB;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ProductModule\Entities\CategoryOption;


use Modules\ProductModule\Entities\Category;

class CategoryRepository
{

    use UploaderHelper;

    function findCategoryById($id)
    {
        return Category::where('id', $id)->with(['parent', 'child', 'options'])->first();
    }

    function findAllCategories()
    {
        return Category::OrderBy('sort_order', 'desc')->get();
    }

    function getSelectedCategory()
    {
        return Category::where('in_home_page', 1)->OrderBy('sort_order', 'desc')->get();
    }


    function saveSelectedCategory($id, $status)
    {

        return Category::where('id', $id)->update(['in_home_page' => $status]);
    }

    function selecteProducts()
    {
        return Category::where('in_home_page', 1)->where('status', 1)->limit(3)->with(['parent', 'child', 'products'])->get();
    }

    function frontSelectedProducts()
    {
        $categories = Category::where('in_home_page', 1)
            ->where('status', 1)->with([
                'products' => function ($q) {
                    $q->orderBy('sort')->with(['images', 'category', 'discounts']);
                },
                'directProducts' => function ($q) {
                    $q->orderBy('sort')->with(['images', 'category', 'discounts']);
                }
            ])->get();
        return $categories;
    }


    function saveCategoryOption($id, $option_ids)
    {
        foreach ($option_ids as $key => $value) {
            CategoryOption::create(['category_id' => $id, 'option_id' => $value]);


        }

    }


    function searchCategoryByName($name)
    {
        return Category::where(function ($q) use ($name) {
            return $q->where('name_en', 'like', '%' . $name . '%')->orWhere('name_ar', 'like', '%' . $name . '%');
        })->where('status', 1)->with(['products', 'directproducts', 'child'])->get();
    }

    function findParentCategories()
    {
        // dd(Category::where('id',29)->with('products')->get());
        return Category::where('parent_id', null)->where('status', 1)->with(['child', 'brands'])->get();

    }

    function findCategoriesDosnotHaveChildern()
    {
        return Category::doesntHave('child')->get();
    }


    function findCategoriesDosnotHaveProducts()
    {

        return Category::doesntHave('directproducts')->doesntHave('parent.parent')->get();

    }


    function saveCategory($category_data, $photo, $banner)
    {
        $category_data['status'] = isset($category_data['status']) ? 1 : 0;
        $category_data['photo'] = $this->upload($photo, 'category');
        $category_data['banner'] = $this->upload($banner, 'category');
        return Category::create($category_data);
    }


    // $cildern_level=$this->getClidernLevel($category);


    function updateCategory($category, $data)
    {

        $new_parent_level = 0;
        if (isset($data['parent_id'])) {
            $parent = $this->findCategoryById($data['parent_id']);
            $new_parent_level = $this->getParentLevel($parent);
        }

        $cildern_level = $this->getClidernLevel($category);

        if ($cildern_level + $new_parent_level <= 3) {
            if (isset($data['photo']))
                $data['photo'] = $this->upload($data['photo'], 'category');
            if (isset($data['banner']))
                $data['banner'] = $this->upload($data['banner'], 'category');
            $data['status'] = isset($data['status']) ? 1 : 0;

            return $category->update($data);

        } else return false;

    }


    function deleteCategory($id)
    {

        $valid = $this->dosnotHaveProductsAndChildern($id);
        if ($valid) {
            CategoryOption::where('category_id', $valid->id)->delete();
            return $valid->delete();
        } else {
            return false;
        }


    }


    public function dosnotHaveProductsAndChildern($id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            if ($category->child()->count() || $category->products()->count() || $category->directproducts()->count()) {
                return false;
            } else {
                return $category;
            }
        } else {
            return false;
        }
    }

    public function getClidernLevel($category)
    {
        $level = 1;
        if ($category->child->count() > 0) {
            $level = 2;
            foreach ($category->child as $key => $child) {
                if ($child->child->count() > 0) {
                    $level = 3;
                    break;
                }
            }

        }
        return $level;
    }

    public function getParentLevel($category): int
    {
        if (isset($category->parent))
            return 2;
        return 1;
    }

    public function bulkStatus($ids, $status)
    {
        return Category::whereIn('id', $ids)->update(['status' => $status]);
    }

}
