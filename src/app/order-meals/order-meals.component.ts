import { Component, OnInit, OnChanges } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { MealService } from '../shared/service/meal.service';

@Component({
  selector: 'app-order-meals',
  templateUrl: './order-meals.component.html',
  styleUrls: ['./order-meals.component.css'],
})
export class OrderMealsComponent implements OnInit {
  constructor(private orderservice: MealService) {}
price!:number
  display = true;
  listOrder!: Array<Meal>;
  uniqueOrder!: Meal[];

  ngOnInit(): void {
    this.listOrder = this.orderservice.orderarray;
    this.uniqueOrder = this.orderservice.uniqueOrde;
    console.log(this.listOrder);

    if (this.listOrder.length > 0) {
      this.display = false;
    }
  }

  delateMeal(order: Meal) {
    let index = this.listOrder!.findIndex((ele) => ele.id == order.id);
    if (this.listOrder![index].count == 1) {
      this.listOrder!.splice(index, 1);
    } else if (this.listOrder![index].count > 1) {
      this.listOrder![index]!.count--;
    }
    if (this.listOrder.length == 0) {
      this.display = true;
    }
  }

  addQty(meal: Meal) {
    // meal.count++;
    this.uniqueOrder.push(meal)
  }
  decQty(meal: Meal) {
    if (meal.count == 1) {
      this.uniqueOrder.splice(
      this.uniqueOrder.findIndex((element) => element.id == meal.id),1
      );
    } else {
      meal.count--
    }
  }
  Option(meal:any,id:any){
    meal.selectedOption=id
  } 
  CalcPrice(){
    this.price=0
    this.uniqueOrder.forEach(meal=>{
     this.price=this.price+(meal.count*meal.price)
    })
    console.log(this.uniqueOrder)
    return this.price
  }
 
}
