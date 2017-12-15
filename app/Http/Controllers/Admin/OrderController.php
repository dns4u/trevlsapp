<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends BaseController
{
    protected $base_route = 'admin.order';
    protected $view_path = 'admin.order';
    protected $panel = 'Order';
    protected $folder = 'product';
    protected $folder_path;

    public function __construct(Order $model)
    {
        $this->model = $model;
        $this->folder_path ='images'.DIRECTORY_SEPARATOR.$this->folder;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = $this->model->select(
            'id','product_name','passenger_seat','vehicle_class','vehicle_mileage','range',
            'transmission','stock','old_price_per_day','new_price_per_day','reservation_delivery_price',
            'discount_rate','taxes_fees','description','product_image','first_name','last_name','email','phone','address','dropoff_address'
              ,'return_address','from_date','to_date','insurance_personal','insurance_roadside','created_at','updated_at'
        )->orderBy('id', 'desc')->get();

        return view(parent::loadCommonDataToView($this->view_path.'.index'), compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $row = $this->model->find($id);
        parent::rowExist($row);
        $row->delete();
        $request->session()->flash('success_message', $this->panel.' deleted successfully.');
        return redirect()->route($this->base_route);
    }
}
