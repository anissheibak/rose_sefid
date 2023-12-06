<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryValueRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\CategoryValue;
use Illuminate\Http\Request;

class PropertyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryAttribute $attribute)
    {
        return view('admin.market.property.value.index', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryAttribute $attribute)
    {
        return view('admin.market.property.value.create', compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryValueRequest $request, CategoryAttribute $attribute)
    {
        $inputs=$request->all();
        $inputs['value'] = json_encode(['value' => $request->value, 'price_increase' => $request->price_increase]);
        $inputs['category_attribute_id'] = $attribute->id;
        $value=CategoryValue::create($inputs);
        return redirect()->route('admin.market.value.index', $attribute->id)->with('swal-success', 'مقدار جدید با موفقیت ثبت شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryAttribute $attribute, CategoryValue $value)
    {
        return view('admin.market.property.value.edit', compact('attribute', 'value'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryValueRequest $request, CategoryAttribute $attribute, CategoryValue $value)
    {
        $inputs=$request->all();
        $inputs['value'] = json_encode(['value' => $request->value, 'price_increase' => $request->price_increase]);
        $inputs['category_attribute_id'] = $attribute->id;
        $value->update($inputs);
        return redirect()->route('admin.market.value.index', $attribute->id)->with('swal-success', 'مقدار با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryAttribute $attribute, CategoryValue $value)
    {
        $result = $value->delete();
        return redirect()->route('admin.market.value.index', $attribute->id)->with('swal-success', '   مقدار با موفقیت حذف شد');
    }
}
