<?php

namespace Botble\Quotation\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Quotation\Http\Requests\ProductRequest;
use Botble\Quotation\Repositories\Interfaces\ProductInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Quotation\Models\Product;
use Botble\Quotation\Models\Underwriter;
use Botble\Quotation\Tables\ProductTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Quotation\Forms\ProductForm;
use Botble\Base\Forms\FormBuilder;
use Auth;

class ProductController extends BaseController
{
    /**
     * @var ProductInterface
     */
    protected $productRepository;

    /**
     * @param ProductInterface $productRepository
     */
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param ProductTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
     public function index() {
        page_title()->setTitle(trans('plugins/quotation::general.products'));
        $products = Product::with('underwriters', 'users', 'motorprivaterates')->get();
        return view('plugins/quotation::products.index', compact('products'));
    }

    public function create() {
        page_title()->setTitle(trans('plugins/quotation::general.create'));
        $underwriters = Underwriter::all();
        return view('plugins/quotation::products.create', compact('underwriters'));
    }

    public function store(Request $request, BaseHttpResponse $response)
    {
        $this->validate($request, [
                'name' => 'required',
                'underwriter_id' => 'required',
                'category' => 'required',
                'product_brochure' => 'required|mimes:pdf|max:5048',
            ]
        );

        $files = $request->file('product_brochure');
        $destinationPath = 'images/underwriter/brochures'; // upload path
        $logo = preg_replace('/[^A-Za-z0-9\-]/', '', $request->name) . '.' . $files->getClientOriginalExtension();
        $logopath = $files->move($destinationPath, $logo);
        $product = Product::create([
            'name' => $request->name,
            'underwriter_id' => $request->underwriter_id,
            'category' => $request->category,
            'status' => $request->status,
            'cover_type' => $request->cover_type,
            'product_description' => $request->product_description,
            'product_brochure' => $logopath,
            'added_by' => Auth::user()->id
        ]);
        event(new CreatedContentEvent(PRODUCT_MODULE_SCREEN_NAME, $request, $product));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit($id)
    {
        $product = Product::with('underwriters')->findOrFail($id);
        $underwriters = Underwriter::all();
        return view('plugins/quotation::products.edit', compact('product', 'underwriters'));
    }

    public function update(Request $request, Product $product, BaseHttpResponse $response)
    {
        $this->validate($request, [
            'name' => 'required',
            'underwriter_id' => 'required',
            'category' => 'required'
        ]
        );
        if($request->hasfile('product_brochure')){
            $files = $request->file('product_brochure');
            $destinationPath = 'images/underwriter/brochures'; // upload path
            $logo = preg_replace('/[^A-Za-z0-9\-]/', '', $request->name) . '.' . $files->getClientOriginalExtension();
            $logopath = $files->move($destinationPath, $logo);
        }
        
  
        $product->update([
            'name' => $request->name,
            'underwriter_id' => $request->underwriter_id,
            'category' => $request->category,
            'status' => $request->status,
            'cover_type' => $request->cover_type,
            'product_description' => $request->product_description,
            'product_brochure' => $logopath ?? '',
            'added_by' => Auth::id()
        ]);
        event(new UpdatedContentEvent(PRODUCT_MODULE_SCREEN_NAME, $request, $product));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function show($id)
    {
        $product = Product::with('underwriters', 'users','motorprivaterates', 'domesticrates', 'healthrates')->where('id', $id)->first();
        return view('plugins/quotation::products.show', compact('product'));
    }

    public function destroy(Product $product, Request $request, BaseHttpResponse $response)
    {
        $product->delete();
        event(new DeletedContentEvent(PRODUCT_MODULE_SCREEN_NAME, $request, $product));

        return $response
            ->setNextUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
