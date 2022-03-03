import { Component, OnInit, OnChanges } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { MealService } from '../shared/service/meal.service';
import { OrderService } from '../shared/service/order.service';
import { ReservationService } from '../shared/service/reservation.service';

@Component({
  selector: 'app-order-meals',
  templateUrl: './order-meals.component.html',
  styleUrls: ['./order-meals.component.css'],
})
export class OrderMealsComponent implements OnInit {
  constructor(private orderservice: OrderService,private ReservationSErvice:ReservationService) {}
  checked:boolean=false
  price!:number
  display = true;
  listOrder!: Array<Meal>;
  uniqueOrder!: Meal[];
  orderSum!:number;


  ngOnInit(): void {
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
       this.ReservationSErvice.saveReservation(this.listOrder,Total)
  }
}
