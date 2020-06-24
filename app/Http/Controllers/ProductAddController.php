<?php /** @noinspection ALL */

namespace App\Http\Controllers;

//use App\Cart;
use App\Order;
use App\Http\Requests\CreateProductRequest;
use App\ProductAdd;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use function GuzzleHttp\Promise\all;
//use Illuminate\Support\Facades\Session;

class ProductAddController extends Controller
{
    public function index()
    {

        $productadd = ProductAdd::first();
//        return ProductAdd::query()->select(['name','description','path','price'])->get();
//        return ProductAdd::find(1);
//    dd($productadd);

        return view('ProductAdd.index', ['productadd' => $productadd]);

    }

    public function create()
    {
        return view('ProductAdd.create');
    }


    public function edit($id)
    {
        $productadd = ProductAdd::query()
            ->where('id', '=', $id)
            ->first();
        return view('ProductAdd.edit', ['productadd' => $productadd]);
    }

    public function update(Request $request, $id)
    {
//        Ne radi CreateProductRequest kad se pozve!!!
        $productadd = ProductAdd::query()
            ->where('id', '=', $id)
            ->first();
        $productadd->update($request->only(['name', 'description', 'Path', 'price']));
        return redirect('/product-add');

    }


    public function store(CreateProductRequest $request)
    {
//        Ne radi CreateProductRequest kad se pozove!!!---Validate
        //request
        //save
//        Prvi nacin:
//        $ProductAdd = new ProductAdd();
//        $ProductAdd->name =$request->input('name');
//        $ProductAdd->description =$request->input('description');
//        $ProductAdd->Path =$request->input('Path');
//        $ProductAdd->price =$request->input('price');
//        $ProductAdd->save();

        ProductAdd::query()->create($request->only(['name', 'description', 'Path', 'price']));

        return redirect('/product-add');


    }

    public function display()
    {

        $productadd = ProductAdd::all();
        return view('shop', ['productadd' => $productadd]);
    }


//    public function AddToCart(ProductAdd $product){
//
////        dd($product);
//        //add to cart
//
//        Cart::session(auth()->id())->add(array(
//            'id' => $product->id,
//            'name' => $product->name,
//            'price' => $product->price,
//            'quantity' => 4,
//            'attributes' => array(),
//            'associatedModel' => $product
//        ));
//        return redirect()->route('cart.index');
//    }
//
    public function cart()
    {
        return view('cart.index');

    }

    //    public function AddToCart(Request $request, $id){
//        $productadd = ProductAdd::find($id);
//        $oldCart = Session::has('cart') ? Session::get('cart'):null;
//        $cart= new Cart($oldCart);
//        $cart->add($productadd, $productadd->id);
//
//        $request->session()->put('cart',$cart);
//        dd($request->session()->get('cart'));
//        return redirect('cart');
//
//    }

    public function show()
    {
        $products = ProductAdd::all();

        return view('products', compact('products'));
    }


//  CART
    public function AddToCart($id)
    {
        $product = ProductAdd::find($id);
//        dd($product);
        if (!$product) {

            abort(404);

        }

        $cart = session()->get('cart');
//dd(array($product));
        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "path" => $product->path,
                    "price" => $product->price,
                ]
            ];

            session()->put('cart', $cart);
//        dd($cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "path" => $product->path,
            "price" => $product->price,
        ];

        session()->put('cart', $cart);
//    dd($cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function updatecart(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }
//
//    public function remove($id)
//    {
//
//    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    //CHECKOUT
    public function testcheckout(){
        return view('checkout');
    }





//    end
}




