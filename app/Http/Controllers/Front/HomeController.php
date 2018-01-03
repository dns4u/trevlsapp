<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Vehicle\ChooseVehicleValidation;
use App\Models\Order;
use App\Models\Product;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('front.home.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //store the address and the date of the user in session
    public function store(ChooseVehicleValidation $request)
    {
            $dropoffAddress=$request->get('dropoffAddress');
            $returnAddress=$request->get('returnAddress')?$request->get('returnAddress'):$request->get('dropoffAddress');
            $datepickFrom=$request->get('datepickerFrom');
            $datepickerTo=$request->get('datepickerTo');

           $request->session()->put('dropoffAddress',$dropoffAddress);
           $request->session()->put('returnAddress',$returnAddress);
           $request->session()->put('datepickerFrom',$datepickFrom);
           $request->session()->put('datepickerTo',$datepickerTo);


        return redirect()->route('front.product.select');


    }
    //show the all product
    public function select(Request $request)
    {
                $data=[];
                $data['rows']=Product::all();
                return view('front.home.select',compact('data'));

    }
    //show the product review page
    public function review(Request $request,$id){


              $data=[];
              $data['row']=Product::find($id)->toArray();
               

              $customer['dropoffAddress']=$request->session()->get('dropoffAddress');
              $customer['returnAddress']=$request->session()->get('returnAddress');
              $customer['datepickerFrom']=$request->session()->get('datepickerFrom');
              $customer['datepickerTo']=$request->session()->get('datepickerTo');

              $substrFromDate=substr($request->session()->get('datepickerFrom'),0,10);
              $substrFromTime=substr($request->session()->get('datepickerFrom'),11);
              $substrToDate=substr($request->session()->get('datepickerTo'),0,10);
              $substrToTime=substr($request->session()->get('datepickerTo'),11);
              $days=$this->dateDiff($substrFromDate,$substrToDate);
              $customer['days']=$days;
              if($data['row']['vehicle_class']=='e-Begin')
                $customer['tax']=$days*32.15;
              if($data['row']['vehicle_class']=='e-Full')
                $customer['tax']=$days*38.75;
              if($data['row']['vehicle_class']=='e-Premium')
                $customer['tax']=$days*57.70;
              $customer['priceOfProductPerDay']=$customer['days'] * $data['row']['new_price_per_day'];
              $customer['totalPriceOfProduct']=$customer['priceOfProductPerDay'] + $data['row']['reservation_delivery_price'] + $data['row']['taxes_fees'];
              $newArray=array_merge($data,$customer);
              return view('front.home.review',compact('newArray'));
    }
     public function storeReview(Request $request,$id){
      $rules=[
          'newdropoffAddress'=>'required|string',
          'newreturnAddress'=>'required|string',
          'newdatepickerFrom'=>'required|date|before:newdatepickerTo',
          'newdatepickerTo'=>'required|date|after:newdatepickerFrom',
      ];
      $msg=[
          'newdropoffAddress.required'=>'Dropoff Address Is Required.',
          'newdropoffAddress.string'=>'Dropoff Address Must Be String.',
          'newreturnAddress.required'=>'Return Address Is Required.',
          'newreturnAddress.string'=>'Return Address Must Be String.',
          'newdatepickerFrom.required'=>'From Date Is Required.',
          'newdatepickerFrom.date'=>'From Date Is Must Be valid Date.',
          'newdatepickerFrom.before'=>'From Date must Be A Date Before To.',
          'newdatepickerTo.required'=>'To Date Is Required',
          'newdatepickerTo.date'=>'To Date Is Must Be valid Date.',
          'newdatepickerTo.after'=>'To Date Must Be A Date After From Date.',
          'promoCode.required' =>'PromoCode Is Required.',
      ];
     $validator=Validator::make($request->all(),$rules,$msg);
        if ($validator->fails()){
            return response($validator->errors(),422);

        }
         $newdropoffAddress = $request->input( 'newdropoffAddress' );
         echo $newdropoffAddress;
            die;
         $newreturnAddress=$request->input('newreturnAddress');
         $newdatepickerFrom=$request->input('newdatepickerFrom');
         $newdatepickerTo=$request->input('newdatepickerTo');
         $checkboxValue=$request->input('checkboxValue');
         $promoCode=$request->input('promoCode');

         $request->session()->put('newdropoffAddress',$newdropoffAddress);
         $request->session()->put('newreturnAddress',$newreturnAddress);
         $request->session()->put('newdatepickerFrom',$newdatepickerFrom);
         $request->session()->put('newdatepickerTo',$newdatepickerTo);
         $request->session()->put('chekboxValue',$checkboxValue);
         $request->session()->put('promoCode',$promoCode);


        return response(['success'=>'success'],200);
       }
    //show the user detail form to user
       public function userDetail(Request $request,$id){


             $data=[];
             $data['row']=Product::find($id);
             return view('front.home.userDetail',compact('data'));

     }
       //store the user detail send from the user detail form
        public function userDetailSend(Request $request,$id){
            $this->validate($request,[
               'first_name'=>'required|string',
                'last_name'=>'required|string',
                'email'=>'required|email',
                'phone'=>'required|numeric',
                'address'=>'required|string'
            ]);
            $data=[];
            $data['row']=Product::find($id)->toArray();
            $customer['newdropoffAddress']=$request->session()->get('newdropoffAddress');
            $customer['newreturnAddress']=$request->session()->get('newreturnAddress');
            $customer['newdatepickerFrom']=$request->session()->get('newdatepickerFrom');
            $customer['newdatepickerTo']=$request->session()->get('newdatepickerTo');



            $substrFromDate=substr($request->session()->get('newdatepickerFrom'),0,10);
            $substrFromTime=substr($request->session()->get('newdatepickerFrom'),11);
            $substrToDate=substr($request->session()->get('newdatepickerTo'),0,10);
            $substrToTime=substr($request->session()->get('newdatepickerTo'),11);
            $days=$this->dateDiff($substrFromDate,$substrToDate);
            $customer['days']=$days;
            $customer['priceOfProductPerDay']=$customer['days'] * $data['row']['new_price_per_day'];
            $customer['totalPriceOfProduct']=$customer['priceOfProductPerDay'] +
                $data['row']['reservation_delivery_price'] +
                $data['row']['taxes_fees'] + $request->session()->get('$checkboxValue');
            $first_name=$request->get('first_name');
            $last_name=$request->get('last_name');
            $email=$request->get('email');
            $phoneNumber=$request->get('phone');
            $address=$request->get('address');
            $picked_up_time=$request->get('picked_up_time');
            $product=Product::find($id);
            $order=new Order();
            $order->product_name=$product->product_name;
            $order->vehicle_class=$product->vehicle_class;
            $order->vehicle_mileage=$product->vehicle_mileage;
            $order->passenger_seat=$product->passenger_seat;
            $order->range=$product->range;
            $order->transmission=$product->transmission;
            $order->stock=$product->stock;
            $order->old_price_per_day=$product->old_price_per_day;
            $order->new_price_per_day=$product->new_price_per_day;
            $order->reservation_delivery_price=$product->reservation_delivery_price;
            $order->discount_rate=$product->discount_rate;
            $order->taxes_fees=$product->taxes_fees;
            $order->description=$product->description;
            $order->product_image=$product->product_image;
            $order->first_name=$first_name;
            $order->last_name=$last_name;
            $order->email=$email;
            $order->phone=$phoneNumber;
            $order->address=$address;
            $order->picked_up_time=$picked_up_time;
            $order->dropoff_address=$request->session()->get('newdropoffAddress');
            
            $order->return_address=$request->session()->get('newreturnAddress');
            $order->from_date=$request->session()->get('newdatepickerFrom');
            $order->to_date=$request->session()->get('newdatepickerTo');
            if($request->session()->get('chekboxValue')==0){
                //no no thing
            }else{
                if($request->session()->get('chekboxValue')==$product->insurance_personal){
                    $order->insurance_personal=$request->session()->get('chekboxValue');
                }
                if($request->session()->get('chekboxValue')==$product->insurance_roadside){
                    $order->insurance_roadside=$request->session()->get('chekboxValue');
                }
                if($request->session()->get('chekboxValue')==($product->insurance_personal + $product->insurance_roadside )){
                    $order->insurance_personal=$product->insurance_personal;
                    $order->insurance_roadside=$product->insurance_roadside;

                }
            }
            $insurance_personal_price=0;
            $insurance_roadside_price=0;
            if($request->session()->get('chekboxValue')==0){
                //no no thing
            }else{
                if($request->session()->get('chekboxValue')==$product->insurance_personal){
                    $insurance_personal_price=$request->session()->get('chekboxValue');
                }
                if($request->session()->get('chekboxValue')==$product->insurance_roadside){
                    $insurance_roadside_price=$request->session()->get('chekboxValue');
                }
                if($request->session()->get('chekboxValue')==($product->insurance_personal + $product->insurance_roadside )){
                    $insurance_personal_price=$product->insurance_personal;
                    $insurance_roadside_price=$product->insurance_roadside;

                }
            }
            $order->total=$customer['priceOfProductPerDay'] +
                $data['row']['reservation_delivery_price'] +
                $data['row']['taxes_fees'] +  $insurance_personal_price + $insurance_roadside_price;
            $order->save();
            $data=array(
                'email'=>$request->get('email'),
                'full_name'=>$request->get('first_name').' '.$request->get('last_name'),
                'phone'=>$request->get('phone'),
                'address'=>$request->get('address'),
                'product_name'=>$product->product_name,
                'vehicle_class'=>$product->vehicle_class,
                'reservation_delivery_price'=>$product->reservation_delivery_price,
                'taxes_fees'=>$product->taxes_fees,
                'insurance_personal_price'=>$insurance_personal_price,
                'insurance_roadside_price'=>$insurance_roadside_price,
                'price_of_product_per_day'=>$customer['priceOfProductPerDay'],
                'totalPriceOfProduct'=>$customer['priceOfProductPerDay'] +
                    $data['row']['reservation_delivery_price'] +
                    $data['row']['taxes_fees'] +  $insurance_personal_price + $insurance_roadside_price,
                'promoCode'=>$request->session()->get('promoCode')


            );
          /* Mail::send('emails.contact',$data,function ($message) use ($data){
             $message->from($data['email']);
             $message->to('dinesh.regmi048@gmail.com');
             $message->subject('New Order Recived');
            });
            */

         $request->session()->flush();
        $request->session()->flash('success_message','Your order is successfully send');
        return redirect()->route('front.home');


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
    public function destroy($id)
    {
        //
    }
    function dateDiff($start, $end)
    {
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }

}
