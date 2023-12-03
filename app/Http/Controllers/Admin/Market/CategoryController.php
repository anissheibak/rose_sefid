<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories=ProductCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories=ProductCategory::where('parent_id', null)->get();
        return view('admin.market.category.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request, ImageService $imageService)
    {
        $inputs=$request->all();
        if($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if($result === false){
                return redirect()->route('admin.market.category.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد.');
            }

            $inputs['image'] = $result;
        }
        $productCategory=ProductCategory::create($inputs);
        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته‌بندی جدید با موفقیت ثبت شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        $parent_productCategories=ProductCategory::where('parent_id', null)->get()->except($productCategory->id);
        return view('admin.market.category.edit', compact('productCategory', 'parent_productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory, ImageService $imageService)
    {
        $inputs=$request->all();
        if($request->hasFile('image')){
            if(!empty($productCategory->image)){
                $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if($result === false){
                return redirect()->route('admin.market.category.create')->with('swal-error', 'آپلود تصویر با خطا مواجه شد.');
            }

            $inputs['image'] = $result;
        }
        else{
            if(isset($inputs['currentImage']) && !empty($productCategory->image)){
                $image = $productCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        $productCategory->update($inputs);
        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته‌بندی با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $result=$productCategory->delete();
        return redirect()->route('admin.market.category.index')->with('swal-error', 'دسته‌بندی با موفقیت حذف شد.');
    }

    public function status(ProductCategory $productCategory)
    {
        $productCategory->status = $productCategory->status == 0 ? 1: 0;
        $result = $productCategory->save();
        if($result){
            if($productCategory->status == 0){
                return response()->json(['status' => true, 'checked' => false]);
            }
            else{
                return response()->json(['status' => true, 'checked' => true]);
            }
        }
        else{
            return response()->json(['status' => false]);
        }
    }

    public function showInMenu(ProductCategory $productCategory)
    {
        $productCategory->show_in_menu = $productCategory->show_in_menu == 0 ? 1: 0;
        $result = $productCategory->save();
        if($result){
            if($productCategory->show_in_menu == 0){
                return response()->json(['status' => true, 'checked' => false]);
            }
            else{
                return response()->json(['status' => true, 'checked' => true]);
            }
        }
        else{
            return response()->json(['status' => false]);
        }
    }
}
