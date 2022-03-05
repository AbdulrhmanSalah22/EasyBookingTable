import { Component, OnInit, OnChanges } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { FavouriteService } from '../shared/service/favourite.service';
import { MealService } from '../shared/service/meal.service';
import { OrderService } from '../shared/service/order.service';
import { ReservationService } from '../shared/service/reservation.service';

@Component({
  selector: 'app-order-meals',
  templateUrl: './order-meals.component.html',
  styleUrls: ['./order-meals.component.css'],
})
export class OrderMealsComponent implements OnInit {
  constructor(private orderservice: OrderService,private ReservationSErvice:ReservationService , private payment:FavouriteService) {}
  checked:boolean=false
  price!:number
  display = true;
  listOrder!: Array<Meal>;
  uniqueOrder!: Meal[];
  orderSum!:number;
  handler:any = null;
  toto:any


  ngOnInit(): void {
    // this.payment.bassant()
    // console.log(this.CalcPrice());
    console.log(this.loadStripe());
    // console.log(this.pay());
    this.listOrder = this.orderservice.orderarray;
    this.uniqueOrder = this.orderservice.uniqueOrder;
    if (this.listOrder.length > 0) {
      this.display = false;
    }
    this.ReservationSErvice.checked.subscribe(data=>{
      this.checked=data
    })
  }

  delateMeal(meal: Meal) {
    this.orderservice.deleteMeal(meal)
    if(this.listOrder.length == 0){
      this.display = true;
    }
  }
  addQty(meal: Meal) {
    this.orderservice.addQty(meal)
  }
  decQty(meal: Meal) {
   this.orderservice.decQty(meal)
   if(this.listOrder.length == 0){
    this.display = true;
  }
  }
  Option(meal:any,id:any){
    meal.selectedOption=id
  } 
  CalcPrice(){
    this.price=0
    console.log(this.uniqueOrder)
    this.uniqueOrder.forEach(meal=>{
     this.price=this.price+(meal.count*meal.price)
    })
    return this.price
  }
  orderNow(){
      let  Total={price:this.price}
       this.ReservationSErvice.saveReservation(this.uniqueOrder,Total)
       this.pay(this.price)
       
  }

  pay(amount: any) {    
    // let amount=20;
     var handler = (<any>window).StripeCheckout.configure({
       key: 'pk_test_51KX58pBmVrP9kTEPu5BezVgAPsbulPVD70Pd8OkRf0TXE6E4BgoyEJw0qATrbRp9ymZMPtqmhkWQqN5a0RHQnKRY00Zb43DjCN',
       locale: 'auto',
       // token: function (token: any) {       
       //   console.log(token)
       //   alert('Token Created!!');
       // }
       token:(token: any)=> {       
        //  console.log(token.id)
         this.payment.payment(token.id , amount);
        //  alert('Token Created!!');
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
             // You can access the token ID with `token.id`.
             // Get the token ID to your server-side code for use.
             console.log(token)
           let  data={token:token,total:this.price}
             this.payment.payment(token.id);  
             
            //  alert('Payment Success!!');
           }
         });
       }       
       window.document.body.appendChild(s);
     }
   }
}
