<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Product\AddFormValidation;
use App\Http\Requests\Product\EditFormValidation;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends BaseController
{
    protected $base_route = 'admin.product';
    protected $view_path = 'admin.product';
    protected $panel = 'Product';
    protected $folder = 'product';
    protected $folder_path;

    public function __construct(Product $model)
    {
        $this->model = $model;
        $this->folder_path = 'images'.DIRECTORY_SEPARATOR.$this->folder;
    }
    public function index()
    {
        $data = [];
        $data['rows'] = $this->model->select(
            'id','product_name','passenger_seat','vehicle_class','vehicle_mileage','range',
            'transmission','stock','old_price_per_day','new_price_per_day','reservation_delivery_price',
            'discount_rate','taxes_fees','description','product_image','created_at','updated_at'
        )->orderBy('id', 'desc')->get();



        return view(parent::loadCommonDataToView($this->view_path.'.index'), compact('data'));
    }
    public function create()
    {

        return view(parent::loadCommonDataToView($this->view_path.'.create'));
    }
  public function store(AddFormValidation $request)
    {


        // file uploading
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $file_name = time().'_'.$file->getClientOriginalName();

            // check if folder exist
            $this->checkDirectoryExist();
            $file->move(public_path($this->folder_path), $file_name);
            $request->request->add(['product_image' => $file_name]);

        }

        $this->model->create($request->all());

        $request->session()->flash('success_message', $this->panel.' added successfully.');
        return redirect()->route($this->base_route);
   }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = [];
        $data['row'] = $this->model->find($id);
        parent::rowExist($data['row']);

        return view(parent::loadCommonDataToView($this->view_path.'.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = [];
        $data['row'] = $this->model->find($id);
        parent::rowExist($data['row']);

        return view(parent::loadCommonDataToView($this->view_path.'.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFormValidation $request, $id)
    {
        $row=$this->model->find($id);
        // file uploading
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $file_name = time().'_'.$file->getClientOriginalName();


            // check if folder exist
            $this->checkDirectoryExist();
            $file->move(public_path($this->folder_path), $file_name);
            $request->request->add(['product_image' => $file_name]);
            if ($row->product_image){
                if (file_exists(public_path($this->folder_path.DIRECTORY_SEPARATOR.$row->product_image)))
                    unlink(public_path($this->folder_path.DIRECTORY_SEPARATOR.$row->product_image));

            }

        }

        $row->update($request->all());
        $request->session()->flash('success_message', $this->panel.' Updated successfully.');
        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $row = $this->model->find($id);
        parent::rowExist($row);

        // remove image
        if ($row->product_image && file_exists(public_path($this->folder_path.DIRECTORY_SEPARATOR.$row->product_image)))
            unlink(public_path($this->folder_path.DIRECTORY_SEPARATOR.$row->product_image));

        $row->delete();
        $request->session()->flash('success_message', $this->panel.' deleted successfully.');
        return redirect()->route($this->base_route);

    }



}
