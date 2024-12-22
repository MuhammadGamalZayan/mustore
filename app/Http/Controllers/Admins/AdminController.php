<?php

namespace App\Http\Controllers\Admins;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Product\Order;
use App\Models\Priv\Admin;
use Redirect;
use Illuminate\Support\Facades\Hash;
use File;

class AdminController extends Controller
{
    public function adminLogin() {
        return view('admins.login');
    }
    public function checkLogin(Request $request) {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index() {
        $productsCount = Product::select()->count();
        $categoryCount = Category::select()->count();
        $ordersCount = Order::select()->count();
        $adminCount = Admin::select()->count();
        return view('admins.index', compact('productsCount', 'categoryCount', 'adminCount', 'ordersCount'));
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout(); // تأكد أنك تستخدم الحارس الخاص بالإدمن

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login'); // أعد توجيه الإدمن إلى صفحة تسجيل الدخول الخاصة به
    }
    public function adminsPage() {
        $adminsMembers = Admin::All();
        return view('admins.admins', compact('adminsMembers'));
    }
    
    public function createAdmin() {
        return view('admins.create-admins');
    }

    public function storeAdmin(Request $request) {
        $storeAdmins = Admin::create([
            "email" => $request->email,
            "name" => $request->name,
            "password" => Hash::make($request->password),
        ]);
        if($storeAdmins) {
            return Redirect::route('admins.page')->with(['success'=>'Admin has been created successfully']);
        }
    }

    public function showCategories() {
        $allCategories = Category::select()->orderBy('id', 'desc')->get();
        return view('admins.categories', compact('allCategories'));
    }

    public function createCategory() {
        return view('admins.createcategory');
    }
    public function storeCategory(Request $request) {
        $destinationPath = 'assets/img/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $storeCategory = Category::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'category_desc' => $request->category_desc,
            'image' => $myimage,
        ]);
        if($storeCategory) {
            return Redirect::route('admins.categories')->with(['success'=>'Category has been created successfully']);
        }
    }

    public function updateCategory($id) {
        $allCategories = Category::find($id);
        return view('admins.updatecategory', compact('allCategories'));
    }

    public function editCategory(Request $request, $id) {
        $updateCategory = Category::find($id);
        $updateCategory->update($request->all());
        // return view('admins.updatecategory', compact('updateCategory'));
        if($updateCategory) {
            return Redirect::route('admins.categories')->with(['update' =>'Your Category ' . $updateCategory->name . ' Updated Successfully']);
        }
    }
    public function deletecategory($id) {
        $deleteCategory = Category::find($id);
        if(File::exists(public_path('assets/img/' . $deleteCategory->image))){
            File::delete(public_path('assets/img/' . $deleteCategory->image));
        }else{
            //dd('File does not exists.');
        }

        $deleteCategory->delete();
        // return view('admins.updatecategory', compact('updateCategory'));
        if($deleteCategory) {
            return Redirect::route('admins.categories')->with(['delete' =>'Your Category ' . $deleteCategory->name . ' Deleted Successfully']);
        }
    }

    public function allProducts() {
        $products = Product::select()->orderBy('id', 'desc')->get();
        return view('admins.products', compact('products'));
    }

    public function deleteProduct($id) {
        $deleteProduct = Product::find($id);
        if(File::exists(public_path('assets/img/' . $deleteProduct->image))){
            File::delete(public_path('assets/img/' . $deleteProduct->image));
        }else{
            //dd('File does not exists.');
        }
        $deleteProduct->delete();
        if($deleteProduct) {
            return Redirect::route('products.page')->with(['delete' =>'Your Product ' . $deleteProduct->name . ' Deleted Successfully']);
        }
        // return view('admins.products', compact('products'));
    }

    public function createProduct() {
        $showCategroeis = Category::all();
        return view('admins.create-products', compact('showCategroeis'));
    }

    public function storeProduct(Request $request) {
        $destinationPath = 'assets/img/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $storeProduct = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'exp_date' => $request->exp_date,
            'image' => $myimage,
        ]);
        if($storeProduct) {
            return Redirect::route('products.page')->with(['success'=>'Category has been created successfully']);
        }
    }

    public function allOrders() {
        $allOrders = Order::select()->orderBy('id', 'desc')->get();
        return view('admins.orders', compact('allOrders'));
    }
    public function editOrders($id) {
        $editOrder = Order::find($id);
        return view('admins.editorders', compact('editOrder'));
    }
    
    public function updateOrders(Request $request, $id) {
        $updateStatus = Order::find($id);
        $updateStatus->update($request->all());
        if($updateStatus) {
            return Redirect::route('products.orders')->with(['success' => 'Your Order ID ' . $updateStatus->id . ' Update Successfully']);
        }
    }
}
