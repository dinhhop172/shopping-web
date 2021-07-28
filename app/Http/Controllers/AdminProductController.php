<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;

    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        Tag $tag,
        ProductTag $productTag
    ) {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $optionSelect = $this->getCategory($parent_id = '');
        return view('admin.product.add', compact('optionSelect'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $optionSelect = $recusive->categoryRecusive($parent_id);
        return $optionSelect;
    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductImage = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'products');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductImage['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductImage['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $product = $this->product->create($dataProductImage);

            // insert data to product_images
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'products');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //insert to tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->attach($tagIds);
            }
            DB::commit();
            return redirect()->route('products.index');
        } catch (Exception $e) {
            DB::rollBack();
            \Log::error('Messenger: ' . $e->getMessage() . '. Line: ' . $e->getLine());
        }
    }

    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $optionSelect = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('optionSelect', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductImage = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'products');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductImage['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataProductImage['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $this->product->findOrFail($id)->update($dataProductImage);
            $product = $this->product->findOrFail($id);
            // insert data to product_images
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'products');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }

            //insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //insert to tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->sync($tagIds);
            }
            DB::commit();
            return redirect()->route('products.index');
        } catch (Exception $e) {
            DB::rollBack();
            \Log::error('Messenger: ' . $e->getMessage() . '. Line: ' . $e->getLine());
        }
    }
    public function destroy($id)
    {
        return $this->DeleteModel($id, $this->product);
    }
}
