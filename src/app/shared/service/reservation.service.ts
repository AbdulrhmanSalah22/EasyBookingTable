import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Subject } from 'rxjs';
import { Meal } from '../model/meal';
import { Reservation } from '../model/reservation';
import { OrderService } from './order.service';

@Injectable({
  providedIn: 'root',
})
export class ReservationService {
  handler:any = null;
  checked=new Subject<boolean>()
  reservationData=new Subject<Reservation>()
  SendData:any[]=[]

  TableCheck(data: Reservation) {
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    return this.Http.post<Reservation>(
      'http://localhost:8000/api/get-table',
      data , {headers}
    )
  }
  saveReservation(order:Meal[],price:any) {

    this.SendData.push(order,price) 
    console.log( this.SendData)  
     const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    if(this.SendData.length==3){
      this.pay(price);
      this.Http.post<Reservation>(
        'http://localhost:8000/api/reserv',this.SendData,{headers} ).subscribe(
          (ResData) => {
           console.log(ResData)
           this.OrderService.DeleteOrder()
           this.checked.next(true)
          },
          (error) => {
            console.log(error);
          }
        );
      this.SendData.length=0
      console.log(this.SendData)
    }else{
      this.router.navigateByUrl('#'+'reserve'); 
      this.SendData.length=0
      console.log(this.SendData)  
   }
  }
  ColectData(data:Reservation){
    this.SendData.push(data)
      console.log(this.SendData)
  }

  GetUserReservation(){
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
   return this.Http.get<Reservation>(
      'http://localhost:8000/api/get-reservation',{headers})
  }
  pay(amount: any) {    
      var handler = (<any>window).StripeCheckout.configure({
       key: 'pk_test_51KX58pBmVrP9kTEPu5BezVgAPsbulPVD70Pd8OkRf0TXE6E4BgoyEJw0qATrbRp9ymZMPtqmhkWQqN5a0RHQnKRY00Zb43DjCN',
       locale: 'auto',
       token:(token: any)=> {       
         this.payment(token.id , amount);       
       }
     });
  
     handler.open({
       name: 'Demo Site',
       description: '2 widgets',
       amount: amount * 100
     });
  
   }
  
   loadStripe() {
      
     if(!window.document.getElementById('stripe-script')) {
       var s = window.document.createElement("script");
       s.id = "stripe-script";
       s.type = "text/javascript";
       s.src = "https://checkout.stripe.com/checkout.js";
       s.onload = () => {
         this.handler = (<any>window).StripeCheckout.configure({
           key: 'pk_test_51KX58pBmVrP9kTEPu5BezVgAPsbulPVD70Pd8OkRf0TXE6E4BgoyEJw0qATrbRp9ymZMPtqmhkWQqN5a0RHQnKRY00Zb43DjCN',
           locale: 'auto',
           token: function (token: any) {
          //       console.log(token)
          //  let  data={token:token,total:this.price}
          //    this.payment.payment(token.id);              
            
           }
         });
       }       
       window.document.body.appendChild(s);
     }
   }

  payment(toto:any , amount:number){
  let data={token:toto , price:amount}
  console.log(data);  
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
     this.Http.post(`http://localhost:8000/api/payment`,data,{headers}).subscribe(next=>console.log(next), error=>console.log(error));
  }
  constructor(private Http: HttpClient,private OrderService:OrderService,private router:Router) {}
}
