import { Component, OnInit } from '@angular/core';

import { AbstractControl, FormBuilder, FormControl, FormGroup, ValidationErrors, ValidatorFn, Validators } from '@angular/forms';
import { MealService } from '../shared/service/meal.service';
@Component({
  selector: 'app-payment',
  templateUrl: './payment.component.html',
  styleUrls: ['./payment.component.css']
})
export class PaymentComponent implements OnInit {
  handler:any = null;
current=new Date().getFullYear();
  payment=this.fb.group({
    NameonCard:['',[Validators.required,Validators.pattern("[A-Za-z]{1,8}"),Validators.minLength(4),Validators.maxLength(8)]],
    CardNumber:['',[Validators.required,Validators.minLength(16),Validators.maxLength(16)],Validators.pattern("/^[0-9]\d*$/")],
    CVC:['',[Validators.required,Validators.minLength(3),Validators.maxLength(4)],Validators.pattern("/^[0-9]\d*$/")],
    ExpirationMonth:['',[Validators.required,Validators.minLength(2),Validators.maxLength(2)],Validators.pattern("/^[0-9]\d*$/")],
    ExpirationYear:['',[Validators.required,Validators.minLength(4),Validators.maxLength(4)],Validators.pattern("/^[0-9]\d*$/")],
  });
  
  constructor(private fb:FormBuilder,private checkout:MealService) { 
  }




  ngOnInit(): void {
    console.log(this.current);
    // this.loadStripe();
  }
  //  onSubmit(amountform: any) {    
  //  let amount=20;
  //   var handler = (<any>window).StripeCheckout.configure({
  //     key: 'pk_test_51KX58pBmVrP9kTEPu5BezVgAPsbulPVD70Pd8OkRf0TXE6E4BgoyEJw0qATrbRp9ymZMPtqmhkWQqN5a0RHQnKRY00Zb43DjCN',
  //     locale: 'auto',
  //     // token: function (token: any) {       
  //     //   console.log(token)
  //     //   alert('Token Created!!');
  //     // }
  //     token:(token: any)=> {       
  //       console.log(token)
  //       this.checkout.sendtoken(token);
  //       alert('Token Created!!');
  //     }
  //   });
 
  //   handler.open({
  //     name: 'Demo Site',
  //     description: '2 widgets',
  //     amount: amount * 100
  //   });
 
  // }
 
  // loadStripe() {
     
  //   if(!window.document.getElementById('stripe-script')) {
  //     var s = window.document.createElement("script");
  //     s.id = "stripe-script";
  //     s.type = "text/javascript";
  //     s.src = "https://checkout.stripe.com/checkout.js";
  //     s.onload = () => {
  //       this.handler = (<any>window).StripeCheckout.configure({
  //         key: 'pk_test_51KX58pBmVrP9kTEPu5BezVgAPsbulPVD70Pd8OkRf0TXE6E4BgoyEJw0qATrbRp9ymZMPtqmhkWQqN5a0RHQnKRY00Zb43DjCN',
  //         locale: 'auto',
  //         token: function (token: any) {
  //           // You can access the token ID with `token.id`.
  //           // Get the token ID to your server-side code for use.
  //           console.log(token)
  //         let  data={token:token,total:this.price}
  //           this.checkout.sendtoken(data);  
            
  //           alert('Payment Success!!');
  //         }
  //       });
  //     }       
  //     window.document.body.appendChild(s);
  //   }
  // }
}


