<?php
namespace App\Traits\api;
trait ApiresponseTrait
{


    public function apiresponse($Data=null,$message=null,$status=null)
    {

      if($Data)
      {
        $array =[
            'Data'=>$Data,
            'message'=>$message,
            'status'=>$status
      ];
        return response($array,$status);
      }else
      {
        $array =[
            'Data'=>'Null',
            'message'=>'The Data Not Found',
            'status'=>401
      ];
        return response($array,$status);
      }


    }
    public function apihome_screen($totalInvoice=null,$number_of_invoices=null,$number_of_purchase_invoices=null,$total_points=null,$message=null,$status=null)
    {

      if( $totalInvoice!=''or $number_of_invoices!='' or $number_of_purchase_invoices!='' or $total_points!=''  )
      {
        $array =[

            'total_Invoice'=>$totalInvoice,
            'number_of_invoices'=>$number_of_invoices,
            'number_of_purchase_invoices'=>$number_of_purchase_invoices,
            'total_points'=>$total_points,
            'message'=>$message,
            'status'=>$status
      ];
        return response($array,$status);
      }else
      {
        $array =[
            'Data'=>'Null',
            'message'=>'The Data Not Found',
            'status'=>401
      ];
        return response($array,$status);
      }


    }
   public function Dashbord_ApiresponseTrait($count_request=null,$count_Offers=null,$count_Requests_resved=null,$count_Request_end=null,$count_Request_in_progress=null,$count_Request_canceled=null,$count_profits=null,$related=null,$message=null,$status=null)
    {

      if($count_request!='' or $count_Offers!='' or $count_Requests_resved!=''
      or $count_Request_in_progress!='' or $count_Request_canceled!=''or $count_Request_end!=''or $count_profits!='' or $related!='')
      {
        $array =[
            'count_request'=>$count_request,
            'count_Offers'=>$count_Offers,
            'count_Requests_received'=>$count_Requests_resved,
            'count_Request_in_progress'=>$count_Request_in_progress,
            'count_Request_canceled'=>$count_Request_canceled,
            'count_Request_end'=>$count_Request_end,
            'count_profits'=>$count_profits,
            'related'=>$related,
            'message'=>$message,
            'status'=>$status
      ];
        return response($array,$status);
      }else
      {
        $array =[
            'Data'=>'Null',
            'message'=>'The Data Not Found',
            'status'=>401
      ];
        return response($array,$status);
      }


    }
    public function apirerequest($Requests_select_all=null,$Requests_select=null,$message=null,$status=null)
    {

      if($Requests_select_all!='' or $Requests_select!='' )
      {
        $array =[
            'All_orders'=>$Requests_select_all,
            'Special_Requests'=>$Requests_select,
            'message'=>$message,
            'status'=>$status
      ];
        return response($array,$status);
      }else
      {
        $array =[
            'Data'=>'Null',
            'message'=>'The Data Not Found',
            'status'=>401
      ];
        return response($array,$status);
      }


    }
    public function apireRequests_get_details($store_data=null,$product_data=null,$user_data=null,$invoice_data=null,$message=null,$status=null)
    {

      if($store_data!='' or $product_data!='' or $user_data!=''or $invoice_data!='' )
      {
        $array =[
            'store_data'=>$store_data,
            'product_data'=>$product_data,
            'user_data'=>$user_data,
            'invoice_data'=>$invoice_data,
            'message'=>$message,
            'status'=>$status
      ];
        return response($array,$status);
      }else
      {
        $array =[
            'Data'=>'Null',
            'message'=>'The Data Not Found',
            'status'=>401
      ];
        return response($array,$status);
      }


    }
    public function apiresponse_Saved_successfully($message=null,$status=null)
    {

      if($status)
      {
        $array =[
          'message'=>$message,
          'status'=>$status
        ];
         return response($array,$status);
      }else
      {
        $array =[
          'message'=>'Error No Status',
          'status'=>404
        ];
         return response($array,$status);
      }

    }
    public function apiresponse_error($message=null,$status=null)
    {

      if($status)
      {
        $array =[
          'message'=>$message,
          'status'=>$status
        ];
         return response($array,$status);
      }else
      {
        $array =[
          'message'=>'Error No Status',
          'status'=>404
        ];
         return response($array,$status);
      }

    }
}
?>