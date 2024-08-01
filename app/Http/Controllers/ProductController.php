<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $view;

    public function __construct()
    {
        $this->view = [];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadAllDataProductWithPager();
        // dd($this->view['listPro']);
        return view('product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllDataCategory();
        //dd($this->view['listCate']);
        return view('product.create', $this->view);
    }

    // phương thức uploadfile
    private function uploadFile($file)
    {
        $fileName = time() . "_" . $file->getClientOriginalName();
        return $file->storeAs('image_products', $fileName, 'public');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        // $validate = $request->validate(
        //     [
        //         'name' => ['required', 'string', 'max:255',],
        //         'price' => ['required', 'integer', 'min:1'],
        //         'quantity' => ['required', 'integer', 'min:1'],
        //         'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        //         'category_id' => ['required', 'exists:categories,id']
        //     ],
        //     [
        //         'name.required' => 'Tên không được bỏ trống',
        //         'name.string' => 'Tên phải là kiểu ký tự',
        //         'name.max' => 'Tên không được quá 255 ký tự',
        //         //lab5
        //         'price.required' => 'Giá không được để trống',
        //         'price.integer' => 'Giá phải là số nguyên',
        //         'price.min' => 'Giá phải lớn hơn hoặc bằng 1',

        //         'quantity.required' => 'Số lượng không được để trống',
        //         'quantity.integer' => 'Số lượng phải là số nguyên',
        //         'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1',

        //         'image.required' => 'Hình ảnh không được để trống',
        //         'image.image' => 'File phải là hình ảnh',
        //         'image.mimes' => 'Hình ảnh phải có định dạng jpg, png hoặc jpeg',
        //         'image.max' => 'Hình ảnh không được lớn hơn 2048 KB',

        //         'category_id.required' => 'Danh mục không được để trống',
        //         'category_id.exists' => 'Danh mục không hợp lệ',
        //     ]
        // );
        //dd($request->all());

        // loại bỏ trường ảnh
        $data = $request->except('image');
        // Kiểm xem anh đã được upload thành công
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->uploadFile($request->file('image'));
        }
        $objPro = new Product();
        $res = $objPro->insertDataProduct($data);
        if ($res) {
            return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
        } else {
            return redirect()->back()->with('error', 'Thêm sản phẩm không thành công!');
        }
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
    public function edit(int $id)
    {
        //
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllDataCategory();
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadIdDataProduct($id);
        return view('product.edit', $this->view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $objPro = new Product();
        $checkId = $objPro->loadIdDataProduct($id);
        $imageOld = $checkId->image;

        if ($checkId) {
            // loại bỏ trường ảnh
            $data = $request->except('image');
            // Kiểm xem ảnh đã được upload thành công
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $data['image'] = $this->uploadFile($request->file('image'));
                $flag = true;
            } else {
                $data['image'] = $imageOld;
            }
            $res = $objPro->updateDataProduct($data, $id);
            if ($res) {
                if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                    Storage::disk('public')->delete($imageOld);
                }
                return redirect()->back()->with('success', 'Sửa thành công!');
            } else {
                return redirect()->back()->with('error', 'Sửa không thành công!');
            }
        } else {
            return redirect()->back()->with('error', 'ID không chính xác!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        //dd($id);
        $objPro = new Product();
        $idCheck = $objPro->loadIdDataProduct($id);
        //$imgOld = $idCheck->image;
        if ($idCheck) {
            $res = $objPro->deleteDataProduct($id);
            if ($res) {
                // if (isset($imgOld)) {
                //     if (Storage::disk('public')->exists($imgOld)) {
                //         Storage::disk('public')->delete($imgOld);
                //     }
                // }
                return redirect()->back()->with('success','Xóa sản phẩm thành công!');
            }else{
                return redirect()->back()->with('error','Xóa sản phẩm không thành công!');

            }
        }else{
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }
    }
}
